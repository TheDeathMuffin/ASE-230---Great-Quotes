<!DOCTYPE HTML>
<html lang="eng">
<?php

require('csv_util.php');

deleteRow($_GET['quoteIndex'], 'quotes.csv');
?>
<body>
	<h1>Quote has been Deleted</h2>
	<h3><a href="detail.php?quoteIndex=<?= $_GET['quoteIndex'];?>">Detail page</a></h3>
</body>
</html>