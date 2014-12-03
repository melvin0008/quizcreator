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
					<a href="<?php echo site_url('home/admin'); ?>"><span>S</span>cores</a>
				</li>
			</ul>
		</div>
	</div>
	</div>
	<div id='up'>
	


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
					<form action="<?php echo site_url('home/csv'); ?>" method="post"
			enctype="multipart/form-data">
			<label class='dark'>Current Test :<?php echo $this->session->userdata('testname'); ?></label> 
			<div class='r'>
			<a class='dark' href="<?php echo site_url('home/change'); ?>">Change Test</a>
		</div>
		<br>
		<br>
			<label for="file">Filename:</label>
			<input type="file" name="ques" ><br>
			<!--<table><tr>
						<td colspan='2' align='center'>Section Number<select name='nos'>
					<option value="" selected="selected">Select category</option>
					<?php
							/*for($i=1;$i<=$nos;$i++)
							{
									echo "<option value='$i'>$i</option>";
							}*/
					?>
						
						</td>
					</tr>
				</table>-->
			<input type="submit" name="submit" value="Submit">
			</form>
			<div id="qeno">
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