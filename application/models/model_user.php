<?php
class Model_user extends CI_Model{
		public function can_login()
		{
			$this->db->where('username',$this->input->post('emails'));
			$this->db->where('password',md5($this->input->post('password')));
			$query=$this->db->get('users');
			if($query->num_rows==1)
			{
				return true;
			}
			else
			{
				return false;
			}

		}
		
	public function add_temp_user($key){
		$data = array(
		'email' => $this->input->post('emailr') ,
		'password' => $this->input->post('password'),
		'key' => $key,
		'username' => $this->input->post('fname') 
		);
		$query = $this->db->insert('temp_users',$data);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function add_user($key)
	{
		
		$this->db->where('key',$key);
		$temp_user=$this->db->get('temp_users');
		if($temp_user)
		{
			$row = $temp_user->row();

			if(isset($row->email))
				$email=$row->email;
			if(isset($row->password))
				$password=$row->password;
			if(isset($row->username))
				$fname=$row->username;

			if(isset($email)&&isset($password)&&isset($fname))
			{
					$data =array(
					'email' => $email ,
					'password' => $password,
					'username' =>$fname,
					);

				$did_add_user =$this->db->insert('users',$data);
				if($did_add_user)
				{
					$this->db->where('key',$key);
					$this->db->delete('temp_users');
					return $data['email'];
				}
				return false;
			}
		}
	}
	public function is_key_valid($key)
	{
		$this->db->where('key',$key);
		$query =$this->db->get('temp_users');
		if($query->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}