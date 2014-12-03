<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->load->view('temp');
	}
	public function testcreation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tname', 'Test Name', 'trim|required|max_length[30]|is_unique[tests.tname]|xss_clean');
		$this->form_validation->set_rules('time', 'Time Duration', 'required');
		$this->form_validation->set_rules('nos', 'Number of Section', 'trim|required');
		$typeofquiz=$this->input->post('radio');
		
		if($typeofquiz==1)
		{
			if ($this->form_validation->run())
			{
				$this->load->model('model_test');
				if($this->model_test->add_quiz(1))
				{
					redirect('home/questions');				
				}
				else
				{
					echo "Problem";
				}						
			}
			else
			{
				echo "Error";
			}
		}
		elseif($typeofquiz==2)
		{
			$this->form_validation->set_rules('password', 'Password Confirmation', 'trim|required|matches[cpassword]|min_length[4]|md5');
			$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required');
			if ($this->form_validation->run())
			{

				$this->load->model('model_test');
				if($this->model_test->add_quiz(2))
				{

					redirect('home/questions');
				}
			}
		}
			
	}
	public function admin()
	{
		$this->load->view('test');
	}

	public function dynamic($nos)
	{
		if(!empty($nos))
		{
			$data['nos']=$nos;
			$this->load->view('dynamic',$data);
		}

	}
	public function dynamic2($nos)
	{
		if(!empty($nos))
		{
			$data['nos']=$nos;
			$this->load->view('dynamic2',$data);
		}

	}
	public function test_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tname', 'Test Name', 'trim|required|max_length[30]|xss_clean');
		$this->form_validation->set_rules('tpassword', 'Test Password', 'trim|required|md5');
		if ($this->form_validation->run())
		{
			$this->load->model('model_test');

			if($answer=$this->model_test->can_login())
			{
			
				$time=time();
				$tname=strtolower($this->input->post('tname'));
				$data=array(
					'testid'=>$answer['testid'],
					'nos' =>$answer['nos'],
					'time'=>$time,
					'testtime'=>$answer['testtime']*60,
					'tname'=>$tname,
					's1noq'=>$answer['s1noq']
					);
				$this->session->set_userdata($data);
				$tid=$answer['testid'];
				if($this->model_test->insert_into_quiz($tid))
				{
					redirect('quiz/');	
				}
				else
				{
					redirect('home/');
				}
				
			}
			else
			{
				echo "Wrong";
			}
		}
		else
		{
			//$this->load->view('login');
			redirect('home/');	
		
		}
	}
	
	public function questions()
	{
		$question=$this->session->userdata('testname');
		if($question)
		{
			$this->load->model('model_test');
			$nos=$this->model_test->number_section();
			$data=array('nos'=>$nos);
			$this->load->view('question2',$data);
			$select=$this->input->post('select');
			$marks=$this->input->post('marks');
			if($select)
			{
				if(!empty($select))
				{
				
					switch($select)
					{
						
						case 2:
							$ques=$this->input->post('ques');
							$opt1=$this->input->post('opt1');
							$opt2=$this->input->post('opt2');
							$corr=$this->input->post('corr');
							$nos=$this->input->post('nos');
							
							if($ques&&$opt1&&$opt2&&$corr&&$nos&&$marks)
								{
									
									if(!empty($ques)&&!empty($opt1)&&!empty($opt2)&&!empty($corr)&&!empty($nos)&&!empty($marks))
									{

										$this->model_test->insert_questions($ques,$opt1,$opt2,NULL,NULL,$corr,$select,$nos,$marks);		
									}
									else
									{
										echo 'Enter all fields';
									}
									
								}
								
								break;
						case 3:
							$ques=$this->input->post('ques');
							$opt1=$this->input->post('opt1');
							$opt2=$this->input->post('opt2');
							$opt3=$this->input->post('opt3');
							$corr=$this->input->post('corr');
							$nos=$this->input->post('nos');
							if($ques&&$opt1&&$opt2&&$opt3&&$corr&&$nos&&$marks)
								{
									
									if(!empty($ques)&&!empty($opt1)&&!empty($opt2)&&!empty($opt3)&&!empty($corr)&&!empty($nos)&&!empty($marks))
									{

										$this->model_test->insert_questions($ques,$opt1,$opt2,$opt3,NULL,$corr,$select,$nos,$marks);		
									}
									else
									{
										echo 'Enter all fields';
									}
									
								}
								
								break;
						case 4:
							$ques=$this->input->post('ques');
							$opt1=$this->input->post('opt1');
							$opt2=$this->input->post('opt2');
							$opt3=$this->input->post('opt3');
							$opt4=$this->input->post('opt4');
							$corr=$this->input->post('corr');
							$nos=$this->input->post('nos');
							if($ques&&$opt1&&$opt2&&$opt3&&$opt4&&$corr&&$nos&&$marks)
								{
									
									if(!empty($ques)&&!empty($opt1)&&!empty($opt2)&&!empty($opt3)&&!empty($opt4)&&!empty($corr)&&!empty($nos)&&!empty($marks))
									{

										$this->model_test->insert_questions($ques,$opt1,$opt2,$opt3,$opt4,$corr,$select,$nos,$marks);		
									}
									else
									{
										echo 'Enter all fields';
									}
									
								}
								
								break;
							
								case 6:
								$this->check();
								$this->load->library('form_validation');
								//$aname=$this->$session->userdata('username');

								// Do not show notice errors
								error_reporting (E_ALL ^ E_NOTICE);
								$submit=$this->input->post('submit');
								if($submit)
								{

									$this->form_validation->set_rules('opt1', 'Option1', 'trim|required|min_length[1]|max_length[200]|xss_clean');
									$this->form_validation->set_rules('opt2', 'Option2', 'trim|required|min_length[1]|max_length[200]|xss_clean');
									$this->form_validation->set_rules('opt3', 'Option3', 'trim|required|min_length[1]|max_length[200]|xss_clean');
									$this->form_validation->set_rules('opt4', 'Option4', 'trim|required|min_length[1]|max_length[200]|xss_clean');
										
									if(!empty($_FILES['ques'])) // Has the image been uploaded?
									{
										if ($this->form_validation->run())
			 							{
			 								$data=$this->check_image();
			 								if($data)
			 								{	
				 								$ifimage=$data['is_image'];
												if($ifimage)
												{
													

													$ques="uploads/$question/".$data['file_name'];
													$opt1=$this->input->post('opt1');
													$opt2=$this->input->post('opt2');
													$opt3=$this->input->post('opt3');
													$opt4=$this->input->post('opt4');
													$corr=$this->input->post('corr');
													$nos=$this->input->post('nos');

													if($ques&&$opt1&&$opt2&&$opt3&&$opt4&&$corr&&$nos&&$marks)
													{
																
														if(!empty($ques)&&!empty($opt1)&&!empty($opt2)&&!empty($opt3)&&!empty($opt4)&&!empty($corr)&&!empty($nos)&&!empty($marks))
														{

															$this->model_test->insert_questions($ques,$opt1,$opt2,$opt3,$opt4,$corr,$select,$nos,$marks);		
															
														}
														else
														{
															echo 'Enter all fields';
														}
													}
													else
													{

														echo 'Enter2 all fields';
													}
												}
											}
										}
									}
								}				
								break;
									
					}
				}
			}	
				



		}
		else
		{
			$this->load->model('model_test');
			$quizzes=$this->model_test->select_tests();
			$data=array('quizzes'=>$quizzes);
			$this->load->view('question1',$data);
			$submit=$this->input->post('submit');
			if($submit)
			{
				$testname=$this->input->post('testname');
				if(!empty($testname))
				{
					$data=array(
					'testname'=>$testname
					);
				$this->session->set_userdata($data);

				redirect('home/questions/');
				}

			}
			else
			{

			}
		}

	}
	public function csv()
	{
		$this->load->model('model_test');
		$nos=$this->model_test->number_section();
		
		$testname=$this->session->userdata('testname');

		if($testname)
		{
			if(!empty($testname))
			{
				
				if(!empty($_FILES))
				{

					$data=$this->check_csv();
					if($data)
					{
						$ques=$data['full_path'];
						if($ques)
						{	  
							$csvFile= $ques;
							$csv = $this->readCSV($csvFile);
							$flag=0;
							foreach ($csv as $key=>$value)
							{
							
								if($value[0]!==NULL &&$value[1]!==NULL&&$value[2]!==NULL&&$value[3]!==NULL&&$value[4]!==NULL&&$value[5]!==NULL&&$value[6]!==NULL&&$value[7]!==NULL)
								{

									if($this->model_test->insert_csv_questions($value))
									{
										$flag=1;
									}
									
								}
								else
								{
									echo "Select proper format and fill the columns appropriately";
								}

							}
							if($flag==1)
							{
									echo "All questions added";
									
							}
		  			    }
					 }
					else
				    {
					  echo "Invalid file";
					}
				}
			}
			else
			{
				echo "Please select a test";
			}
				
		}
		$data=array('nos'=>$nos);
		$this->load->view('csv',$data);

	}
	public function change()
	{

		$this->session->unset_userdata('testname');
		redirect('home/questions');
	}
	private function readCSV($csvFile){
	    //Open the file in read mode
	    $file_handle = fopen($csvFile, 'r');
	    //Go through a loop
	    while (!feof($file_handle) ) {
	        // get data using fgetcsv and push to an array
	        $line_of_text[] = fgetcsv($file_handle, 1024);
	    }
	    //Close the file after reading
	    fclose($file_handle);
	    //return the array of data
	    return $line_of_text;
	}
	private function check()
	{
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in==TRUE)
		{
			return ;
		}
		else
		{
			redirect('login/logout');
		}
	}
	private function check_csv()
	{
		$base=base_url();
		$testname=$this->session->userdata('testname');
		//$file_name=$testname;
		if(!is_dir('./csv/'.$testname))
		{
		   mkdir('./csv/'.$testname,0777);
		}
		$config['upload_path'] = "./csv/$testname/";
		
		$config['allowed_types'] = 'csv|text/csv|text/comma-separated-values|application/csv|application/excel|application/vnd.ms-excel|application/vnd.msexcel';
		$config['max_size']	= '204800';
		$config['overwrite']=TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('ques'))
		{
			$error = $this->upload->display_errors();
			echo $error;
			//$this->form_validation->set_message('check_csv',$error);
			return false;
		}
		else
		{
			

			return $this->upload->data();
		}
	}

	
	public function check_image()
	{
		$base=base_url();
		$testname=$this->session->userdata('testname');
		//$file_name=$testname;
		if(!is_dir('./uploads/'.$testname))
		{
		   mkdir('./uploads/'.$testname,0777);
		}
		$config['upload_path'] = "./uploads/$testname/";
		
		$config['allowed_types'] = 'png|jpg';
		$config['max_size']	= '2048';
		$config['max_width'] = '1280';
		$config['max_height'] = '1280';
		$config['overwrite']=TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('ques'))
		{
			$error = $this->upload->display_errors();
			$this->form_validation->set_message('check_image',$error);
			return false;
		}
		else
		{
			

			return $this->upload->data();
		}
	}
	public function question3()
	{
		/*$question=$this->session->userdata('testnamescores');
		if($question)
		{
			$this->scores;
			//$this->load->view('scores');
			$this->load->model('model_test');
			$quizzes=$this->model_test->select_tests();
			$data=array('quizzes'=>$quizzes);
			$this->load->view('question3',$data);
		}
		else
		{*/
			$this->load->model('model_test');
			$quizzes=$this->model_test->select_tests();
			$data=array('quizzes'=>$quizzes);
			$this->load->view('question3',$data);
			$submit=$this->input->post('submit');
			if($submit)
			{
				$testname=$this->input->post('testnamescore');
				if(!empty($testname))
				{
					$data=array(
					'testnamescores'=>$testname
					);
				$this->session->set_userdata($data);
				$this->scores();
				redirect('home/question3/');
				}

			}
		
		//}
	}
	public function scores()
	{
		$this->load->model('model_test');
		$testname=$this->session->userdata('testnamescores');
		$uname=$this->session->userdata('emails');
		$scores=$this->model_test->display_scores();
		$uniquename=$uname.$testname;
		if ( ! write_file("../ci/scores/$uniquename.csv", $scores))
			{
			     echo 'Unable to write the file';
			}
			else
			{
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
					$this->load->model('model_test');
					$to=$this->model_test->select_email();
					$this->email->from('alexriley9999@gmail.com', 'Alex');
					$this->email->to($to); 
					$this->email->subject('Confirm Your Account');
					$message='<p>The Score File has been attached<p>';
					

					$this->email->message($message);	
					$this->email->attach("../ci/scores/$uniquename.csv");
						if($this->email->send())
						{
							echo "The email has been sent";
						}
						else
						{
							echo "Count not send the email";
						}
					

					echo $this->email->print_debugger();
					redirect('home/questions');
			}
			
	}

}