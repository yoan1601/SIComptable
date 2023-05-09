<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Harena extends CI_Controller{
        public function test() {
            $data['harena'] = "harena";
            $this->load->view('pages/testmenu', $data);
        }

        public function getEntreeEcriture(){
            $this->load->library('upload');
            $this->load->helper('uploader');
            $this->load->helper('numerocompte');
            $this->load->helper('harena');
            $compta = $this->Admin->getComptabilite();
            setup_docs();
            
            $idjournal = $this->input->post('journal');

            $date_values = $this->input->post('date');
            $idDevEq = $this->input->post('devise');
            $idDevEq = $idDevEq[0];
            $pointage_values = $this->input->post('pointage');
            $refPiece_values = $this->input->post('refPiece');
            //$scan_values = $this->input->post('scan');
            $scan_values = multiUpload($_FILES['scan']);
            //var_dump($_FILES);
            $numCompte_values = $this->input->post('numCompte');
            $libelle_values = $this->input->post('libelle');
            $montant_values = $this->input->post('montant');
            $taux_values = $this->input->post('taux');
            $quantite_values = $this->input->post('quantite');
            $debit_values = $this->input->post('debit');
            $credit_values = $this->input->post('credit');

                  if (verifAllDate($date_values, $compta['debutexercice']) == 0) {
            echo ('<strong style="color:red;">veuillez verifier votre date</strong>');
        } else {
            $this->Harena->nextValGroupEntree();
            foreach ($libelle_values as $index => $libelle) {
                $entree = array();
                $entree['idjournal'] = $idjournal;
                $entree['dateentree'] = $date_values[$index];
                //echo verifDate($entree['verifDate'], $compta['debutexercice']);
                $entree['idpointage'] = $pointage_values[$index];
                $entree['reference'] = $refPiece_values[$index];
                $entree['scanpiece'] = $scan_values[$index];
                //$nif['file']=upload('scannif');
                $entree['numcompte'] = fillWithZero($numCompte_values[$index]);
                $entree['libelle'] = $libelle_values[$index];
                $entree['iddeviseequivalence'] = $idDevEq;
                $entree['quantite'] = $quantite_values[$index];
                $entree['debit'] = $debit_values[$index];
                $entree['credit'] = $credit_values[$index];
                $this->Harena->insertEntree($entree);
            }
        }

        $this->goEcriture();
            
        }

        public function goEcriture() {
            $allJournal = $this->Admin->getAllJournal();
            $data['allJournal'] = $allJournal;
            $allDevises = $this->Admin->getAllDevises();
            $data['allDevises'] = $allDevises;
            $allPointages = $this->Harena->getAllPointages();
            $data['allPointages'] = $allPointages;
            $this->load->view('pages/ecriture', $data);
        }
    }
?>
