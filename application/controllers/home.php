<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('directory');
		$this->load->library('session');

	}
	public function index(){
		$this->session->sess_destroy();
        $this->load->view('home');
	}
    public function login(){
        echo "string";
        $this->load->view('Login');
    }
}        