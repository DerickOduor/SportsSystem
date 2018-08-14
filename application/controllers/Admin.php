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
		$admin_logged=$this->db->get_where('admin',array("username"=>$this->username,"password"=>sha1($this->password)))->result();
        $admin_name=$admin_id='';
        foreach($admin_logged as $a){
            $admin_name=$a->username;
            $admin_id=$a->id;
        }
		if($admin_logged==TRUE){
			$this->session->set_userdata(array("admin_logged"=>$this->username,"admin_id"=>$admin_id));
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

    public function Budget(){
        $data['pastevents']=$this->db->get('upcomingevents')->result();
        $data['upcomingevents']=$this->db->get('upcomingevents')->result();
        $upcoming_budget=$past_budget=array();
        foreach($data['upcomingevents'] as $d_u){
            $data['upcoming_budget']=$this->db->get_where('event_budget',array('event_name'=>$d_u->name))->result();
            array_push($upcoming_budget, $data['upcoming_budget']);
        }
        $data['budget_upcoming']=$upcoming_budget;
        foreach($data['pastevents'] as $d_p){
            $data['past_budget']=$this->db->get_where('event_budget',array('event_name'=>$d_p->name))->result();
            array_push($past_budget, $data['past_budget']);
        }
        $data['budget_past']=$past_budget;
        $this->load->view("Admin/Budgets",$data);
    }

    public function Patrons(){
    	$data['res']=$this->db->get('patrons')->result();
        $this->load->view("Admin/Patrons",$data);
    }
    public function profile(){
        $data['res']=$this->db->get_where('admin',array('username'=>$this->session->userdata('admin_logged')))->result();
        $this->load->view("Admin/Profile",$data);
    }
    public function Events(){
        $data['upcomingevents']=$this->db->get('upcomingevents')->result();
        $data['pastevents']=$this->db->get('pastevents')->result();
        $this->load->view("Admin/Events",$data);
    }

    public function upcomingevent($id){
        $data['upcomingevent']=$this->db->get_where('upcomingevents',array('id'=>$id))->result();
        $data['event_budget_desc']=$this->db->get_where('event_budget',array('event_id'=>$id))->result();
        $this->load->view("Admin/UpcomingEvent",$data);
    }

    public function pastvent($id){
        $data['upcomingevents']=$this->db->get('upcomingevents')->result();
        $data['pastevents']=$this->db->get('pastevents')->result();
        $this->load->view("Admin/PastEvent",$data);
    }

    public function Game($game_id){
        $data['res']=$this->db->get_where('games',array('id'=>$game_id))->result();
        $game=$this->db->get_where('games',array('id'=>$game_id))->result();
        $game_name='';
        foreach($game as $g){
            $game_name=$g->name;
        }
        $data['game_student']=$this->db->get_where('students',array('game'=>$game_name))->result();
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
            $this->session->set_flashdata('patron_added','Patron added!');
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
        $admin_logged=$this->db->get_where('admin',array("username"=>$username,"password"=>sha1($password)))->result();
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

    public function PrepareBudget(){
        $i=0;
        $budget_names=$budget_values=array();
        if(empty($this->input->post('budget_values'))){
            $this->upcomingevent($this->input->post('event_id'));
            exit;
        }
        $budget_values=$this->input->post('budget_values');
        $budget_value=0;
        $insert=true;
        foreach($this->input->post('budget_names') as $b_n){
            $total_budget=0;
            for($j=0;$j<count($budget_values);$j++){
                $budget_value=$budget_values[$i];
                $total_budget+=$budget_values[$j];
            }
            $i++;
            $submit_budget=$this->db->insert('event_budget',array('event_id'=>$this->input->post('event_id'),'event_name'=>$this->input->post('event_name'),'prepared_by'=>$this->session->userdata('admin_logged'),'prepared_by_id'=>$this->session->userdata('admin_id'),'budget_name'=>$b_n,'budget_value'=>$budget_value,'total_budget'=>$total_budget,'date_submitted'=>gmstrftime("%Y-%m-%d %H:%M:%S",time()+60*60*+3)));
            if($submit_budget==false){
                $insert=$submit_budget;
                break;
            }else{
                $insert=$submit_budget;
            }
        }
        if($insert==true){
            $this->upcomingevent($this->input->post('event_id'));
        }else{
            echo "Error occured> Please contact system administrator";
        }
    }

    public function discard_event_budget($id){
        $delete_budget=$this->db->query('DELETE FROM event_budget WHERE event_id="'.$id.'"');
        if($delete_budget==true){
            $this->upcomingevent($id);
        }else{
            echo "Error occured! Please contact system administrator.";
        }
    }

    public function conclude_event($id){
        $get_event_details=$this->db->get_where('upcomingevents',array('id'=>$id))->result();
        //print_r($get_event_details);
        $event_id=$event_name=$proposer=$proposer_id=$start_date=$end_date=$place=$event_poster=$event_type=$n_p_s=$p_s='';
        if(empty($id)){
            $this->events();
        }
        foreach($get_event_details as $g){
            $event_name=$g->name;
            $event_id=$g->id;
            $proposer=$g->proposer;
            $proposer_id=$g->proposer_id;
            $start_date=$g->start_date;
            $end_date=$g->end_date;
            $place=$g->place;
            $event_poster=$g->event_poster;
            $event_type=$g->event_type;
            $n_p_s=$g->no_of_participation_sports;
            $p_s=$g->participating_sports;
        }
        $insert_past_events=$this->db->insert('pastevents',array('event_id'=>$event_id,'name'=>$event_name,'proposer'=>$proposer,'proposer_id'=>$proposer_id,'start_date'=>$start_date,'end_date'=>$end_date,'place'=>$place,'event_poster'=>$event_poster,'no_of_participation_sports'=>$n_p_s,'participating_sports'=>$p_s,'event_type'=>$event_type));
        if($insert_past_events==true){
            $conclude_upcoming_event=$this->db->query('DELETE FROM upcomingevents WHERE id="'.$id.'"');
            if($conclude_upcoming_event==true){
                $this->events();
            }else{
                echo 'Error occured! Please contact system administrator.';
            }
        }else{
            echo 'Error occured! Please contact system administrator.';
        }
    }

    public function game_students($name){
        $data['res']=$this->db->get_where('students',array('game'=>$name))->result();
        $data['game_desc']=$this->db->get_where('games',array('name'=>$name))->result();
        $this->load->view('Admin/GameStudents',$data);
    }

    public function update_profile_pic(){
        $config=array(
            'upload_path'=>'users_pictures/',
            'allowed_types'=>'jpg|jpeg|png|bmp',
            'max_size'=>0,
            'file_name'=>url_title($this->input->post('file')),
            'encrypt_name'=>true
        );
        $this->load->library('upload',$config);
        //$this->upload->do_upload('file');
        if($this->upload->do_upload('file')){
            $this->db->set(array('profile_pic'=>$this->upload->file_name));
            $this->db->where(array('id'=>$this->session->userdata('admin_id')));
            $update_profile_pic=$this->db->update('admin',array('profile_pic'=>$this->upload->file_name));
            if($update_profile_pic==TRUE){
                $this->Profile();
            }else{
                echo "er2";
            }
        }else{
            echo "err";
        }
        //echo($this->input->post('name'));
    }

    public function update_email(){
        if(empty($this->input->post('email'))){
            $this->Profile();
        }else{
            $email=$this->input->post('email');
            $this->db->set(array('email'=>$email));
            $this->db->where(array('id'=>$this->session->userdata('admin_id')));
            $update_email=$this->db->update('admin',array('email'=>$email));
            if($update_email==true){
                $this->Profile();
            }else{
                echo 'Error occured! Conact system administrator.';
            }
        }
    }

    public function update_password(){
        if(empty($this->input->post('o_password')) || empty($this->input->post('n_password'))){
            $this->Profile();
        }else{
            $admin_logged=$this->db->get_where('admin',array("username"=>$this->session->userdata('admin_logged'),"password"=>sha1($this->input->post('o_password'))));
            if($admin_logged->num_rows()==1){
                if($this->input->post('n_password')==$this->input->post('r_n_password')){
                    $this->db->set(array('password'=>sha1($this->input->post('n_password'))));
                    $this->db->where(array('id'=>$this->session->userdata('admin_id')));
                    $update_password=$this->db->update('admin',array('password'=>sha1($this->input->post('n_password'))));
                    if($update_password==true){
                        $this->Profile();
                    }else{
                        echo 'Error occured! Contact system administrator.';
                    }
                }else{
                    echo 'Passwords mismatch!';
                }
            }else{
                echo 'Enter correct details!';
            }
        }
    }

    public function update_phone(){
        if(empty($this->input->post('phone'))){
            $this->Profile();
        }else{
            $this->db->set(array('phone'=>sha1($this->input->post('phone'))));
            $this->db->where(array('id'=>$this->session->userdata('admin_id')));
            $update_phone=$this->db->update('admin',array('phone'=>$this->input->post('phone')));
            if($update_phone==true){
                $this->Profile();
            }else{
                echo 'Error occured! Contact system( administrator.)';
            }
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
                $this->Events();
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

        $this->db->set(array('name'=>$event_name,'start_date'=>$start_date,'end_date'=>$end_date,'proposer'=>$this->session->userdata('admin_logged'),'proposer_id'=>$this->session->userdata('patron_id'),'place'=>$location,'no_of_participation_sports'=>$n_p_s,'participating_sports'=>$sports,'event_type'=>$event_type));
        $this->db->where(array('event_poster'=>$this->session->userdata('file_uploaded')));
        $save_event_details=$this->db->update('upcomingevents',array('name'=>$event_name,'start_date'=>$start_date,'end_date'=>$end_date,'proposer'=>$this->session->userdata('admin_logged'),'proposer_id'=>$this->session->userdata('patron_id'),'place'=>$location,'no_of_participation_sports'=>$n_p_s,'participating_sports'=>$sports,'event_type'=>$event_type));

        if($save_event_details==TRUE){
            unset($_SESSION['file_uploaded']);
            //echo 'success';
            $this->Events();
        }else{
            echo 'error occured';
        }
    }

    public function students_list($game){
        $students=$this->db->get_where('students',array('game'=>$game))->result();
        require_once(APPPATH.'libraries/fpdf.php');
        $pdf=new FPDF();
        $pdf->AddPage();
        /*$pdf->SetFont("Arial","",11);
        $pdf->Cell(0,10,$game,1,1,'C');
        $pdf->Cell(0,10,'Name',1,1,'C');
        $pdf->Ln(2);
        $header=array();
        $i=1;
        foreach($students as $s){
            //$pdf->Cell(50,10,$s->username,1,1,'C');
            $i++;
            $start_x = $pdf->GetX();
            $start_y = $pdf->GetY();
            $pdf->MultiCell(48, 3, $s->username . ' - ' . $s->regno , 0, 1, 'L');

            $pdf->SetXY($start_x + 2, $start_y);
        }*/
        
        $width_cell=array(20,50,40,40,40);
        $pdf->SetFont('Arial','B',11);
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(0,10,$game.' Students',1,1,'C',true);
        $pdf->Cell($width_cell[1],10,'Regno',1,0,'C',true);
        $pdf->Cell($width_cell[1],10,'Name',1,1,'C',true);
        $pdf->SetFont('Arial','',11);
        $pdf->SetFillColor(255,255,255); // Background color of header 
        $fill=false;

        foreach ($students as $s) {
            $pdf->Cell($width_cell[1],10,$s->regno,1,0,'C',$fill);
            $pdf->Cell($width_cell[1],10,$s->username,1,1,'L',$fill);
            $fill = !$fill;
        }
        
        $pdf->output('D',$game.'_students.pdf');
    }
}        