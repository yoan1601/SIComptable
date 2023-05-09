<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HarenaModel extends CI_Model
{

    //HARENA 09/05/2023
    public function updateChargeProduit($id, $maj){
        $query="UPDATE chargesProduits SET pourcentage = %g, pourc_var = %g, pourc_fix = %g WHERE id = %g";
        $query=sprintf($query, $maj['pourcentage'], $maj['pourc_var'], $maj['pourc_fix'], $id);
        $this->db->query($query);
    }

    public function getChargeProduit($numero, $idproduit)
    {

        $resultats=$this->db->query("select * from chargesProduits where numero = '".$numero."' AND idproduit = ".$idproduit);
        $resultats=$resultats->result_array();
        $resultats = $this->Admin->assocToObjList($resultats);
        if(count($resultats) == 0) {
            return array();
        }
        return $resultats;
    }
    //////////////////////

    public function insertEntree($entree) {
        $query = $this->db->query("SELECT currval('seq_entree') as current_val");
        $entree['groupe'] = $query->row()->current_val;
        $this->db->insert("entreeecriture", $entree);
    }

    public function nextValGroupEntree() {
        $query="select nextval('seq_entree')";
        $this->db->query($query);
    }

    public function getAllPointages()
    {
        $this->db->select('*');
        $this->db->from('pointages');
        $query = $this->db->get();
        $resultats = $query->result();
        return $resultats;

    }
}
