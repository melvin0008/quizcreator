<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quiz extends CI_Controller {
	public static $qid;
	function  __construct() {
    
    	parent::__construct();
		$this->qid=1;
		$this->number=1;

	}

	public function index()
	{
		$total=$this->session->userdata('s1noq');
		//echo $total;
		for($i=1;$i<=$total;$i++)
		{
			$data=array(
					"qid$i"=>0,
					);
				$this->session->set_userdata($data);
		}
		
		$this->form();
	}
	public function form()
	{
		
		$this->load->view('quiz_header');
		$this->load->model('model_quiz');

		$total_section_questions=$this->model_quiz->get_no_of_section_rows(1);
		$total=$this->session->userdata('s1noq');
		$quesno=$this->input->post('qid');
		$number=$this->input->post('number');
		$skipped=$this->session->userdata('skipped');
		$start=1;
		if($quesno)
		{
			$this->qid=$quesno;
		}
		else
		{
			$this->qid=1;	
		}
		if($number)
		{
			$temp=$number;
		}
		else
		{
			$number=1;
			$temp=1;
		}

		$opt=$this->input->post('opt');
		$pre=$this->input->post('pre');
		$next=$this->input->post('next');
		$newqid=$this->input->post('newqid');
		$final=$this->input->post('final');
		if($opt)
		{	
			
			if($this->qid==$start)		
			{
				$data=array(
					"qid$start"=>$this->input->post('opt')
					);
				$this->session->set_userdata($data);		
			}	
			else
			{
				//echo $number;
				for($i=1;$i<=$total;$i++)
				{

					
					if($number==($i+1))
					{	
						//if($next)
						//	$nid=$i-1;
						//if($pre)
							$nid=$i+1;
						$data=array(
						"qid$nid"=>$this->input->post('opt')
						);
						$this->session->set_userdata($data);	
						break;
					
					}
				}
			}
		}
	
		if(!$newqid)
		{			
			if($next)
			{
				$this->qid=$this->qid+1;
				$number+=1;	
			}
			
			if($pre)
			{
				$this->qid-=1;	
				$number-=1;
			}



			
			$temp=$number;
			
			$total_ques=$this->model_quiz->get_no_of_rows();
			//$total1=($totalmentioned<$total)?$totalmentioned:$total;
			while((!($answer=$this->model_quiz->question_info($this->qid,1)))&&$this->qid<=$total_ques)
			{
				
					//echo 'blah';
					if($next)
					{
			
						$this->qid=$this->qid+1;	
					}
					
					if($pre)
					{
						$this->qid-=1;	

					}			
					$skipped=$skipped+1;
					$this->session->set_userdata('skipped',$skipped);
			}
			
			//echo 'l'.$this->qid.'lol'.$temp.'p';
			$this->quesmain($this->qid,$temp,$total_section_questions);
		}
		else
		{
			//echo $newqid;
			if($answer=$this->model_quiz->get_qid($newqid,1))
			{
				$data=array(
				'qid'=>$answer['qid'],
				'number'=>$newqid,
				'ques' =>$answer['ques'],
				'a' =>$answer['a'],
				'b'=>$answer['b'],
				'c'=>$answer['c'],
				'd'=>$answer['d'],
				'type'=>$answer['type'],
				'start' =>1,
				'total' =>$total_section_questions
			);
			//echo $answer['ques'];
			$this->load->view('quizmain',$data);
			}


		}
		if($final)
		{
			$this->calculate($final);
		}
		

	}
	private function quesmain($qid,$temp,$total_section_questions)
	{
		$this->load->model('model_quiz');

		if($answer=$this->model_quiz->question_info($qid,1))
		{
			$data=array(
			'qid'=>$qid,
			'number'=>$temp,
			'ques' =>$answer['ques'],
			'a' =>$answer['a'],
			'b'=>$answer['b'],
			'c'=>$answer['c'],
			'd'=>$answer['d'],
			'type'=>$answer['type'],
			'start' =>1,
			'total' =>$total_section_questions
			);
			
			$this->load->view('quizmain',$data);
			//echo $answer['qid'];	

		}
		
	}
	/*
	public function next()
	{
		$this->qid+=1;
		$this->quesmain($this->qid);
	}
	public function previous()
	{
		$this->qid+=1;
		$this->quesmain($this->qid);
	}*/
	public function time()
	{
			$time=$this->session->userdata('time');
			$testtime=$this->session->userdata('testtime');
			$final=(($time+$testtime-time())/60)."\n";
			$sec=(($time+$testtime-time())%60);
			echo $rounded=floor($final)."M ".$sec."S Left";
			if($final<=0.0)		
			{
				//redirect('login/logout');
				$this->calculate(1);
			}
		
	}
	public function calculate($final)
	{
		if($final)
		{
	
			$this->load->model('model_quiz');
			$score=$this->model_quiz->calculatescore();
			echo $score;
			$this->model_quiz->enter_score($score);
			$this->session->sess_destroy();
			redirect('login/logout');
			
		}
	}
	
}