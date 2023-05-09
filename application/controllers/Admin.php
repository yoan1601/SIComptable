<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        redirect('acceuil/infoSociete');
    }

    public function searchProduction() {
        $description = $this->input->get('description');
        $allProduction = $this->Admin->searchProduction($description);
        $datas['allProduction']=$allProduction;
        //var_dump($datas['allTiers']);
        $this->load->view('pages/productions', $datas);
    }
    # MODIFICATIONS 03/05/2023
    public function createProduction(){
        $description = $this->input->post('description');
        $prixUnitaire = $this->input->post('prixU');
        $this->Admin->createProduction($description, $prixUnitaire);
        redirect('admin/listeProduction');
    }
    # MODIFICATIONS 03/05/2023
    public function listeProduction(){
        $allProduction=$this->Admin->getAllProductions();
        $datas['allProduction']=$allProduction;
        //var_dump($datas['allTiers']);
        //var_dump($datas['allc4']);
        $this->load->view('pages/productions', $datas);
    }
    # MODIFICATIONS 03/05/2023
    public function modifProduction($etape, $idProduction){
        if ($etape == 0) {
            $identite = $this->Admin->getProductionById($idProduction);
            $data['identite'] =$identite;
            $this->load->view('pages/modifProduction', $data);
        } else if ($etape == 1) {
            $description = $this->input->post('description');
            $maj=array(
                'description' => $description
            );
            $this->Admin->modifProduction($idProduction, $maj);
            redirect('admin/listeProduction');
        } else {
            redirect('admin/listeProduction');
        }
    }
    # MODIFICATIONS 03/05/2023
    public function delProduction($idProduction) {
        $this->Admin->deleteProduction($idProduction);
        $this->listeProduction();
    }

        public function searchCentre() {
            $description = $this->input->get('description');
            $allCentre = $this->Admin->searchCentre($description);
            $datas['allCentre']=$allCentre;
            //var_dump($datas['allTiers']);
            $this->load->view('pages/centres', $datas);
        }
        # MODIFICATIONS 03/05/2023
        public function createCentre(){
            $description = $this->input->post('description');
            $this->Admin->createCentre($description);
            redirect('admin/listeCentre');
        }
        # MODIFICATIONS 03/05/2023
        public function listeCentre(){
            $allCentre=$this->Admin->getAllCentres();
            $datas['allCentre']=$allCentre;
            //var_dump($datas['allTiers']);
            //var_dump($datas['allc4']);
            $this->load->view('pages/centres', $datas);
        }
        # MODIFICATIONS 03/05/2023
        public function modifCentre($etape, $idCentre){
            if ($etape == 0) {
                $identite = $this->Admin->getCentreById($idCentre);
                $data['identite'] =$identite;
                $this->load->view('pages/modifCentre', $data);
            } else if ($etape == 1) {
                $description = $this->input->post('description');
                $maj=array(
                    'description' => $description
                );
                $this->Admin->modifCentre($idCentre, $maj);
                redirect('admin/listeCentre');
            } else {
                redirect('admin/listeCentre');
            }
        }
        # MODIFICATIONS 03/05/2023
        public function delCentre($idCentre) {
            $this->Admin->deleteCentre($idCentre);
            $this->listeCentre();
        }


    public function insEcritureCsv() {
        $this->load->library('upload');
        $this->load->helper('uploader');
        $this->load->helper('numerocompte');
        $this->load->helper('harena');
        setup_docs();
        $csv_name = upload('csv');
        $data = read_csv_data($csv_name);
        //var_dump($data);
        foreach ($data as $key => $ecriture) {
            $entree = array();
            //$intitule : les 2 premieres lettres du ref piece
            $intitule = substr($ecriture[1], 0, 2); // Extraire les deux premiers caractères (indice 0 et 1)
            $reference = substr($ecriture[1], 2); // Extraire le reste de la chaîne à partir de l'indice 2
            $entree['idjournal'] = $this->Admin->getIdJournalByIntitule($intitule)->id;
            $entree['dateentree'] = $ecriture[0];
            //echo verifDate($entree['verifDate'], $compta['debutexercice']);
            $entree['idpointage'] = 12;  //par defaut N/A
            $entree['reference'] = $reference;
            $entree['scanpiece'] = "";
            //$nif['file']=upload('scannif');
            $entree['numcompte'] = fillWithZero($ecriture[2]);
            $entree['libelle'] = $ecriture[5];
            $entree['iddeviseequivalence'] = 8; //id devise equivalence par defaut ariary<->ariary
            $entree['quantite'] = 1; //par defaut
            //ecriture[6] debit ; ecriture[7] credit
            if($ecriture[6] == '') $ecriture[6] = 0;
            if($ecriture[7] == '') $ecriture[7] = 0;
            $entree['debit'] = strToFloat($ecriture[6]);
            $entree['credit'] = strToFloat($ecriture[7]);
            /*var_dump($entree);
            echo('</br>');
            echo('==================================================================');
            echo('</br>');*/
            $this->Harena->nextValGroupEntree();
            $this->Harena->insertEntree($entree);
        }
        $this->listeComptes();
    }

    public function insCompteCsv() {
        $this->load->library('upload');
        $this->load->helper('uploader');
        setup_docs();
        $csv_name = upload('csv');
        $data = read_csv_data($csv_name);
        //var_dump($data);
        foreach ($data as $key => $compte) {
            $this->Admin->insertCompte($compte[0], $compte[1]);
        }
        $this->listeComptes();
    }


    public function listeComptes()
    {
        /*$allComptes = $this->Admin->getAllComptes();
        $data['allComptes'] = $allComptes;
        $this->load->view('pages/comptes', $data);*/

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/listeComptes');
        $config['total_rows'] = $this->Admin->getComptesCount();
        $config['per_page'] = 4;

        $this->pagination->initialize($config);
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $allComptes = $this->Admin->getComptesPaginated($config['per_page'], $offset);
        $data['allComptes'] = $allComptes;

        $this->load->view('pages/comptes', $data);

    }

    public function getc4byId($id){
        $c4=$this->Admin->getc4byId($id);
        $datas['alljournals']=$c4;
        $this->load->view('pages/journals', $datas);
    }

    # MODIFICATIONS 19/05/2023
    public function createTiers(){
        $libelle = $this->input->post('libelle');
        $description = $this->input->post('description');
        $numC4 = $this->input->post('numC4');
        $this->load->helper('numerocompte');
        if(countLength($libelle) <= 13  && countLength($description) <= 35) {
            $this->Admin->createTiers($numC4, $libelle, $description);
        }
        redirect('admin/listeTiers');
    }
    # MODIFICATIONS 19/05/2023
    public function listeTiers(){
        $allTiers=$this->Admin->getAllTiers();
        $datas['allTiers']=$allTiers;
        //var_dump($datas['allTiers']);
        $allc4=$this->Admin->getAllc4();
        $datas['allc4']=$allc4;
        //var_dump($datas['allc4']);
        $this->load->view('pages/tiers', $datas);
    }
    # MODIFICATIONS 19/05/2023
    public function modifTiers($etape, $idTiers){
        if ($etape == 0) {
            $identite = $this->Admin->getTiersById($idTiers);
            $data['identite'] =$identite;
            $allc4=$this->Admin->getAllc4();
            $data['allc4']=$allc4;
            $this->load->view('pages/modifTiers', $data);
        } else if ($etape == 1) {
            $libelle = $this->input->post('libelle');
            $description = $this->input->post('description');
            $numC4 = $this->input->post('numC4');
            $this->load->helper('numerocompte');
            if(countLength($libelle) <= 13  && countLength($description) <= 35) {
                $maj=array(
                    'idc4' => $numC4,
                    'libelle' => $libelle,
                    'description' => $description
                );
                $this->Admin->modifTiers($idTiers, $maj);
            }
            redirect('admin/listeTiers');
        } else {
            redirect('admin/listeTiers');
        }
    }

    public function goEcriture() {
        $allJournal = $this->Admin->getAllJournal();
        $data['allJournal'] = $allJournal;
        $allDevises = $this->Admin->getAllDevises();
        $data['allDevises'] = $allDevises;
        $allPointages = $this->Harena->getAllPointages();
        $data['allPointages'] = $allPointages;
        $allCentres = $this->Stat->getAllCentres();
        $data['allCentres'] = $allCentres;
        $allProductions = $this->Stat->getAllProductions();
        $data['allProductions'] = $allProductions;
        $this->load->view('pages/ecriture', $data);
    }

    # MODIFICATIONS 14/05/2023
    public function listeDocuments(){
        $allDocs=$this->Admin->getDocuments();
        $datas['allDocs']=$allDocs;
        $this->load->view('pages/documents', $datas);
    }
    # MODIFICATIONS 14/05/2023
    public function createDocuments(){
        $this->load->view('pages/createDocuments');
    }
    # MODIFICATIONS 14/05/2023
    public function modifDocuments(){
        $this->load->library('upload');
        $this->load->helper('uploader');
        setup_docs();
        $nif['numero']=$this->input->post('nif');
        $nif['file']=upload('scannif');
        $ns['numero']=$this->input->post('ns');
        $ns['file']=upload('scanns');
        $nrcs['numero']=$this->input->post('nrcs');
        $nrcs['file']=upload('scannrcs');

        var_dump($nif);
        var_dump($ns);
        var_dump($nrcs);
        $this->Admin->updateDocuments($nif, $ns, $nrcs);

        redirect('admin');
    }

    public function majDevEq() {
        $taux = $this->input->get('taux');
        $deviseTenue = $this->input->get('deviseTenue');
        $reference = $this->input->get('reference');

        $maj = array(
            'reference' => $reference,
            'devise' => $deviseTenue,
            'taux' => $taux,
            'dateheuremaj' => 'NOW()'
        );

        $this->Admin->insertDevEq($maj);
        $this->deviseEquiv();
    }

    public function deviseEquiv() {
        $comptabilite = $this->Admin->getComptabilite();
        $deviseTenue = $this->Admin->getDeviseByid($comptabilite['tenuecompte']);
        $data['deviseTenue'] = $deviseTenue;
        $data['comptabilite'] = $comptabilite;
        $allDevises = $this->Admin->getDeviseExcept($deviseTenue->id);
        //var_dump($allDevises);
        $data['allDevises'] = $allDevises;
        $this->load->view('pages/devEq', $data);
    }

    public function majCompta() {
        $dateDebutExercice = $this->input->get('dateDebutExercice');
        $deviseTenue = $this->input->get('deviseTenue');
        $capital = $this->input->get('capital');

        $maj = array(
            'debutexercice' => $dateDebutExercice,
            'tenuecompte' => $deviseTenue,
            'capital' => $capital,
            'dateheuremaj' => 'NOW()'
        );

        $this->Admin->insertCompta($maj);
        $this->index();
    }

    public function compta() {
        $comptabilite = $this->Admin->getComptabilite();
        $allDevises = $this->Admin->getAllDevises();
        $data['allDevises'] = $allDevises;
        $data['comptabilite'] = $comptabilite;
        $deviseTenue = $this->Admin->getDeviseByid($comptabilite['tenuecompte']);
        $data['deviseTenue'] = $deviseTenue;
        $this->load->view('pages/comptabilite', $data);
    }

    public function searchCompte() {
        $description = $this->input->get('description');
        $numero = $this->input->get('numero');
        $allComptes = $this->Admin->searchCompte($numero, $description);
        $data['allComptes'] = $allComptes;
        //var_dump($datas['allc4']);
        $this->load->view('pages/comptes', $data);
    }

    public function searchTier() {
        $description = $this->input->get('description');
        $numero = $this->input->get('numero');
        $allTiers = $this->Admin->searchTier($numero, $description);
        $datas['allTiers']=$allTiers;
        //var_dump($datas['allTiers']);
        $allc4 = $this->Admin->getAllc4();
        $datas['allc4']=$allc4;
        $this->load->view('pages/tiers', $datas);
    }

    public function searchJournal() {
        $code = $this->input->get('code');
        $intitule = $this->input->get('intitule');
        $allJournal = $this->Admin->searchJournal($code, $intitule);
        $data['allJournal'] = $allJournal;
        $this->load->view('pages/journals', $data);
    }

    public function searchDevise() {
        $description = $this->input->get('description');
        $allDevises = $this->Admin->searchDevise($description);
        $data['allDevises'] = $allDevises;
        $this->load->view('pages/devises', $data);
    }

    public function insCompte() {
        $description = $this->input->get('description');
        $numero = $this->input->get('numero');
        $this->load->helper('numerocompte');
        if(checkLength($numero) == 1) {
            $this->Admin->insertCompte($numero, $description);
        }
        $this->listeComptes();
    }

    public function delCompte($idcompte, $table) {
        $this->Admin->deleteCompte($idcompte, $table);
        $this->listeComptes();
    }

    public function modifCompte($etape, $idcompte, $table)
    {

        if ($etape == 0) {
            $compte = $this->Admin->getCompteByid($idcompte, $table);
            $data['compte'] = $compte;
            $this->load->view('pages/modifCompte', $data);
        } else if ($etape == 1) {
            $description = $this->input->get('description');
            $numero = $this->input->get('numero');

            $maj = array(
                'numero' => $numero,
                'description' => $description
            );

            $this->Admin->updateCompte($idcompte, $maj, $table);
            $this->listeComptes();
        } else {
            $this->listeComptes();
        }
    }

    public function ajoutJournal() {
        $intitule = $this->input->get('intitule');
        $code = $this->input->get('code');

        $data = array(
            'intitule' => $intitule,
            'code' => $code
        );

        $this->Admin->insertJournal($data);
        $this->listeJournals();
    }

    public function modifJournal($etape, $idJournal)
    {

        if ($etape == 0) {
            $Journal = $this->Admin->getJournalByid($idJournal);
            $data['journal'] = $Journal;
            $this->load->view('pages/modifJournal', $data);
        } else if ($etape == 1) {
            $intitule = $this->input->get('intitule');
            $code = $this->input->get('code');

            $maj = array(
                'intitule' => $intitule,
                'code' => $code
            );

            $this->Admin->updateJournal($idJournal, $maj);
            $this->listeJournals();
        } else {
            $this->listeJournals();
        }
    }

    public function delJournal($idJournal) {
        $this->Admin->deleteJournal($idJournal);
        $this->listeJournals();
    }

    public function listeJournals() {
        $allJournal = $this->Admin->getAllJournal();
        $data['allJournal'] = $allJournal;
        $this->load->view('pages/journals', $data);
    }

        public function modifSociete($etape){
        if ($etape == 0) {
            $identite = $this->Login->getSocieteInfo();
            $data['identite'] =$identite;
            $this->load->view('pages/modifSociete', $data);
        } else if ($etape == 1) {
            $this->load->library('upload');
		    $this->load->helper("uploader");
            $id=$this->input->post("id");
            $nom=$this->input->post("nom");
            $objet=$this->input->post("objet");
            $mdp=$this->input->post("mdp");
            setup_photo();
            $logo=upload('logo');
            $adresse=$this->input->post("adresse");
            $tel=$this->input->post("tel");
            $telecopie=$this->input->post("telecopie");

            $maj = array(
                'nom' => $nom,
                'adresse' => $adresse,
                'mdp' => $mdp,
                'tel' => $tel,
                'telecopie' => $telecopie,
                'objet' => $objet,
                'logo' => $logo,
            );

            $this->Admin->updateSociete($id, $maj);
            $this->index();
        } else {
            $this->modifSociete(0);
        }
    }

    # MODIFICATIONS 14/05/2023
    public function delTiers($idTiers) {
        $this->Admin->deleteTiers($idTiers);
        $this->listeTiers();
    }
    # MODIFICATIONS 14/05/2023
    public function insDevise(){
        $description = $this->input->post('description');
        $symbole = $this->input->post('symbole');

        $maj = array(
            'description' => $description,
            'symbole' => $symbole
        );

        $this->Admin->createDevise($maj);
        redirect('admin/listeDevises');
    }

    public function delDevise($iddevise) {
        $this->Admin->deleteDevise($iddevise);
        $this->listeDevises();
    }

    public function modifDevise($etape, $iddevise)
    {

        if ($etape == 0) {
            $devise = $this->Admin->getDeviseByid($iddevise);
            $data['devise'] = $devise;
            $this->load->view('pages/modifDevise', $data);
        } else if ($etape == 1) {
            $description = $this->input->get('description');
            $symbole = $this->input->get('symbole');

            $maj = array(
                'description' => $description,
                'symbole' => $symbole
            );

            $this->Admin->updateDevise($iddevise, $maj);
            $this->listeDevises();
        } else {
            $this->listeDevises();
        }
    }

    public function listeDevises()
    {
        $allDevises = $this->Admin->getAllDevises();
        $data['allDevises'] = $allDevises;
        $this->load->view('pages/devises', $data);
    }
}
