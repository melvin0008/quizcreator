<?php
$cat=$nos;
if(empty($cat))
{
	echo "";
}

if($cat==1)
{
?>
No. of Questions in Section 1<input type="number" name='s1noq' cols='50' min='1' max='50' required></input>*</td>
      <?php
}
elseif($cat==2)
{
?>
<tr><td>No. of Questions in Section 1<input type="number" name='s1noq' cols='50' min='1' max='50'required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 2<input type="number" name='s2noq' cols='50' min='1' max='50'required></input>*</td></tr><br>
      <?php
}
elseif($cat==3)
{
?>
<tr><td>No. of Questions in Section 1<input type="number" name='s1noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 2<input type="number" name='s2noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 3<input type="number" name='s3noq' cols='50' min='1' max='50' required></input>*</td></tr><br>

      <?php
}
elseif($cat==4)
{
?>
<tr><td>No. of Questions in Section 1<input type="number" name='s1noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 2<input type="number" name='s2noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 3<input type="number" name='s3noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 4<input type="number" name='s4noq' cols='50' min='1' max='50' required></input>*</td></tr><br>

      <?php
}
elseif($cat==5)
{
?>
<tr><td>No. of Questions in Section 1<input type="number" name='s1noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 2<input type="number" name='s2noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 3<input type="number" name='s3noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 4<input type="number" name='s4noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 5<input type="number" name='s5noq' cols='50' min='1' max='50' required></input>*</td></tr><br>

      <?php
}
elseif($cat==6)
{
?>
<tr><td>No. of Questions in Section 1</td><td><input type="number" name='s1noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 2</td><td><input type="number" name='s2noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 3</td><td><input type="number" name='s3noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 4</td><td><input type="number" name='s4noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 5</td><td><input type="number" name='s5noq' cols='50' min='1' max='50' required></input>*</td></tr><br><br>
<tr><td>No. of Questions in Section 6</td><td><input type="number" name='s6noq' cols='50' min='1' max='50' required></input>*</td></tr><br>
<?php 
}
?>
