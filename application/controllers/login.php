<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()
	{
		
			$this->logging();
	}
	public function logging()
	{
		$this->load->view('login');
	}
	public function form_validate()
	{
		
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('emails', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|callback_validate_info');
		 $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		 
		 if ($this->form_validation->run())
		 {

		 	$logindata = array(
                   'emails'  => $this->input->post('emails') ,
                   'logged_in' => TRUE
               );

			$this->session->set_userdata($logindata);
		 	 
			redirect('home/');
		 }
		 else
		 {
			//
			//redirect('/login/');	
		 	$this->load->view('login');
		 }

	}
	public function validate_info()
	{
		$this->load->model('model_user');
		
		if($this->model_user->can_login())
		{

			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_info','Incorrect Username and Password!');
			return false;
		}

	
	}

	public function signup()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'Username', 'trim|required|max_length[30]|is_unique[users.username]|xss_clean');
		$this->form_validation->set_rules('emailr', 'Email', 'trim|required|valid_email|min_length[5]|max_length[50]|is_unique[users.email]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required');

		if ($this->form_validation->run())
		{
		 	$key = md5(uniqid());
		 	$this->load->library('email',array('mailtype' => 'html'));
		 	
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = "alexriley9999@gmail.com"; 
			$config['smtp_pass'] = "brat1234";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";

			$this->email->initialize($config);
			$this->load->model('model_user');
			$this->email->from('alexriley9999@gmail.com', 'Alex');
			$this->email->to($this->input->post('emailr')); 
			$this->email->subject('Confirm Your Account');
			$message='<p>Thank You for signing up! <p>';
			$message="<p><a href='".base_url()."login/register_user/$key>Click Here</a> to confirm your account</p>";

			$this->email->message($message);	
			if($this->model_user->add_temp_user($key))
			{
				if($this->email->send())
				{
					echo "The email has been sent";
				}
				else
				{
					echo "Count not send the email";
				}
			}
			else
			{
				echo "hey";
			}

			echo $this->email->print_debugger();
		}
		else
		{
			//$this->load->view('login');
			redirect('login/');	
		
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login/');
	}

	public function register_user($key)
	{
		$this->load->model('model_user');
		if($this->model_user->is_key_valid($key))
		{
			if($newemail =$this->model_user->add_user($key))
			{
				
				$data=array(
					'email'=>$newemail,
					'is_logged_in' =>1
					
					);
				$this->session->set_userdata($data);
				redirect('login/');
			}
			else
			{
				echo "Failed to add user,please try again";
			}
			
		}
		else
		{
			echo "Retry!!! Invalid Key";
		}
	}
}

