<html>
<head>
	<title>ADMIN</title>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url()."css/header.css";?>'>
	<link rel='stylesheet' href='<?php echo base_url()."css/admin.css";?>' type='text/css'>
</head>
<body>
	<div id="top">
	<div class="header">
		<a class='home' href="<?php echo site_url('home/'); ?>">Home</a>
		<label class='h l280'>Admin Home</label>
			<a class='logout' href="<?php echo site_url('login/logout'); ?>">Logout</a>
		<div>
			<ul>
				<li >
					<a href="<?php echo site_url('home/admin'); ?>"><span>C</span>reate a Test</a>
				</li>
				<li >
					<a href="<?php echo site_url('home/questions'); ?>"><span>Q</span>uestions</a>
				</li>
				<li class='selected'>
					<a href="#"><span>S</span>cores</a>
				</li>
			</ul>
		</div>
	</div>
	</div>
</body>
</html>
<?php

//$aname=$this->session->userdata('username');
/*
if (isset($_POST['submit'])) 
{
	if(isset($_POST['testname']))
	{
		if(!empty($_POST['testname']))
		{
		$_SESSION['testname']=$_POST['testname'];
		header( 'location:questions.php');	
		}
	}
}
*/
?>

<html>
	<head>
	
	</head>
	<body>
	<div id='wrapper'>
		<div id='content'>
<form action= "<?php echo site_url('home/question3'); ?>" method ="POST">
			<div id='tname'>
					Test Name<select name='testnamescore'>
					<option value="" selected="selected">Select category</option>
					<?php
						/*$select_query= "SELECT `tname` FROM `quizcreator`.`tests` WHERE `tcreator`='".$aname."'";
						$select_query_run =     mysql_query($select_query);
						while ($select_query_array=   mysql_fetch_array($select_query_run) )
						{
						   echo "<option value='".htmlspecialchars($select_query_array["tname"])."' >".htmlspecialchars($select_query_array["tname"])."</option>";
						}
*/
						$k=0;
						while ($select_query_array=$quizzes[$k])
						{
						   echo "<option value='".htmlspecialchars($select_query_array)."' >".htmlspecialchars($select_query_array)."</option>";
							$k++;
						}
					?>
					</select> 
					<input type='submit' name='Generate CSV and Send' ></input>
			</div>
		</div>
</form>
<footer>
		</footer>
	</div>
	
	
	</body>
</html>
<?php
$idofuser=$this->session->userdata('id');

if(!isset($idofuser))
{
redirect('login/logout');
}?>

