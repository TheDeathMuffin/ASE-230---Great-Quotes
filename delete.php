<?php
require("csv_util.php");

?>
<form action="deleted.php?quoteIndex=<?= $_GET['quoteIndex'] ?>" method="POST">
	Are you sure you want to delete this quote?
	<input type="Submit" value="Yes">
	<h4><a href="index.php">Back to Home</a></h4>
	
</form>