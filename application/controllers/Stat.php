<?php

    defined('BASEPATH') or exit('No direct script access allowed');
    
    class Stat extends CI_Controller{
        public function cout_centre_csv(){
            $this->load->library('upload');
            $this->load->helper('uploader');
            $this->load->helper('numerocompte');
            $this->load->helper('harena');
            setup_docs();
            $csv_name = upload('csv');
            $data = read_csv_data($csv_name,2,-1);
            foreach ($data as $key => $cout_centre) {
                $entree = array();
                $entree['idcentre']=$cout_centre[0];
                $entree['cout_centre']=$cout_centre[1];
                $entree['estvariable']=$cout_centre[2];
                $entree['idcoutproduits']=$cout_centre[3];
                $compta=$this->Admin->getComptabilite();
                $debutEx=$compta['debutexercice'];
                $entree['datecout']=$debutEx;
                $this->Stat->insertCoutCentre($entree);
            }
            $this->menu_init();
        }
        public function menu() {
            $compte=$this->input->get('compte');
            $produit=$this->input->get('produit');
            $nature=$this->input->get('nature');
            $centre=$this->input->get('centre');

            $stat = $this->Stat->getAllCentres();
            $data['allCentres'] = $stat;
            $comptes = $this->Stat->getCompteByPrefix(6);
            $data['allComptes'] = $comptes;      
            $productions = $this->Stat->getAllProductions();
            $data['allProductions'] = $productions;
            $this->load->helper('nyavo');
            $query=queryCout($compte,$produit,$nature,$centre);
            // echo $query;
            $cout=$this->Stat->getCout($query);
            $cout[0]->somme=number_format($cout[0]->somme,2,"."," ");
            $data['cout']=$cout[0];
            $this->load->view('pages/choixStat', $data);
        }
        public function menu_init() {
            $compte=0;
            $produit=-1;
            $nature=-1;
            $centre=-1;

            $stat = $this->Stat->getAllCentres();
            $data['allCentres'] = $stat;
            $comptes = $this->Stat->getCompteByPrefix(6);
            $data['allComptes'] = $comptes;      
            $productions = $this->Stat->getAllProductions();
            $data['allProductions'] = $productions;
            $this->load->helper('nyavo');
            $query=queryCout($compte,$produit,$nature,$centre);
            $cout=$this->Stat->getCout($query);
            $cout[0]->somme=number_format($cout[0]->somme,2,"."," ");
            $data['cout']=$cout[0];
            $this->load->view('pages/choixStat', $data);
        }

        public function revenu() {
            $stat = $this->Stat->getAllCentres();
            $data['allCentres'] = $stat; 
            $productions = $this->Stat->getAllProductions();
            $data['allProductions'] = $productions;
            $this->load->view('pages/revenu', $data);
        }

        public function seuil(){
            $this->load->view('pages/seuil');
        }
    }

?>