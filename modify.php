<?php

require('csv_util.php');

?>

<form action="modified.php?quoteIndex=<?= $_GET['quoteIndex'] ?>" method="POST">
	Quote<br />
	<textarea name="quote" rows="15" cols="30" required /></textarea><br /><br />
	Authors<br />
	<!--><select name="modify" id="modify" /><br /><br />
	<option value="true" Selected>True</option>
	</select><!-->
	<select name="author" id="authors" /><br /><br />
	<option value="none" Selected>None</option>
	<?php
		$authors = returnFile('authors.c sv');
		foreach($authors as $author){ ?>
			<option value="<?= $author[0] ?>"><?= $author[0]." ".$author[1]; ?></option>
	<?php	} ?>
	</select>
	<input type="submit" value="true">
	
</form>