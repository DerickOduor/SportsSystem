<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('directory');
		$this->load->library('session');
	}
	public function index(){
        $this->load->helper('url');
		$this->load->view('Login');
	}

	public function admin(){
        $this->load->helper('url');
		$this->load->view('Admin/Login');
	}

	public function patron(){
        $this->load->helper('url');
		$this->load->view('Patron/Login');
	}

	public function student(){
        $this->load->helper('url');
		$this->load->view('Student/Login');
	}
}        