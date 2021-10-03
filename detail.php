<!DOCTYPE HTML>
<html lang="eng">
<?php
require('csv_util.php');
$authorIndex = returnFile('quotes.csv')[$_GET['quoteIndex']][1];
$firstName = returnRow($authorIndex)[0];
$lastName = returnRow($authorIndex)[1];

?>
<body>
	<h2><?= returnFile('quotes.csv')[$_GET['quoteIndex']][0]." -".$firstName." ".$lastName;  ?></h2>
	<h4><a href="delete.php?quoteIndex=<?= $_GET['quoteIndex']; ?>">Delete</a></h4>
	<h4><a href="modify.php?quoteIndex=<?= $_GET['quoteIndex']; ?>">Modify</a></h4>
	<h4><a href="index.php">Index</a></h4>
</body>
</html>