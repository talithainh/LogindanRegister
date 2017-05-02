<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function Login($username,$password)
{
		$this->db->select('id,username,password');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}
	function create($data)
	{
		$this->db->insert('user',$data);
	}

	 public function cekCreate($username)
     {
     	$this->db->select('id,username,password,nama');
		$this->db->from('user');
		$this->db->where('username', $username);
		$query = $this->db->get();
		if($query->num_rows()>=1){
			return $query->result();
		}else{
			return false;
		}			
     }	
}

/* End of file user.php */
/* Location: ./application/models/user.php */