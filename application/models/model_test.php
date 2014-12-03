<?php
class Model_test extends CI_Model{
		public function can_login()
		{
			$this->db->where('tname',$this->input->post('tname'));
			$this->db->where('tpassword',$this->input->post('tpassword'));
			$query=$this->db->get('alltests');
			//echo $query->results();
			foreach ($query->result() as $row)
			{
			    $id=$row->id;
			    $testtime=$row->testtime;
			    $nos=$row->nos;
			    $s1noq=$row->s1noq;
			    $s2noq=$row->s2noq;
			    $s3noq=$row->s3noq;
			    $s4noq=$row->s4noq;
			    $s5noq=$row->s5noq;
			    $s6noq=$row->s6noq;
			    $mode=$row->pupr;
			}
			
			if($query->num_rows==1)
			{
				return array('testid'=>$id,'testtime'=>$testtime,'nos'=>$nos,'s1noq'=>$s1noq,'s2noq'=>$s2noq,'s3noq'=>$s3noq,'s4noq'=>$s4noq,'s5noq'=>$s5noq,'s6noq'=>$s6noq,'testtime'=>$testtime,'mode'=>$mode);
			}
			else
			{
				return false;
			}

		}
		public function insert_into_quiz($tid)
		{
			$user_id=$this->select_id();
			$email_id=$this->select_email();
			$data = array(
			'test_id' =>  $tid,
			'user_id' =>$user_id,
			's1' =>0,
			's2' =>0,
			's3' =>0,
			's4' =>0,
			's5' =>0,
			's6' =>0,
			'score'=>0
			);
			$query = $this->db->insert('allusers',$data);
			if($query)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function select_email()
		{
			$uname=$this->session->userdata('emails');
			$this->db->where('username',$uname);
			$query=$this->db->get('users');
			foreach ($query->result() as $row)
			{
				$email=$row->email;
			}
			return $email;
		}
		
		private function select_testid()
		{
			$tuc=strtolower($this->session->userdata('testname'));
			$this->db->where('tname',$tuc);
			$query=$this->db->get('alltests');
			foreach ($query->result() as $row)
			{
				$test_id=$row->id;
			}
			return $test_id;
		}
		private function select_id()
		{
			$tuc=strtolower($this->session->userdata('emails'));
			$this->db->where('username',$tuc);
			$query=$this->db->get('users');
			foreach ($query->result() as $row)
			{
				$user_id=$row->id;
			}
			return $user_id;
		}
		public function select_testidforscores()
		{
			$tuc=strtolower($this->session->userdata('testnamescores'));
			$this->db->where('tname',$tuc);
			$query=$this->db->get('alltests');
			foreach ($query->result() as $row)
			{
				$test_id=$row->id;
			}
			return $test_id;
		}
		public function select_tests()
		{	

			$user_id=$this->select_id();
			$this->db->where('uid',$user_id);
			$query=$this->db->get('alltests');
			$quizzes=array();
			$k=0;
			foreach ($query->result() as $row)
			{
				$quizzes[$k]=$row->tname;
								$k++;
			}
			return $quizzes;
		}
		public function number_section()
		{
			$tuc=strtolower($this->session->userdata('testname'));
			$this->db->where('tname',$tuc);
			$query=$this->db->get('alltests');
			foreach ($query->result() as $row)
			{
				$number=$row->nos;
			}
			return $number;	
		}
		public function insert_csv_questions($value)
		{
			$testid=$this->select_testid();

			$data = array(
			'tid'=>$testid,
			'ques' =>$value[0],
			'a' =>$value[1],
			'b' =>$value[2],
			'c' =>$value[3],
			'd' =>$value[4],
			'correct' =>$value[5],
			'questype' =>$value[6],
			'section' =>$value[7],
			'marks'=>$value[8],
			);
			$query = $this->db->insert('questions',$data);
			if($query)
			{
				return true;
			}
			else
			{
				return false;
			}

		}
		public function insert_questions($ques,$opt1,$opt2,$opt3,$opt4,$corr,$select,$nos,$marks)
		{
			$testid=$this->select_testid();			
			$data = array(
			'tid'=>$testid,
			'ques' =>$ques,
			'a' =>$opt1,
			'b' =>$opt2,
			'c' =>$opt3,
			'd' =>$opt4,
			'correct' =>$corr,
			'questype' =>$select,
			'section' =>$nos,
			'marks'=>$marks
			);
			$query = $this->db->insert('questions',$data);
			if($query)
			{
				return true;
			}
			else
			{
				return false;
			}


		}
		public function add_quiz($typeofquiz)
		{
			
				$tcreator=$this->session->userdata('emails');
				$tname=strtolower($this->input->post('tname'));
				$testtime=$this->input->post('time');
				$nos=$this->input->post('nos');
				$uid=$this->select_id();
				if($typeofquiz==1)
				{
					$password=$tname;
				}
				elseif($typeofquiz==2)
				{
					$password=$this->input->post('password');
				}
				$password_hash=md5($password);
				if(!empty($tname)&&!empty($testtime)&&!empty($nos)&&!empty($password))
				{
					if(!empty($nos))
					{
						$s1noq=0;
						$s2noq=0;
						$s3noq=0;
						$s4noq=0;
						$s5noq=0;
						$s6noq=0;
						
						$nos=intval($nos);
						switch ($nos)
						{
							case 1:
								$s1noq=$this->input->post('s1noq');
								break;
							case 2:
								$s1noq=$this->input->post('s1noq');
								$s2noq=$this->input->post('s2noq');
								break;
							case 3:
								$s1noq=$this->input->post('s1noq');
								$s2noq=$this->input->post('s2noq');
								$s3noq=$this->input->post('s3noq');
								break;
							case 4:
								$s1noq=$this->input->post('s1noq');
								$s2noq=$this->input->post('s2noq');
								$s3noq=$this->input->post('s3noq');
								$s4noq=$this->input->post('s4noq');
								break;
							case 5:
								$s1noq=$this->input->post('s1noq');
								$s2noq=$this->input->post('s2noq');
								$s3noq=$this->input->post('s3noq');
								$s4noq=$this->input->post('s4noq');
								$s5noq=$this->input->post('s5noq');
								break;
							case 6:
								$s1noq=$this->input->post('s1noq');
								$s2noq=$this->input->post('s2noq');
								$s3noq=$this->input->post('s3noq');
								$s4noq=$this->input->post('s4noq');
								$s5noq=$this->input->post('s5noq');
								$s6noq=$this->input->post('s6noq');
								break;
							default:
								echo "Please select Numberof Questions";
									break;
						}
						if($typeofquiz==1)
						{
							$data =array(
								'uid' => $uid ,
								'tpassword' => $password_hash,
								'tname' =>$tname,
								'nos'=>$nos,
								's1noq'=>$s1noq,
								's2noq'=>$s2noq,
								's3noq'=>$s3noq,
								's4noq'=>$s4noq,
								's5noq'=>$s5noq,
								's6noq'=>$s6noq,
								'testtime'=>$testtime,
								'pupr'=>1
								);

						}
						elseif($typeofquiz==2)
						{
							$data =array(
								'uid' => $uid ,
								'tpassword' => $password_hash,
								'tname' =>$tname,
								'nos'=>$nos,
								's1noq'=>$s1noq,
								's2noq'=>$s2noq,
								's3noq'=>$s3noq,
								's4noq'=>$s4noq,
								's5noq'=>$s5noq,
								's6noq'=>$s6noq,
								'testtime'=>$testtime,
								'pupr'=>2
								);
						}

						if($this->db->insert('alltests',$data))
						{
							return true;
						}
						else
						{
							return false;
						}
						
					}
					else
					{
							return false;
					}
				}
				else
				{
					
					return false;
				}

		}
		public function display_scores()
		{

			$testname=$this->session->userdata('testnamescores');
			$this->load->dbutil();
			$query = $this->db->query("SELECT  A.`EMAIL` ,B.`SCORE` FROM  `USERS` AS A JOIN  `ALLUSERS` AS B ON A.`ID`=B.`USER_ID`");
			 $data =  $this->dbutil->csv_from_result($query,",");
			return $data;
		}

}