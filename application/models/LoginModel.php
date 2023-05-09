<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class LoginModel extends CI_Model {

        public function getSocieteInfo() {
            $customer = array();

            $sql = "select * from identites where dateheuremaj = (SELECT max(dateheuremaj) from identites)";

            $query = $this->db->query($sql);

            $identite = $query->result_array();

            return $identite[0];
        }

        public function verifyLogin($pswd) {

            $customer = array();

            $sql = "select * from identites where dateheuremaj = (SELECT max(dateheuremaj) from identites)";

            $query = $this->db->query($sql);

            $identite = $query->result_array();
            $identite = $identite[0];
            if($identite['mdp'] == $pswd ){
                return $identite;
            }

            return 0;
        }

    }
?>
