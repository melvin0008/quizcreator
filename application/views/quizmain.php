

<div id='content'>
	<div id='out'>

<?php

if($type!=6)
{
	echo "<div class='ques'>";
	echo "<label class='m15'>$number&nbsp;&nbsp;&nbsp;</label>";
	echo $ques;
}
else
{
	echo "<div class='ques1'>";
	echo "<label class='m15'>$number&nbsp;&nbsp;&nbsp;</label>";
	?>

	<div class='enlarge'>
	<img src='<?php echo site_url($ques)?>' height="180" width="800">
	<span>
	<img src='<?php echo site_url($ques)?>' >
	</span>
	</div>

	<?php
}

?>
</div>
</div>
<div id='options'>
	<? if($type!=5)
	{?>
<div id='opt1'>
<input type="radio" name='opt' value='a' <?php $option=$this->session->userdata("qid$number");
if(($option)&&(strcmp($this->session->userdata("qid$number"),'a')==0)){echo "checked='checked'";}?>>
<?php echo $a;?>
</input>
</div>


<div id='opt2'>
<input type="radio" name='opt' value='b' <?php $option=$this->session->userdata("qid$number");
if(($option)&&(strcmp($this->session->userdata("qid$number"),'b')==0)){echo "checked='checked'";}?>>
<?php echo $b;?>
 </input>
</div>
<div id='opt3'>
 <?php
if($type!=2)
{
	?>
<input type="radio" name='opt' value='c'<?php $option=$this->session->userdata("qid$number");
if(($option)&&(strcmp($this->session->userdata("qid$number"),'c')==0)){echo "checked='checked'";}?>>
<?php echo $c;?>
 </input>
</div>
 <div id='opt4'>
 <?
}
 ?>
 <?php
 if($type==4  || $type ==6)
{
 	?>
 <input type="radio" name='opt' value='d' <?php $option=$this->session->userdata("qid$number");
if(($option)&&(strcmp($this->session->userdata("qid$number"),'d')==0)){echo "checked='checked'";}?>>
<?php echo $d;?>
 </input>
</div>
 <?
}

 }
 else
{
	?>
	<br/>
	<textarea  id="program" cols='80' rows='15'  ></textarea>
<?
}
 ?>
 <?php	
	//$_SESSION['pre']=$qid;
			//if(isset($_POST['next'])||isset($_POST['pre'])||isset($_POST['final'])||!isset($_POST['qid']))
			//{
			//echo $qid;
				echo "<input type='hidden' name='qid' value='".$qid."''>";
				echo "<input type='hidden' name='number' value='".$number."''>";
			//}
		
		?>
</div>
<input  class='nav l fontr' type="submit" name='pre' value='< Previous' <?php if($number==$start){echo "style ='visibility:hidden'";}else{echo "style ='visibilty:visible;'";}?> ></input>
	<input  class='nav r ml450 fontr' type="submit" name='next' value='Next >' <?php $total_ques=$this->session->userdata('s1noq'); if($number==($total_ques)){echo "style ='visibility:hidden'";}elseif($qid==$start){echo "style ='visibilty:visible;'";}else{echo "style ='visibilty:visible;'";}?> ></input><br/>

</div>
<div class='aside'>
		<table>
		<?php
		echo "<tr>";
		$totalmentioned=$this->session->userdata('s1noq');
		$total_ques=($totalmentioned<$total)?$totalmentioned:$total;
		for($i=0;$i<$total_ques;$i++)
		{
		if($i%5==0)
		{
		echo "</tr><tr>";
		
		}
		if($i<9)
		{ 
		 $z='0';
		}
		else
		{
		$z='';
		}
		$vall=$start+$i;
		//echo $this->session->userdata("qid9");
		if(strcmp($this->session->userdata("qid$vall"),0)!=0)
		{
			echo "
			 <td><button class='answered' type='submit' name='newqid' value=".($start+$i)." >".$z.($i+1). "</button></td>";

		}
		else
		{
		echo "
			 <td><button class='button' type='submit' name='newqid' value=".($start+$i)." >".$z.($i+1). "</button></td>";
		}
		}
		?>	
		 </tr>
		 
	</table>
	</div>
	<br/>

<?php
for($i=1;$i<=12;$i++)
			{
//				echo $this->session->userdata("qid$i");
			}

?>


	<footer>
		<input type="submit" name='final' value="SUBMIT YOUR ANSWERS!!!!" align='center' ></input>
	</footer>
	<br>
	<br>
	<div id='copyright'>
	© YOU'LL NEVER WALK ALONE	
	</div>
		
	</form>
</div>
</body>
</html>