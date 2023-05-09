<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class NyAvoModel extends CI_Model{
        public function getBalance(){
            $result=$this->db->query("select * from balance ORDER BY numcompte");
            $result=$result->result_array();
            $this->db->close();
            return $result;
        }
        public function getFirstGrandLivre(){
            $livre['result']=$this->db->query("select * from grandlivre where numcompte=(select numero from comptes limit 1)");
            $livre['result']=$livre['result']->result_array();
            $livre['compte']=$this->db->query("select numero from comptes limit 1")->row_array()['numero'];
            $this->db->close();
            return $livre;
        }
        public function getGrandLivre($numCompte){
            $query="select * from grandlivre where numcompte='%s'";
            $query=sprintf($query, $numCompte);
            $livre['result']=$this->db->query($query);
            $livre['result']=$livre['result']->result_array();
            $livre['compte']=$numCompte;
            $this->db->close();
            return $livre;
        }
    }
?>