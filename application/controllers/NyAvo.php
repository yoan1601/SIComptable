<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class NyAvo extends CI_Controller{
    
            // MODIFICATION 05/04/2023
        public function etatFinancier($date=''){
            $this->load->helper("harena");
            $this->load->helper("nyavo");
            $data = array();

            $actifs_non_courant = ['20','21','22','23','25'];
            $actifs_courant = ['3','41','44','4','5'];
            $capitaux_propres = ['101','105','128','120','11'];
            $passifs_non_courant = ['161'];
            $passifs_courant = ['165','40','41','4','5'];
            $produit = ['70','71'];
            $charge = ['60','61','62'];
            $exploitation = ['64','63'];
            $resultat_operationnel = ['75','78'];
            $resultat_op_charge = ['65' ,'68'];
            $resultat_financier = ['76'];
            $resultat_financier_charge = ['66'];
            //$impots = ['695','692'];
            $impots = ['695']; //692 impot différé tsy rarahina
            $produit_ordinaire = ['70','71','72','74','75','76'];
            $charge_ordinaire = ['60','61','62','63','64','65','66'];
            $resultat_extra = ['77'];
            $resultat_extra_charge = ['67'];

            $amort=['280', '281', '282'];
            $provision=['290', '291', '292', '293', '39'];

            $exclus_actif = array(
                'prefixe' => '4',
                'exclus' => ['41', '44']
            );

            $exclus_passif = array(
                'prefixe' => '4',
                'exclus' => ['40', '41']
            );

            // ================================================ DATE =========================================
            $data['comptabilite']=$this->Admin->getComptabilite();
            $debut=$data['comptabilite']['debutexercice'];

            $fin=strcmp($date, '')==0?date('Y-m-d', strtotime($debut.' +1 year -1 day')):$date;
            // ==============================================================================================

            $data = constrGrp($actifs_non_courant, $data, $debut, $fin);
            $data = constrGrp($actifs_courant, $data, $debut, $fin, $exclus_actif);
            $data = constrGrp($capitaux_propres, $data, $debut, $fin);
            $data = constrGrp($passifs_non_courant, $data, $debut, $fin);
            $data = constrGrp($passifs_courant, $data, $debut, $fin, $exclus_passif);
            $data = constrGrp($produit, $data, $debut, $fin);
            $data = constrGrp($charge, $data, $debut, $fin);
            $data = constrGrp($exploitation, $data, $debut, $fin);
            $data = constrGrp($resultat_operationnel, $data, $debut, $fin);
            $data = constrGrp($resultat_op_charge, $data, $debut, $fin);
            $data = constrGrp($resultat_financier, $data, $debut, $fin);
            $data = constrGrp($resultat_financier_charge, $data, $debut, $fin);
            $data = constrGrp($impots, $data, $debut, $fin);
            $data = constrGrp($produit_ordinaire, $data, $debut, $fin);
            $data = constrGrp($charge_ordinaire, $data, $debut, $fin);
            $data = constrGrp($resultat_extra, $data, $debut, $fin);
            $data = constrGrp($resultat_extra_charge, $data, $debut, $fin);
            $data = constrGrp($amort, $data, $debut, $fin);
            $data = constrGrp($provision, $data, $debut, $fin);

            $total_actif_non_courant = totalGrpActif($actifs_non_courant, $data);
            $total_actif_courant = totalGrpActif($actifs_courant, $data);
            $total_charge = totalGrpActif($charge, $data);
            $total_exploitation = totalGrpActif($exploitation, $data);
            $total_resultat_op_charge = totalGrpActif($resultat_op_charge, $data);
            $total_resultat_financier_charge = totalGrpActif($resultat_financier_charge, $data);
            $total_charge_ordinaire = totalGrpActif($charge_ordinaire, $data);
            $total_resultat_extra_charge = totalGrpActif($resultat_extra_charge, $data);

            $total_capitaux_propres = totalGrpPassif($capitaux_propres, $data);
            $total_passifs_non_courant = totalGrpPassif($passifs_non_courant, $data);
            $total_passifs_courant = totalGrpPassif($passifs_courant, $data);
            $total_produit = totalGrpPassif($produit, $data);
            $total_resultat_operationnel = totalGrpPassif($resultat_operationnel, $data);
            $total_resultat_financier = totalGrpPassif($resultat_financier, $data);
            $total_impots = totalGrpPassif($impots, $data);
            $total_produit_ordinaire = totalGrpPassif($produit_ordinaire, $data);
            $total_resultat_extra = totalGrpPassif($resultat_extra, $data);


            $data['total_actif_non_courant'] = $total_actif_non_courant;
            $data['total_actif_courant'] = $total_actif_courant;
            $data['total_capitaux_propres'] = $total_capitaux_propres;
            $data['total_passifs_non_courant'] = $total_passifs_non_courant;
            $data['total_passifs_courant'] = $total_passifs_courant;
            $data['total_produit'] = $total_produit;
            $data['total_charge'] = $total_charge;
            $data['total_exploitation'] = $total_exploitation;
            $data['total_resultat_operationnel'] = $total_resultat_operationnel;
            $data['total_resultat_op_charge'] = $total_resultat_op_charge;
            $data['total_resultat_financier'] = $total_resultat_financier;
            $data['total_resultat_financier_charge'] = $total_resultat_financier_charge;
            $data['total_impots'] = $total_impots;
            $data['total_produit_ordinaire'] = $total_produit_ordinaire;
            $data['total_charge_ordinaire'] = $total_charge_ordinaire;
            $data['total_resultat_extra'] = $total_resultat_extra;
            $data['total_resultat_extra_charge'] = $total_resultat_extra_charge;
            
            $data['capital']=round($data['comptabilite']['capital']);
            $data['capital']=number_format($data['capital'], 2, '.', ' ');
            $data['debut']=$debut;
            $data['cloture']=$fin;
            $data['docs']=$this->Admin->getDocuments();
            $this->load->view("pages/etatFinancier", $data);
        }
        public function balance(){
            $balance=$this->NyAvo->getBalance();
            $this->load->helper("nyavo");
            $this->load->helper("harena");
            $solde=getSoldes($balance);
            $datas['balance']=$balance;
            $datas['solde']=$solde;
            $datas['sDebitCredit'] = sommeDebitCredit($solde);
            $this->load->view("pages/balance", $datas);
        }
        public function accueilGrandLivre(){
            $grandLivre=$this->NyAvo->getFirstGrandLivre();
            $comptes=$this->Admin->getAllComptes();
            $datas['grandlivre']=$grandLivre;
            $datas['comptes']=$comptes;
            $this->load->view('pages/grandlivre', $datas);
        }
        public function grandLivre(){
            $numcompte=$this->input->get("compte");
            $grandLivre=$this->NyAvo->getGrandLivre($numcompte);
            $comptes=$this->Admin->getAllComptes();
            $datas['grandlivre']=$grandLivre;
            $datas['comptes']=$comptes;
            $this->load->view('pages/grandlivre', $datas);
        }
    }
?>
