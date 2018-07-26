<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	private $username;
        private $name,$password,$phone,$e_mail;
        public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('directory');
		$this->load->library('session');

	}

	public function index(){
		if(!empty($this->session->userdata('admin_logged'))){
            $data['events']=$this->db->get('upcomingevents')->result();
			$this->load->view('Admin/Home',$data);
		}else{
			$this->load->view('Admin/Login');
		}
	}

	public function login(){
		$this->username=$this->input->post('username');
		$this->password=$this->input->post('password');
		//echo $this->username.' '.$this->password;
        //$pass=sha1($this->password);
		$admin_logged=$this->db->get_where('admin',array("username"=>$this->username,"password"=>$this->password))->result();
		if($admin_logged==TRUE){
			$this->session->set_userdata(array("admin_logged"=>$this->username));
			//$this->load->view('Admin/Home');
            echo "sent";
		}else{
			//$this->index();
            echo "failed";
		}
		
	}
	public function logout(){
		unset($_SESSION['admin_logged']);
		$this->index();
	}
	public function games(){
		$data['res']=$this->db->get('games')->result();
        $data['patrons']=$this->db->get_where('patrons',array('game'=>''))->result();
	    $this->load->view("Admin/Games",$data);
    }
    public function NewGame(){
        $data['patrons']=$this->db->get_where('patrons',array('assigned'=>'no'))->result();
        $this->load->view("Admin/NewGame",$data);
    }
    public function NewPatron(){
        $this->load->view("Admin/NewPatron");
    }
    public function Patrons(){
    	$data['res']=$this->db->get('patrons')->result();
        $this->load->view("Admin/Patrons",$data);
    }
    public function Events(){
        $data['upcomingevents']=$this->db->get('upcomingevents')->result();
        $data['pastevents']=$this->db->get('pastevents')->result();
        $this->load->view("Admin/Events",$data);
    }

    public function upcomingevent($id){
        $data['upcomingevent']=$this->db->get_where('upcomingevents',array('id'=>$id))->result();
        $this->load->view("Admin/UpcomingEvent",$data);
    }

    public function pastvent($id){
        $data['upcomingevents']=$this->db->get('upcomingevents')->result();
        $data['pastevents']=$this->db->get('pastevents')->result();
        $this->load->view("Admin/PastEvent",$data);
    }

    public function Game($game_id){
        //$this->load->view("Admin/Game");
        $data['res']=$this->db->get_where('games',array('id'=>$game_id))->result();
        $this->load->view('Admin/Game',$data);
    }
    public function Patron($patron_id){
        //$this->load->view("Admin/Game");
        $data['res']=$this->db->get_where('patrons',array('id'=>$patron_id))->result();
        $this->load->view('Admin/Patron',$data);
    }
    public function SubmitPatron(){
        $date_reg=gmstrftime("%Y-%m-%d %H:%M:%S",time()+60*60*+3);
        $this->name=  $this->input->post('name');
        $this->password=  $this->input->post('password');
        $this->phone=  $this->input->post('phone');
        $this->e_mail=  $this->input->post('email');
        $pass=$this->e_mail;
        
        $addPatron=  $this->db->insert('patrons',
                array('username'=>  $this->name,
                    'email'=>  $this->e_mail,
                    'password'=>  sha1($pass),
                    'phone'=>  $this->phone,
                    'date_registered'=>$date_reg)
                );
        if($addPatron==TRUE){
            $this->Patrons();
        }
    }

    public function AddGame(){
        $date_reg=gmstrftime("%Y-%m-%d %H:%M:%S",time()+60*60*+3);
        $this->game=  $this->input->post('game');
        $this->patron=  $this->input->post('patron');
        $patron_id='';
        $get_patron_id=$this->db->get_where('patrons',array('username'=>$this->patron))->result();
        foreach ($get_patron_id as $g) {
            $patron_id=$g->id;
        }
        $this->phone=  $this->input->post('phone');
        $this->e_mail=  $this->input->post('email');
        
        $addGame=  $this->db->insert('games',
                array('name'=>  $this->game,
                    'patron'=>  $this->patron,
                    'day_established'=>  $date_reg,
                    'patron_id'=>  $patron_id)
                );
        if($addGame==TRUE){
            $game_name=$game_id='';
            $get_game=$this->db->get_where('games',array('name'=>$this->game))->result();
            foreach ($get_game as $g) {
                $game_name=$g->name;
                $game_id=$g->id;
            }
            $this->db->set(array('game'=>$game_name,'assigned'=>'yes','game_id'=>$game_id));
            $this->db->where(array('id'=>$patron_id));
            $ok=$this->db->update('patrons',array('game'=>$game_name,'assigned'=>'yes','game_id'=>$game_id));
            if($ok==TRUE){
                $this->Games();
            }else{
                echo "error2";
            }
        }else{
            echo "error1";
        }
    }

    public function accept_event($id){
        $this->db->set(array('approval_status'=>'approved'));
        $this->db->where(array('id'=>$id));
        $ok=$this->db->update('upcomingevents',array('approval_status'=>'approved'));

        return $ok;
    }

    public function reject_event($id){
        $this->db->set(array('approval_status'=>'rejected'));
        $this->db->where(array('id'=>$id));
        $ok=$this->db->update('upcomingevents',array('approval_status'=>'rejected'));

        return $ok;
    }

    public function verifyAdmin($id,$action){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $admin_logged=$this->db->get_where('admin',array("username"=>$username,"password"=>$password))->result();
        if($admin_logged==TRUE){
            if($action=='accept'){
                $approved=$this->accept_event($id);
                if($approved==true){
                    $this->Events();
                }
            }else if($action=='reject'){
                $reject=$this->reject_event($id);
                if($reject==true){
                    $this->Events();
                }
            }
        }else{
            echo "failed ".$username." ".$password;
        }
    }
}        