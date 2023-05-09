<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceuil extends CI_Controller {

	public function index()
	{
		$identite = $this->Login->getSocieteInfo();
        $data['identite'] =$identite;
		$this->load->view('pages/accueil', $data);
	}

	public function infoSociete() {
		$identite = $this->Login->getSocieteInfo();
        $data['identite'] =$identite;
		$this->load->view('pages/infoSociete', $data);
	}
}
