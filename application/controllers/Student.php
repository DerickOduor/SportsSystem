<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('directory');
		$this->load->library('session');
    }

    public function index(){
    	if(!empty($this->session->userdata('student_logged'))){
    		$data['res']=$this->db->get_where('students',array("username"=>$this->session->userdata('student_logged'),"password"=>$this->session->userdata('student_password')))->result();
    		$this->load->view('Student/Home',$data);
    	}else{
    		redirect('http://localhost/sportssystem/index.php/login/student');
    	}
    }

    public function upcomingactivities(){
    	$data['res']=$this->db->get('upcomingevents')->result();
    	$this->load->view('Student/UpcomingActivities',$data);
    }

    public function pastactivities(){
    	$data['res']=$this->db->get('pastevents')->result();
    	$this->load->view('Student/PastActivities',$data);
    }

    public function myactivities(){
    	$data['upcoming']=$this->db->get_where('students_to_participate_in_event',array('regno'=>$this->session->userdata('student_regno')))->result();
    	$data['past']=$this->db->get_where('students_participated_in_event',array('regno'=>$this->session->userdata('student_regno')))->result();
    	$this->load->view('Student/MyActivities',$data);
    }

    public function goregister(){
    	$data['res']=$this->db->get('games')->result();
    	$this->load->view('Student/Register',$data);
    }

    public function login(){
    	$this->username=$this->input->post('username');
		$this->password=$this->input->post('password');
		//echo $this->username.' '.$this->password;
        $pass=sha1($this->password);
		$student_logged=$this->db->get_where('students',array("email"=>$this->username,"password"=>$pass))->result();
		if($student_logged==TRUE){
			$data['res']=$this->db->get_where('students',array("email"=>$this->username,"password"=>$pass))->result();
			$student_id=$student_name=$regno=$student_password='';
            foreach($student_logged as $a){
                $student_id=$a->id;
                $student_name=$a->username;
                $regno=$a->regno;
                $student_password=$a->password;
            }
			$this->session->set_userdata(array('student_logged'=>$student_name,'student_id'=>$student_id,'student_regno'=>$regno,'student_password'=>$student_password));
			//echo "sent";
			$this->index();
		}else{
			$this->index();
        }
    }

    public function logout(){
    	$this->session->sess_destroy();
    	//$this->index();
    	redirect('http://localhost/sportssystem/index.php/login/student');
    }

    public function register(){
    	$username=$this->input->post('username');
    	$email=$this->input->post('email');
    	$password=$this->input->post('password');
    	$phone=$this->input->post('phone');
    	$game=$this->input->post('game');
    	$regno=$this->input->post('regno');
    	$year_admitted=$this->input->post('year_admitted');

    	$insert=$this->db->insert('students',array('username'=>$username,'regno'=>$regno,'password'=>sha1($password),'phone'=>$phone,'email'=>$email,'game'=>$game,'year_admitted'=>$year_admitted,'date_joined'=>gmstrftime("%Y-%m-%d %H:%M:%S",time()+60*60*+3)));

    	if($insert==TRUE){
    		echo "success";
    	}else{
    		echo "failed";
    	}
    }
}
?>