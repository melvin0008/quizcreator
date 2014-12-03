<!DOCTYPE HTML>
<html lang="en">
	<head><link rel="stylesheet" href='<?php echo base_url()."css/log.css";?>'/>
		<link rel="stylesheet" href='<?php echo base_url()."css/quiz.css";?>'/>
	<script src='<?php echo base_url()."js/jquery.js";?>'></script>
 <script>
	 
 $(document).ready(function(){
     setInterval(ajaxcall, 1000);
 });
 var _ajax_url = "<?php echo site_url('quiz/time'); ?>";
 function ajaxcall(){
     $.ajax({
         url: _ajax_url,
         error:function(msg){
         	clearInterval(inter);
        
         },
         
         success: function(data) {

             $('#time').html(data);
          	
         }

     });
 }

	 </script>
</head>
	
<body>

	<div id='wrapper'>
		<div id='header'>
			 <span id='time'>
			 	<?php
$testtime=$this->session->userdata('testtime');
	
	header("Refresh: $testtime; url='quiz/'");


?>
			 <?		$time=$this->session->userdata('time');
			$testtime=$this->session->userdata('testtime');
			$final=(($time+$testtime-time())/60)."\n";
			$sec=(($time+$testtime-time())%60);
			echo $rounded=floor($final)."M ".$sec."S Left";
			if($final<=0.0)		
			{
				redirect("quiz/calculate/1");
			}
			
		?>
			</span>
		
		   <a href="<?php echo site_url('login/logout'); ?>" class='r'>LOGOUT</a>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label class='h'><?php echo strtoupper($this->session->userdata('tname')); ?></label>
	
			</div>

<div id='up'>	

<?php
echo form_open('quiz/form');
	$testtime=$this->session->userdata('time')+5;
	//redirect('')
	//header("Refresh: $testtime; url='quiz'");
	echo "<meta http-equiv='refresh' content='".$testtime."'>";
?>
</div>