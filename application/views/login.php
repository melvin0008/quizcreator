<html>
<head>
		<script src='<?php echo base_url()."js/jquery.min.js";?>'></script>
		<script src='<?php echo base_url()."js/jquery.poptrox.min.js";?>'></script>
		<script src='<?php echo base_url()."js/skel.min.js";?>'></script>
		<script src='<?php echo base_url()."js/init.js";?>'></script>
	<script src='<?php echo base_url()."js/jquery.validate.min.js";?>'></script>
<script src='<?php echo base_url()."js/scripts.js";?>'></script>
<link rel="stylesheet" type="text/css" href='<?php echo base_url()."css/log.css";?>'/>

</head>
<body>
<div id="wrapper"> 
<div id='signing'>
<?php echo validation_errors(); 	?>

<?php

echo form_open('login/form_validate');
?>
<label class='h light'>
		Quizcreator
	</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label class='um'>USERNAME:</label>
<?php
$data = array(
			  'type' =>'text',
			  'class' => 'box d',
              'name'        => 'emails',
              'maxlength'   => '100',
              'required' => '1'
            );
echo form_input($data);
echo "<label class='um'> PASSWORD: </label>";

$data = array(
			  'class' => 'box d',
              'name'        => 'password',
              'required' => '1'
            );

echo form_password($data);
$data = array(
			  'class' => 'sign',
              'name'  => 'submit',
              'value' => 'Sign In',
            );

echo form_submit($data);
echo form_close();
?>
</div>
<div id='info'>
</div>
<div class='aside'>
	<label class='h dark'>
		Register Now
	</label>
<div class='mel'><table cellpadding='10px' align='center' height='40%'>
<tr>
	<?php

echo form_open('login/signup');
?>

<td>
	<input class='box1' type= "text" name="fname" placeholder='User Name' value ="<?php if (!empty($fname)){echo $fname;}?>" required></input>

</td></tr><tr></tr><tr></tr><tr></tr>
<tr><td>
	<input class='box1' type= "email" name="emailr" placeholder='Email ID' value ="<?php if (!empty($email)){echo $email;}?>" required></input>
</td></tr><tr></tr><tr></tr><tr></tr><tr><td>
<input class='box1' type="password" name="password" placeholder='Password' required></input>
</td></tr><tr></tr><tr></tr><tr></tr><tr><td>
<input class='box1' type="password" name="cpassword" placeholder='Re-enter Password'required></input>
</td></tr><br><tr></tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr><td>
<input class='sign1' type="submit" name="register" value='REGISTER'></td></tr>

</form>
</table>
</div>
</div>
</div>
</body>
</html> 
