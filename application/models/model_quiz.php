<?php
class Model_quiz extends CI_Model{
		public function question_info($qid,$section)
		{
			$tid=$this->select_testid();
			$this->db->where('qid',$qid);
			$this->db->where('section',$section);
			$this->db->where('tid',$tid);
			$query=$this->db->get('questions');
			foreach ($query->result() as $row)
			{
			    $id=$row->qid;
			    $ques=$row->ques;
			    $a=$row->a;
			    $b=$row->b;
			    $c=$row->c;
			    $d=$row->d;
			    $type=$row->questype;
			}
			
			if($query->num_rows==1)
			{
				return array('qid'=>$id,'ques'=>$ques,'a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'type'=>$type);
			}
			else
			{
				return 0;
			}

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
		private function select_testid()
		{
			$tuc=strtolower($this->session->userdata('tname'));
		
			$this->db->where('tname',$tuc);
			$query=$this->db->get('alltests');
			foreach ($query->result() as $row)
			{
				$test_id=$row->id;
			}
			return $test_id;
		}
		public function correct_answer($start,$total)
		{
			$tid=$this->select_testid();
			$answers=array();
			$k=1;
			for($i=$start;$i<=$total;$i++)
			{

				$this->db->where('qid',$i);
				$this->db->where('tid',$tid);
				$query=$this->db->get('questions');
				if($query->result())
				{
					foreach ($query->result() as $row)
					{
						if($row->section==1)
						{
							$answers[$k]=$row->correct;

							$k++;
						}
					}
				}
				else
				{
					$total++;
				}
			
			}
			return $answers;

		}
		public function get_score($start,$total)
		{
			$tid=$this->select_testid();
			$answers=array();
			$k=1;
			for($i=$start;$i<=$total;$i++)
			{

				$this->db->where('qid',$i);
				$this->db->where('tid',$tid);
				$query=$this->db->get('questions');
				if($query->result())
				{
					foreach ($query->result() as $row)
					{
						if($row->section==1)
						{
							$answers[$k]=$row->marks;
							$k++;
						}
					}
				}
				else
				{
					$total++;
				}
			
			}
			return $answers;

		}
		public function enter_score($score)
		{
			$user_id=$this->select_id();
			$test_id=$this->select_testid();
			$data = array(
               's1' => $score,
            );

			$this->db->where('user_id', $user_id);
			$this->db->where('test_id', $test_id);
			$this->db->update('allusers', $data); 
			?><script>clearInterval(ajaxcall); xhr.abort();</script><?
			
		}
		public function calculatescore()
		{
			$answer=array();
			$start=1;
			$score=0;
			$k=1;
			$total=$this->get_no_of_rows();
			$total_sec_questions=$this->get_no_of_section_rows(1);
			$answer=$this->correct_answer($start,$total);
			$getscore=$this->get_score($start,$total);
			for($i=1;$i<=$total_sec_questions;$i++)
			{
				//echo 'i'.$i."***".$this->session->userdata("qid$i").'-';
				//echo $answer[$i].'    ';
				if($this->session->userdata("qid$i")===$answer[$i])
				{
					$score+=$getscore[$i];
					echo $score;
				}

			}
			return $score;
		}
		public function get_no_of_rows()
		{
			$tid=$this->select_testid();
			$this->db->where('tid',$tid);
			$this->db->from('questions');
			return $this->db->count_all_results();
		}
		public function get_no_of_section_rows($section)
		{
			$tid=$this->select_testid();
			$this->db->where('tid',$tid);
			$this->db->where('section',$section);
			$this->db->from('questions');
			return $this->db->count_all_results();
		}
		public function get_qid($no,$section)
		{
			$tid=$this->select_testid();
			$this->db->where('section',$section);
			$this->db->where('tid',$tid);
			$query=$this->db->get('questions');
			//$total=$this->get_no_of_section_rows($type);
			$start=1;
			$counter=0;
			//echo 'No'.$no;
			if($row = $query->row($no-1))
			{//foreach ($query->result() as $row)
			//{
			    $id=$row->qid;
			    $ques=$row->ques;
			    $a=$row->a;
			    $b=$row->b;
			    $c=$row->c;
			    $d=$row->d;
			    $type=$row->questype;
			//}
			//echo $row->ques;
			//if($query->num_rows==1)
			//{
				return array('qid'=>$id,'ques'=>$ques,'a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'type'=>$type);
			}
			else
			{
				return 0;
			}

		}

}