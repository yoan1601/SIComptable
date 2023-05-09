<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class StatModel extends CI_Model
    {
        public function insertCoutCentre($entree){
            $this->db->insert("coutproduitscentres",$entree);
        }
        public function getCout($query){
            $sql=$this->db->query($query);
            $resultats=$sql->result_array();
            return $this->Admin->assocToObjList($resultats);
        }
        public function getAllCentres()
        {
            $this->db->select('*');
            $this->db->from('centres');
            $query = $this->db->get();
            $resultats = $query->result();
            return $resultats;
        }

        public function getAllProductions()
        {
            $this->db->select('*');
            $this->db->from('productions');
            $query = $this->db->get();
            $resultats = $query->result();
            return $resultats;
        }

        public function getCompteByPrefix($prefix)
        {
            $this->db->select('*');
            $this->db->from('c'.$prefix);
            $query = $this->db->get();

            $results = $query->result();
            return $results;
        }
    }
?>