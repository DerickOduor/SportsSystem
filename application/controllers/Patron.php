<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Patron extends CI_Controller{
	private $username;
    private $name,$password,$phone,$e_mail;
    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('directory');
		$this->load->library('session');
    }

	public function index(){
		if(!empty($this->session->userdata('patron_logged'))){
            $data['res']=$this->db->get_where('students',array('game'=>$this->session->userdata('game_name'),'game_id'=>$this->session->userdata('game_id')))->result();
			$this->load->view('Patron/Home',$data);
		}else{
			$this->load->view('Patron/Login');
		}
	}

    public function students(){
        $data['res']=$this->db->get_where('students',array('approved'=>'yes','game'=>$this->session->userdata('game_name')))->result();
        $this->load->view('Patron/Students',$data);   
    }

    public function student($id){
        $data['res']=$this->db->get_where('students',array('game'=>$this->session->userdata('game_name'),'game_id'=>$this->session->userdata('game_id'),'id'=>$id))->result();
        $this->load->view('Patron/Students',$data);   
    }

    public function events(){
        $data['res']=$this->db->get('upcomingevents')->result();
        $this->load->view('Patron/Events',$data);   
    }

    public function newevent(){
        $data['res']=$this->db->get('games')->result();
        $this->load->view('Patron/NewEvent',$data);   
    }

    public function selectstudents(){
        $data['res']=$this->db->get_where('students',array('game'=>$this->session->userdata('game_name')))->result();
        $data['upcomingevents']=$this->db->get_where('upcomingevents',array('approval_status'=>'approved'))->result();
        $this->load->view('Patron/selectstudents',$data);   
    }

    public function approvestudents(){
        $data['res']=$this->db->get_where('students',array('game'=>$this->session->userdata('game_name'),'approved'=>'no'))->result();
        $this->load->view('Patron/ApproveStudents',$data);   
    }

    public function approve($id){
        $this->db->set(array('approved'=>'yes'));
        $this->db->where(array('id'=>$id));
        $approved=$this->db->update('students',array('approved'=>'yes'));

        if($approved==TRUE){
            echo 'approved';
        }else{
            echo 'error';
        }
    }

	public function login(){
		$this->username=$this->input->post('username');
		$this->password=$this->input->post('password');
		//echo $this->username.' '.$this->password;
        $pass=sha1($this->password);
		$admin_logged=$this->db->get_where('patrons',array("email"=>$this->username,"password"=>$pass))->result();
		if($admin_logged==TRUE){
            $game_name=$game_id=$patron_id=$patron_name='';
            foreach($admin_logged as $a){
                $game_id=$a->game_id;
                $game_name=$a->game;
                $patron_id=$a->id;
                $patron_name=$a->username;
            }
			$this->session->set_userdata(array('patron_logged'=>$patron_name,'patron_id'=>$patron_id,'game_name'=>$game_name,'game_id'=>$game_id));
			//$this->load->view('Admin/Home');
            echo "sent";
		}else{
			//$this->index();
            echo "failed";
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('http://localhost/sportssystem/index.php/login/patron/');
	}

    public function Game($game_id){
        //$this->load->view("Admin/Game");
        $data['res']=$this->db->get_where('games',array('id'=>$game_id))->result();
        $this->load->view('Admin/Game',$data);
    }

    public function Messages(){
        $data['res']=$this->db->query('SELECT * FROM admin_patron_messages ORDER BY date_sent ASC')->result();
        $data['students_msg']=$this->db->query('SELECT * FROM patron_students_msg WHERE sender_id="'.$this->session->userdata('patron_id').'" OR recipient_id="'.$this->session->userdata('patron_id').'" ORDER BY date_sent ASC')->result();
        //print_r($data['students_msg']);
        $names=array();
        
        foreach($data['students_msg'] as $d){
             //echo "<br/>".$d->sender."<br/>";
            //echo $i."<br/>".$names[$i]=$d->sender."<br/>";
             //echo $names[$i]=$d->sender."<br/>";
             //array_push($names, $d->sender);
            $i=0;
             foreach($names as $n){
                //echo $n."<br/>";
                if($names[$i]==$d->sender){
                    break;
                }else{
                    $names[$i]=$d->sender;
                    //echo $i."<br/>".$names[$i]."<br/>";
                }
                $i++;
             }
             //echo count($names)."<br/>";
             
        }
        //print_r($names);
        /*for($i=0;$i<count($data['students_msg']);$i++){
            echo "<br/>".$data['students_msg']['sender'][$i];
        }*/
        $this->load->view('Patron/Messages',$data);
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
        
        $addPatron=  $this->db->insert('patrons',
                array('name'=>  $this->name,
                    'email'=>  $this->e_mail,
                    'password'=>  sha1($this->password,20),
                    'phone'=>  $this->phone,
                    'date_registered'=>$date_reg)
                );
        if($addPatron==TRUE){
            $this->Patrons();
        }
    }

    public function check_unapproved_students(){
        $data=$this->db->get_where('students',array('game'=>$this->session->userdata('game_name'),'game_id'=>$this->session->userdata('game_id'),'approved'=>'no'))->result();
        if(count($data)==0){
            echo 'none';
        }elseif(count($data)>0){
            echo 'present';
        }
    }

    public function upload_event_pic(){
        $config=array(
            'upload_path'=>'uploads/',
            'allowed_types'=>'jpg|jpeg|png|bmp',
            'max_size'=>0,
            'file_name'=>url_title($this->input->post('file')),
            'encrypt_name'=>true
        );
        $this->load->library('upload',$config);
        //$this->upload->do_upload('file');
        if($this->upload->do_upload('file')){
            $img_insert=$this->db->insert('upcomingevents',array('event_poster'=>$this->upload->file_name));
            if($img_insert==TRUE){
                $this->session->set_userdata('file_uploaded',$this->upload->file_name);
                $this->newevent();
            }else{
                echo "er2";
            }
        }else{
            echo "err";
        }
    }

    public function add_event_details(){
        $event_name=$this->input->post('event_name');
        $start_date=$this->input->post('start_date');
        $end_date=$this->input->post('end_date');
        $budget=$this->input->post('budget');
        $location=$this->input->post('location');
        $n_p_s=$this->input->post('n_p_s');
        $sports=$this->input->post('sports');
        $event_type=$this->input->post('event_type');

        $this->db->set(array('name'=>$event_name,'start_date'=>$start_date,'end_date'=>$end_date,'proposer'=>$this->session->userdata('patron_logged'),'proposer_id'=>$this->session->userdata('patron_id'),'place'=>$location,'no_of_participation_sports'=>$n_p_s,'participating_sports'=>$sports,'event_type'=>$event_type));
        $this->db->where(array('event_poster'=>$this->session->userdata('file_uploaded')));
        $save_event_details=$this->db->update('upcomingevents',array('name'=>$event_name,'start_date'=>$start_date,'end_date'=>$end_date,'proposer'=>$this->session->userdata('patron_logged'),'proposer_id'=>$this->session->userdata('patron_id'),'place'=>$location,'no_of_participation_sports'=>$n_p_s,'participating_sports'=>$sports,'event_type'=>$event_type));

        if($save_event_details==TRUE){
            unset($_SESSION['file_uploaded']);
            echo 'success';
        }else{
            echo 'error occured';
        }
    }

    public function search_student(){
        $search_key=$this->input->post('search_key');

        $data['res']=$this->db->query('SELECT * FROM students WHERE name LIKE "%'.$search_key.'%" OR username LIKE "%'.$search_key.'%" OR regno LIKE "%'.$search_key.'%"')->result();

        $this->load->view('Patron/SearchStudent',$data);
    }

    public function admin_messages(){
        $data['res']=$this->db->get('admin_patron_messages')->result();
    }

    public function send_admin_msg(){
        $message=$this->input->post('message');

        $insert=$this->db->insert('admin_patron_messages',array('sender_name'=>$this->session->userdata('patron_logged'),'sender_id'=>$this->session->userdata('patron_id'),'message'=>$this->db->escape($message),'sender_type'=>'patron','date_sent'=>gmstrftime("%Y-%m-%d %H:%M:%S",time()+60*60*+3),'recipient'=>'derick','recipient_id'=>1));
        if($insert==TRUE){
            $data=$this->db->query('SELECT * FROM admin_patron_messages WHERE sender_id="'.$this->session->userdata('patron_id').'" OR recipient_id="'.$this->session->userdata('patron_id').'" OR sender_type="patron" AND message="'.$this->db->escape($message).'"')->result();
            //$data=$this->db->get_where('admin_patron_messages',array('sender_id'=>$this->session->userdata('patron_id'),'sender_id'=>$this->session->userdata('patron_id'),'message'=>$this->db->escape($message)))->result();
            foreach($data as $d){
                //echo '<div class="" id="msg"  style="width:100%;text-align:right;"><div id="in_msg" style="border:1px solid #000;border-radius:8px;width: 200px;float:right"><div>'.$d->message.'</div><div style="font-size:12px;">'.$d->date_sent.' <span class="fa fa-check"></span></div></div></div><br/>';
                echo'<div class="mdl-shadow--2dp" id="msg"  style="width:100%;text-align:right;"><div id="in_msg" style="border:1px solid #000;border-radius:8px;width: 200px;float:right"><div>'.$d->message.'</div><div style="font-size:12px;">'.$d->date_sent.' <span class="fa fa-check"></span></div></div></div>';
            }
            //echo "string";
        }
        else{
            echo "Failed";
        }
    }

    public function get_unread_msg(){
        $data=$this->db->get_where('admin_patron_messages',array('status'=>'no'))->result();
        echo count($data);
    }
    public function get_unread_student_msg(){
        $data=$this->db->get_where('patron_students_msg',array('status'=>'no'))->result();
        echo count($data);
    }

    public function get_st_message(){
        $recipient_id=$this->input->post('recipient_id');
        $sender_id=$this->input->post('sender_id');

        $data['res']=$this->db->get_where('patron_students_msg',array('sender_id'=>$sender_id,'recipient_id'=>$recipient_id))->result();

        echo $recipient_id.' - '.$sender_id;
    }

    public function select_event_students(){
        $event=$this->input->post('event');
        
        $event_details=$this->db->get_where('upcomingevents',array('name'=>$event))->result();
        $event_id=$location=$start_date=$end_date=$approval_status='';

        foreach($event_details as $e){
            $event_id=$e->id;
            $location=$e->place;
            $start_date=$e->start_date;
            $end_date=$e->end_date;
            $approval_status=$e->approval_status;
        }


        $names=array();
        $i=0;
        $inserted=false;
        foreach($this->input->post('student_name') as $s){
            $student_details=$this->db->get_where('students',array('regno'=>$s))->result();
            $student_name=$student_id=$email=$phone='';

            foreach($student_details as $s_d){
                $student_name=$s_d->username;
                $student_id=$s_d->id;
                $email=$s_d->email;
                $phone=$s_d->phone;
            }

            $check_existing=$this->db->get_where('students_to_participate_in_event',array('event_name'=>$event,'regno'=>$s))->result();
            if(count($check_existing)==0){
                $insert_selected=$this->db->insert('students_to_participate_in_event',array('event_name'=>$event,'event_id'=>$event_id,'location'=>$location,'student_name'=>$student_name,'regno'=>$s,'student_id'=>$student_id,'phone'=>$phone,'email'=>$email,'patron_name'=>$this->session->userdata('patron_logged'),'patron_id'=>$this->session->userdata('patron_id'),'event_start_date'=>$start_date,'event_end_date'=>$end_date,'approved'=>$approval_status));

                if($insert_selected==TRUE){
                    $inserted=TRUE;
                }else{
                    $inserted=false;
                }

                $names[$i]=$s;
                $i++;
            }else{
                $inserted=false;
                break;
            }
        }
        if($inserted==TRUE){
            echo 'success';
        }else{
            echo 'failed';
        }
    }
}        