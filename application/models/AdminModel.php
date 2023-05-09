<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{

    public function searchProduction($description)
    {
        $this->db->select('*');
        $this->db->from('productions');
        if($description!=""){
            $this->db->like('description', $description);
        }
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }
    # MODIFICATIONS 03/05/2023
    public function getAllProductions(){
        $resultats=$this->db->query("select * from productions");
        $resultats=$resultats->result_array();
        return $this->assocToObjList($resultats);
    }
    # MODIFICATIONS 03/05/2023
    public function getProductionById($idProduction){
        $resultats=$this->db->query("select * from productions where id=".$idProduction);
        $resultats=$resultats->row_array();
        return $resultats;
    }
    # MODIFICATIONS 03/05/2023
    public function modifProduction($idProduction, $maj){
        $this->db->where('id', $idProduction);
        $this->db->update('productions', $maj);
    }
    # MODIFICATIONS 03/05/2023
    public function deleteProduction($idProduction){
        $query="delete from productions where id=%s";
        $query=sprintf($query, $idProduction);
        $this->db->query($query);
    }
    # MODIFICATIONS 03/05/2023
    public function createProduction($description, $prixU){
        $table = 'productions';
        $data=array(
            'description' => $description,
            'pu' => $prixU
        );
        $this->db->insert($table, $data);
    }

    public function searchCentre($description)
    {
        $this->db->select('*');
        $this->db->from('centres');
        if($description!=""){
            $this->db->like('description', $description);
        }
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }
    # MODIFICATIONS 03/05/2023
    public function getAllCentres(){
        $resultats=$this->db->query("select * from centres");
        $resultats=$resultats->result_array();
        return $this->assocToObjList($resultats);
    }
    # MODIFICATIONS 03/05/2023
    public function getCentreById($idCentre){
        $resultats=$this->db->query("select * from centres where id=".$idCentre);
        $resultats=$resultats->row_array();
        return $resultats;
    }
    # MODIFICATIONS 03/05/2023
    public function modifCentre($idCentre, $maj){
        $this->db->where('id', $idCentre);
        $this->db->update('centres', $maj);
    }
    # MODIFICATIONS 03/05/2023
    public function deleteCentre($idCentre){
        $query="delete from centres where id=%s";
        $query=sprintf($query, $idCentre);
        $this->db->query($query);
    }
    # MODIFICATIONS 03/05/2023
    public function createCentre($description){
        $table = 'centres';
        $data=array(
            'description' => $description
        );
        $this->db->insert($table, $data);
    }

    
    public function getGroupeCompte($prefixe, $debut_exercice, $fin_choisi, $exclus = array()) {
        $l = strlen($prefixe);
        $sqlExclu = '';
        if(count($exclus) > 0) {
            $sqlExclu = $this->constrExclusSql($exclus);
        }
        $sql = "SELECT LEFT(numcompte, ".$l.") AS groupe, SUM(debit) as debit, SUM(credit) as credit
                FROM entreeecriture
                WHERE LEFT(numcompte, ".$l.") = '".$prefixe."' 
                AND dateentree >= '".$debut_exercice."' AND dateentree <= '".$fin_choisi."'
                 ".$sqlExclu." 
                GROUP BY LEFT(numcompte, ".$l.")";
        
        /*if(strlen($sqlExclu) > 0) {
            echo $sql;
        }*/
        //echo $sqlExclu;
        $resultats=$this->db->query($sql);
        $resultats=$resultats->result_array();
        return $this->assocToObjList($resultats);
    }

    public function constrExclusSql($exclus) {
        $sql = '';
        foreach ($exclus['exclus'] as $key => $exclu) {
            $sql .= " AND numcompte NOT LIKE '".$exclu."%'";
        }
        return $sql;
    }
    //==========================================================================================================

    public function getIdJournalByIntitule($intitule) {
        $this->db->select('id, code, intitule');
        $this->db->from('journals');
        $this->db->where('code', strtoupper($intitule));
        $query = $this->db->get();
        $results = $query->result();
        return $results[0];
    }

    public function getComptesCount() {
        return $this->db->count_all('comptes');
    }
    
    public function getComptesPaginated($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('comptes');
        return $query->result();
    }

    public function assocToObjList($arrayAssoc) {
        $objList = array();
        foreach ($arrayAssoc as $array) {
            $objet = $this->array_to_object($array);
            $objList [] = $objet;
        }
        return $objList;
    }

    public function array_to_object($array) {
        $objet = new stdClass();
        foreach ($array as $key => $value) {
            $objet->$key = $value;
        }
        return $objet;
    }

    # MODIFICATIONS 19/05/2023
    public function getAllc4()
    {
        $this->db->select('*');
        $this->db->from('c4');
        $query = $this->db->get();
        $resultats = $query->result();
        return $resultats;
    }

    public function getc4byId($id)
    {
        $this->db->select('*');
        $this->db->from('c4');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }

    # MODIFICATIONS 19/05/2023 
    public function getJournaux()
    {
        $this->db->select('*');
        $this->db->from('journals');
        $query = $this->db->get();
        $resultats = $query->result();
        return $resultats;
    }

    # MODIFICATIONS 19/05/2023
    public function createTiers($id, $libelle, $description){
        $table = 'tiers';
        $data=array(
            'idc4' => $id,
            'libelle' => $libelle,
            'description' => $description
        );
        $this->db->insert($table, $data);
    }
    

    # MODIFICATIONS 14/03/2023
    public function insertCompte($numero, $description) {
        $this->load->helper('numerocompte');
        $vraiNum = fillWithZero($numero);
        $present = $this->verifyAjout($vraiNum);
        if($present == 1){
            $data = array(
                'numero' => $vraiNum,
                'description' => $description
            );

            $table = 'c'.$vraiNum[0];
            $this->db->insert($table, $data);
            return 1;
            
        }
        echo 'le numero '.$vraiNum.' est deja pris ou invalide';
        return 0;
    }

    # MODIFICATIONS 14/05/2023
    public function getAllTiers(){
        $resultats=$this->db->query("select * from tiers where id not in (select idtier from extiers)");
        $resultats=$resultats->result_array();
        return $this->assocToObjList($resultats);
    }
    # MODIFICATIONS 14/05/2023
    public function getTiersById($idTiers){
        $resultats=$this->db->query("select * from tiers where id=".$idTiers." and id not in (select idtier from extiers)");
        $resultats=$resultats->row_array();
        return $resultats;
    }
    # MODIFICATIONS 14/05/2023
    public function modifTiers($idTiers, $maj){
        $this->db->where('id', $idTiers);
        $this->db->update('tiers', $maj);
    }
    # MODIFICATIONS 14/05/2023
    public function deleteTiers($idTiers){
        $query="insert into extiers values(default, %s)";
        $query=sprintf($query, $idTiers);
        $this->db->query($query);
    }
    # MODIFICATIONS 14/05/2023
    public function createDevise($maj){
        $query="insert into devises values(default, '%s', '%s')";
        $query=sprintf($query, $maj['description'], $maj['symbole']);
        $this->db->query($query);
    }

    # MODIFICATIONS 14/05/2023
    public function getDocuments(){
        $resultats=$this->db->query("select * from document order by dateheuremaj desc limit 1");
        $resultats=$resultats->row_array();
        return $resultats;
    }
    # MODIFICATIONS 14/05/2023
    public function updateDocuments($nif, $ns, $nrcs){
        $maj=array(
            'nif' => $nif['numero'],
            'scannif' => $nif['file'],
            'stat' => $ns['numero'],
            'scanstat' => $ns['file'],
            'nrcs' => $nrcs['numero'],
            'scannrcs' => $nrcs['file']
        );
        $this->db->insert("document", $maj);
    }

    public function insertDevEq($data) {
        $this->db->insert('deviseequivalences', $data);

        if ($this->db->affected_rows() > 0) {
            echo "L'insertion a réussi.";
        } else {
            echo "L'insertion a échoué.";
        }
    }

    public function getDeviseExcept($iddevise) {
        $this->db->select('*');
        $this->db->from('devises');
        $this->db->where('id !=', $iddevise);
        $query = $this->db->get();
        $resultats = $query->result();
        return $resultats;
    }

    public function getDeviseEquivalence($iddevise) {
        #iddevise = id du devise de tenue de compte
        $sub_query = "(SELECT MAX(dateheuremaj) FROM deviseequivalences)";
        $this->db->select('*');
        $this->db->from('deviseequivalences');
        $this->db->where("dateheuremaj = $sub_query");
        $this->db->where('devise', $iddevise);
        $query = $this->db->get();
        $resultats = $query->result();
    }

    public function searchCompte($numero, $description)
    {
        $this->db->select('*');
        $this->db->from('comptes');
        if($numero!=""){
            $this->db->like('numero', $numero);
        }
        if($description!=""){
            $this->db->like('description', $description);
        }
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }

    public function searchTier($numero, $description)
    {
        $this->db->select('*');
        $this->db->from('tiers');
        if($numero!=""){
            $this->db->like('idc4', $numero);
        }
        if($description!=""){
            $this->db->like('description', $description);
        }
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }

    public function searchJournal($code, $intitule)
    {
        $this->db->select('*');
        $this->db->from('journals');
        if($code!=""){
            $this->db->like('code', $code);
        }
        if($intitule!=""){
            $this->db->like('intitule', $intitule);
        }
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }

    public function searchDevise($description)
    {
        $this->db->select('*');
        $this->db->from('devises');
        if($description!=""){
            $this->db->like('description', $description);
        }
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }

    public function verifyAjout($numero)
    {
        $this->db->select('numero');
        $this->db->from('c'.$numero[0]);
        $this->db->where('numero', $numero);
        $query = $this->db->get();
        $results = $query->result();
        if(count($results) == 0){
            return 1;
        }
        return 0;
    }

    public function insertCompta($data) {
        $this->db->insert('comptabilites', $data);

        if ($this->db->affected_rows() > 0) {
            echo "L'insertion a réussi.";
        } else {
            echo "L'insertion a échoué.";
        }
    }

    public function getComptabilite()
    {

        $resultats=$this->db->query("SELECT * from comptabilites WHERE dateheuremaj = (SELECT MAX(dateheuremaj) from comptabilites)");
        $resultats=$resultats->row_array();
        return $resultats;

    }

    public function getAllComptes()
    {

        $this->db->select('*');
        $this->db->from('comptes');
        $query = $this->db->get();
        $resultats = $query->result();
        return $resultats;

    }

	public function getCompteByid($idcompte, $table)
    {
        $this->db->select('*');
        $this->db->from('c'.$table);
        $this->db->where('id', $idcompte);
        $query = $this->db->get();

        $results = $query->result();
        return $results[0];
    }


    public function deleteCompte($numcompte, $table) {
        $estDansEcriture = $this->isNumCompteInEcriture($numcompte);
        if($estDansEcriture == 0) {
            $where = array('numero' => $numcompte);
            $table = 'c'.$table;
            $this->db->delete($table, $where);
            //echo ('<strong style="color:green;">bah zut alors</strong>');
        } 
        else {
            //var_dump($estDansEcriture);
            echo ('<strong style="color:red;">Ce compte '.$numcompte.' est déjà impliqué dans une/plusieurs écriture(s)</strong>');
        }
    }

    public function isNumCompteInEcriture($numcompte) { // > 0 si oui : sinon 0
        $this->db->select('count(numcompte)');
        $this->db->from('entreeecriture');
        $this->db->where('numcompte', $numcompte);
        $query = $this->db->get();

        $results = $query->result();
        return $results[0]->count;

    }

    public function updateCompte($idcompte, $maj, $table)
    {
        $data = $maj;

        $this->db->where('id', $idcompte);
        $this->db->update('c'.$table, $data);
    }
	public function updateJournal($idJournal, $maj)
    {
        $data = $maj;

        $this->db->where('id', $idJournal);
        $this->db->update('journals', $data);
    }

    public function insertJournal($data) {
        $this->db->insert('journals', $data);

        if ($this->db->affected_rows() > 0) {
            echo "L'insertion a réussi.";
        } else {
            echo "L'insertion a échoué.";
        }
    }

    public function getJournalByid($idJournal)
    {
        $this->db->select('*');
        $this->db->from('journals');
        $this->db->where('id', $idJournal);
        $query = $this->db->get();

        $results = $query->result();
        return $results[0];
    }

    public function deleteJournal($idJournal) {
        $where = array('id' => $idJournal);
        $table = 'journals';
        $this->db->delete($table, $where);
    }

    public function getAllJournal() {
        $this->db->select('*');
        $this->db->from('journals');
        $query = $this->db->get();
        $resultats = $query->result();
        return $resultats;
    }

	public function updateSociete($idsociete, $maj)
    {
        $data = $maj;
        $query="insert into identites (nom, adresse, mdp, tel, telecopie, dateheuremaj, objet, logo) values('%s', '%s', '%s', '%s', '%s', (select current_timestamp), '%s', '%s')";
        $query=sprintf($query, $data['nom'], $data['adresse'], $data['mdp'], $data['tel'], $data['telecopie'], $data['objet'], $data['logo']);
        $this->db->query($query);
        // $this->db->where('id', $idsociete);
        // $this->db->update('identites', $data);
    }

    public function deleteDevise($iddevise) {
        $where = array('id' => $iddevise);
        $table = 'devises';
        $this->db->delete($table, $where);
    }

    public function updateDevise($iddevise, $maj)
    {
        $data = $maj;

        $this->db->where('id', $iddevise);
        $this->db->update('devises', $data);
    }

    public function getDeviseByid($iddevise)
    {
        $this->db->select('*');
        $this->db->from('devises');
        $this->db->where('id', $iddevise);
        $query = $this->db->get();

        $results = $query->result();
        return $results[0];
    }

    public function getAllDevises()
    {

        $this->db->select('*');
        $this->db->from('devises');
        $query = $this->db->get();
        $resultats = $query->result();
        return $resultats;

    }

}

?>

