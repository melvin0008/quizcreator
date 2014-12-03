<html>
<head>
	<title>ADMIN</title>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url()."css/header.css";?>'>
<head>
<body>
	<div id="top">
	<div class="header">
		<a class='home' href="<?php echo site_url('home/'); ?>">Home</a>
		<label class='h l280'>Admin Home</label>
			<a class='logout' href="<?php echo site_url('login/logout'); ?>">Logout</a>
		<div>
			<ul>
				<li class='selected'>
					<a href="#"><span>C</span>reate a Test</a>
				</li>
				<li >
					<a href="<?php echo site_url('home/questions'); ?>"><span>Q</span>uestions</a>
				</li>
				<li>
					<a href="<?php echo site_url('home/question3'); ?>"><span>S</span>cores</a>
				</li>
			</ul>
		</div>
	</div>
	</div>
</body>
</html>
<?php
if(isset($_SESSION['username']))
{
	$aname=$_SESSION['username'];
	
}
?>
<?php

?>

<html>
	<head>
	<link rel='stylesheet' href='<?php echo base_url()."css/admin.css";?>' type='text/css'>
	
		<script src='<?php echo base_url()."js/jquery.js"?>'></script>
	<script language="javascript">
	function getXMLHTTP()
	{
		var xmlhttp=null;
		try {
				xmlhttp=new XMLHttpRequest();
			}
			catch(e)
			{
				try {
						xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");
					}
					catch(e)
					{
						try {
								xmlhttp=new ActiveXObject("msxml2.XMLHTTP");
							}
							catch(e1)
							{
								xmlhttp=false;
							}
					}
			}
			return xmlhttp;
	}
	//var strurl="dynamic-form2.php?nos="+nos;
	var req=getXMLHTTP();
	function getCat(nos) {
		if(nos!=0)
		{
	//alert(cat);
					$("#flash").show();
					$("#flash").fadeIn(700).html('<img src="ajax-loader.gif" align="absmiddle"> loading.....');
	var strurl="dynamic/"+nos;
	//alert(strurl);
	var req=getXMLHTTP();
	if(req==null)
	{
	alert("browser error");
	}
	if(req)
	{
		req.onreadystatechange=function() {
		if(req.readyState ==4 || req.readyState=="complete") {
					$("#flash").hide();
	document.getElementById("ajaxresult").innerHTML=req.responseText;
		}
		}
		req.open("GET",strurl,true);
		req.send(null);
	}
}
else
{
	document.getElementById("ajaxresult").innerHTML="";
}
	}

  
  function changerad(type)
  {
  	//alert(type);
  	if(type==1)
  	{
  		document.getElementById("private").innerHTML="";
  	}
   if(type==2)
  	{
  		document.getElementById("private").innerHTML="PASSWORD :<input type='password' name='password'  style='margin-left:106px;' required/><br>CONFIRM PASSWORD :<input type='password' name='cpassword' style='margin-left:30px;' required/>";
  	}
  }

	
	</script>
	</head>
	<body>
	<div class='wrapper'>
		<div id='content'>
			<div class="first">
					<?php
						echo form_open('home/testcreation');
					?>
					<table cellpadding='10px' align='center' height='40%'>
					<tr>
					
					<td>TEST NAME:<input type= "text" name="tname" placeholder='eg. MATHS' style="margin-left:114px;" required>
					</td></tr><tr><td>TIME DURATION:<select name='time' style="margin-left:81px;"required> 
					<option value="" selected="selected">Select category</option>
					<option value='30'>30MINS</option>
					<option value='60'>60MINS</option>
					<option value='90'>90MINS</option>
					<option value='120'>2 HRS</option>
					<option value='150'>150MINS</option>
					<option value='180'>3 HRS</option>
					</select> 
					</td></tr>
					<tr><td>NO OF SECTIONS:<select name='nos'style="margin-left:69px;" onchange="getCat(this.value);" required>//new
					<option value="" selected="selected">Select category</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
					<option value='6'>6</option>
					</select>
					</td></tr>
					<tr><td><div id='ajaxresult'></div></td></tr>
					<tr><td><input type="radio" id="pub" name="radio" value="1" checked="checked" onchange="changerad(this.value);">Public</input><input type="radio" id="pri" name="radio"  value="2" onchange="changerad(this.value);">Private</input></td></tr>
					<tr><td><div id="private">
						
					</div></td></tr>					
					<tr>
					<td colspan='2' align='center'><input type="submit" name="submit" value='CREATE' required></td>
					</tr></table></form>
						
			</div> 
		
		</div>
		<label class='dark' style='font-size:15px;'>*NOTE :No. of Questions indicate questions that will be asked to the participant during the quiz and not the maximum questions that can be stored.</label>
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