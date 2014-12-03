<html>
<head>
		<link rel="stylesheet" type="text/css" href='<?php echo base_url()."css/log.css";?>'/>
</head>
<body>
	<div id='wrapper'>
	<div id='top'>
		<?php
		echo anchor('home/admin', 'Create a Test', 'class="l h"');
		echo anchor('login/logout', 'LOGOUT', 'class="r"');

?>
<label class='m18 h light'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Welcome &nbsp; <?php echo $this->session->userdata('emails');?></label>
</div>
<?php
/*
if(isset ($_POST['tname'])&&isset ($_POST['tpassword']))
{
	$name=$_POST['tname'];
	$password=$_POST['tpassword'];
	$password_hash=md5($password);
	if(!empty($name)&&!empty($password))
	{
		$query="SELECT * FROM `tests` WHERE `tname`='".$name."' AND `tpassword`='".$password_hash."'";
		if($query_run=mysql_query($query))
		{
			$row=mysql_num_rows($query_run);
			if($row>=1)
			{
				
				$id=mysql_result($query_run,0,'id');
				$_SESSION['tid']=$id;
				$tqno=mysql_result($query_run,0,'tqno');
				$testtime=mysql_result($query_run,0,'testtime');
				$_SESSION['tqno']=$tqno;
				$_SESSION['time']=time();
				$_SESSION['testtime']=$testtime*60;
				$_SESSION['tname']=strtolower($name);
				// can be neededd later on$_SESSION['i']=1;
				$uname=$_SESSION['username'];
				$swl="SELECT * FROM `users` WHERE `username`='".$uname."'";
				if($swl_run=mysql_query($swl))
				{
					$srow=mysql_num_rows($swl_run);
					if($srow>=1)
					{	
						$email=mysql_result($swl_run,0,'email');
						$query="INSERT INTO `quizcreator`.`$name` (`id`, `tusers`,`email_id`, `score`) VALUES ('','".$uname."','".$email."',0);";
						if($query_run=mysql_query($query))
						{	
							header( 'location:index.php');
						}
						
					}
				}
				else
						{
							echo 'blah1';
						}
			}
			else
			{
			echo 'Invalid combination';
			}
			
		}
		else
		{
		echo 'Wrong query';
		}
	}
	else
	{
	echo'Enter fields';
	}

}*/
?>
<div id='content'>
<div class='aside'>
<table cellpadding="15px"> 
<tr >
<form action="home/test_login" method="POST">
<td>TEST NAME </td></tr><tr><td><input class='box1' type= "text" name ="tname" required></td></tr><tr></tr><tr></tr><tr></tr><tr><td> TEST CODE: </td></tr><tr><td><input class='box1' type="password" name="tpassword" required></td></tr>
<tr></tr><tr></tr><tr></tr><tr><td><input class='sign'  type="submit" name="submit" value ="Sign in"></td></tr>
</form> 
</table>
</div>
</div>
</div>
</body>
</html>