<?php
$cat=$nos;

	if($cat==2)
	{
	?>
	<tr><td colspan='2' align='center'>QUESTION<textarea name='ques' cols='50' rows='5' maxlength='200' required></textarea>
						</td></tr><br><br>
	<tr><td>					
	QPTION a.)<input type="text" name='opt1' cols='50' maxlength='200'required></input></td>
	<td>QPTION b.) <input type="text" name='opt2' cols='50' maxlength='200' required></input>
	      <?php
	}
	elseif($cat==3)
	{
	?>
	<tr><td colspan='2' align='center'>QUESTION<textarea name='ques' cols='50' rows='5' maxlength='200' required></textarea>
						</td></tr><br><br>
	<tr><td>QPTION a.)</td><textarea name='opt1' cols='50' maxlength='200' required></textarea></tr><br>
	<tr><td>QPTION b.)</td><textarea name='opt2' cols='50' maxlength='200' required></textarea></tr><br>
	<tr><td>QPTION c.)<textarea name='opt3' cols='50' maxlength='200' required></textarea>	</td></tr><br>
	      <?php
	}
	elseif($cat==4)
	{
	?>
	<tr><td colspan='2' align='center'>QUESTION<textarea name='ques' cols='50' rows='5' maxlength='200' required></textarea>
						</td></tr><br><br>
	<tr><td>QPTION a.)<textarea name='opt1' cols='50' maxlength='200' required></textarea></td></tr><br>
	<tr><td>QPTION b.)<textarea name='opt2' cols='50' maxlength='200' required></textarea></td></tr><br>
	<tr><td>QPTION c.)<textarea name='opt3' cols='50' maxlength='200' required></textarea></td></tr><br>
	<tr><td>QPTION d.)<textarea name='opt4' cols='50' maxlength='200' required></textarea></td></tr><br>
	      <?php
	}
	elseif($cat==5)
	{
	?>
	<tr><td colspan='2' align='center'>PROGRAMMING QUESTION<textarea name='ques' cols='50' rows='5' maxlength='200' required></textarea>
						</td></tr><br>
	 <?php
	}
	elseif($cat==6)
	{
	?>
	<tr><td>Question Image<label>File: </label><input type="file" name="ques" required /><br><br>
	<tr><td>QPTION a.)<textarea name='opt1' cols='50' maxlength='200' required></textarea></td></tr><br>
	<tr><td>QPTION b.)<textarea name='opt2' cols='50' maxlength='200' required></textarea></td></tr><br>
	<tr><td>QPTION c.)<textarea name='opt3' cols='50' maxlength='200' required></textarea></td></tr><br>
	<tr><td>QPTION d.)<textarea name='opt4' cols='50' maxlength='200' required></textarea></td></tr><br>     
	      <?php
	}
	elseif($cat==7)
	{
	?>
	<tr><td colspan='2' align='center'>QUESTION<textarea name='ques' cols='50' rows='5' maxlength='200' required></textarea>
						</td></tr><br><br>
	<tr><td>QPTION a.)</td><textarea name='opt1' cols='50' maxlength='200' required></textarea></tr><br>
	<tr><td>QPTION b.)</td><textarea name='opt2' cols='50' maxlength='200' required></textarea></tr><br>
	<tr><td>QPTION c.)<textarea name='opt3' cols='50' maxlength='200' required></textarea>	</td></tr><br>
	<tr><td>QPTION d.)<textarea name='opt4' cols='50' maxlength='200' required></textarea>	</td></tr><br>
	<?php
	}

	if($cat==2)
	{
		echo "<td>Correct ANS is : <select name='corr' required><option value='a'>a</option><option value='b'>b</option></select></td>";
	}
	elseif($cat==3)
	{
		echo "<br>";
		echo "<td>Correct ANS is : <select name='corr' required><option value='a'>a</option><option value='b'>b</option><option value='c'>c</option></select></td>";

	}
	elseif($cat==4)
	{
		echo "<br>";
		echo "<td>Correct ANS is : <select name='corr' required><option value='a'>a</option><option value='b'>b</option><option value='c'>c</option><option value='d'>d</option></select></td>";
	}
	elseif($cat==5)
	{
		echo "<br>";
		echo "<td>Correct ANS is : <input type='text' name='corr' required></input></td>";
	}
	elseif($cat==6)
	{
		echo "<br>";
		echo "<td>Correct ANS is : <select name='corr' required><option value='a'>a</option><option value='b'>b</option><option value='c'>c</option><option value='d'>d</option></select></td>";
	}
	elseif($cat==7)
	{
	echo "<br>";
	echo "<td>Correct ANS is : <select name='corr' required><option value='a'>a</option><option value='b'>b</option><option value='c'>c</option><option value='d'>d</option><option value='ab'>a,b</option>
	<option value='ac'>a,c</option><option value='ad'>a,d</option><option value='bc'>b,c</option><option value='bd'>b,d</option><option value='cd'>c,d</option>
	<option value='abc'>a,b,c</option><option value='abd'>a,b,d</option><option value='acd'>a,c,d</option><option value='bcd'>b,c,d</option>
	<option value='bcd'>b,c,d</option><option value='abcd'>a,b,c,d</option></select></td>";
	}
	?>

