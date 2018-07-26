<?php
class Home_ extends CI_Model{
	public function send_message($message_array){
		return $this->db->insert('message',$message_array);
	}
	public function notification_seen(){
		$this->db->set(array('seen'=>'yes'));
            $this->db->where(array('seen'=>'no'));
            return $this->db->update('message',array('seen'=>'yes'));
	}
}

?>