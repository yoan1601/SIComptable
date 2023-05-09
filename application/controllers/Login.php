<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $identite = $this->Login->getSocieteInfo();
        $data['identite'] =$identite;
        $this->session->set_userdata('identite', $identite); 
		$this->load->view('pages/login', $data);
	}

    public function deconnexion() {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function inscription() {
        $this->load->view('pages/inscription');
    }

    public function insertNewUser() {

        $nom = $this->input->post('nom');

        $mdp = $this->input->post('mdp');

        $this->Login->insertUtilisateur($nom,$mdp);
        $this->Login->insertUtilisateur($nom,$mdp);

        $this->checkLogin($nom, $mdp);

    }

    public function checkLogin() {
        $mdp = $this->input->post('mdp');

        $rep = $this->Login->verifyLogin($mdp);

        if($rep == 0) { // erreur
            $this->deconnexion();
        }

        redirect('acceuil/infoSociete');

    }
}
