<html>
<head>
	<title>ADMIN</title>
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
				<li class='selected'>
					<a href="#"><span>Q</span>uestions</a>
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


?>

<HTML>
 <BODY>

<center>

 <?php
 /*
 if($file_uploaded)
 {
	 if($done)
	 {
	 echo '<font color="green">'.$done.'</font>';
	 }
	 else if($error)
	 {
	 echo '<font color="red">'.$error.'</font>';
	 }
	 echo '<br /><br />';
 }*/
 ?>


<html>
	<head>
		<link rel='stylesheet' href='<?php echo base_url()."css/admin.css";?>' type='text/css'>
		<script src='<?php echo base_url()."js/jquery.js";?>'></script>
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
	var strurl="dynamic2/"+cat;
	var req=getXMLHTTP();
	function getCat(cat) {
		
		if(cat!=0)
		{
	//alert(cat);
					$("#flash").show();
					$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle"> loading.....');
			var strurl="dynamic2/"+cat;
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
	
	function getqno(tname)
	{
	//alert(tname);
					$("#flash").show();
					$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle"> loading.....');
	var strurl="dynamic-form1.php?testname="+tname;
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
	document.getElementById("qeno").innerHTML=req.responseText;

	}
		}
		req.open("GET",strurl,true);
		req.send(null);
	}
	}
	
	
	</script>
	</head>
	<body>
	<div id='wrapper'>
		<div id='content'>
		
		<div class='l'>
			<a class='dark' href="<?php echo site_url('home/change'); ?>">Change Test</a>
		</div>
		<a class='dark r' href="<?php echo site_url('home/csv'); ?>">Upload CSV file</a>
		<label class='dark'>Current Test :<?php echo $this->session->userdata('testname'); ?></label>
			<div class="first">
			<form action= "<?php echo site_url('home/questions'); ?>" method ="POST" enctype="multipart/form-data">
					<table cellpadding='10px' align='center' height='40%'>
					
					<div id='qeno'>
					</div>
					<tr>
					<td colspan='2' align='center'>Question Type<select name='select' onChange="getCat(this.value)"> 
					<option value="" selected="selected">Select category</option>
					<option value='2'>Yes/No Question</option>
					<option value='3'>3 Option MCQ</option>
					<option value='4'>4 Option MCQ</option>
					<option value='7'>Multiple Choice Answer</option>
					<option value='5'>Programming Question</option>
					<option value='6'>Visual Question<option>
					</select> 
					</td></tr>
					<tr>
						<td colspan='2' align='center'>Section Number<select name='nos'>
					<option value="" selected="selected">Select category</option>
						<?php
						
							
						
						for($i=1;$i<=$nos;$i++)
						{
								echo "<option value='$i'>$i</option>";
						}
						?>
						
						</td>
					</tr>
					<tr><td colspan='2' align='center'>
						Marks Per Question <input type="number" name='marks' cols='50' min='1' max='50' value="<?php $check=$this->input->post('check');if($check){echo $this->input->post('check');}?>"></input>
						<input type='checkbox' name='check' <?php $check=$this->input->post('check');if($check){echo 'checked';}?>>Constant</input>
						</td></tr>
					<tr><td><div id='flash'></div></td></tr>
					<tr><td><div id='ajaxresult'></div></td></tr>
					<tr><td colspan='2' align='center'><input type="submit" name="submit" value='CREATE'></td>
					</tr> </table></form>
						
			</div> 
		</div>	
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