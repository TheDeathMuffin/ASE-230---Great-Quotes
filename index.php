<!DOCTYPE HTML>
<html lang="eng">
<?php
require('csv_util.php');
function readCSV($csvFile){
	$newData = $_POST;
	$csvArray = array();
	$handle = fopen($csvFile, 'r');
	while (($line = fgetcsv($handle)) !== FALSE) {
		$csvArray[] = $line;
	}
	
	fclose($handle);
	return $csvArray;
}
?>
<head>
		<title>Great Quotes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
</head>
<body class="b" style="font-family: Arial, sans-serif;">
<?php $authors = readCSV('authors.csv');
	  $authorName = "";
	  for ($x = 0; $x < count(readCSV('quotes.csv')); $x++){ ?>
		<?php
		$authorElement = readCSV('quotes.csv')[$x][1];
		$quoteIndex = $x;
		?>
		<p><a href="detail.php?quoteIndex=<?= $quoteIndex?>"><?= "\"".readCSV('quotes.csv')[$x][0]."\" -".returnRow($authorElement)[0]." ".returnRow($authorElement)[1];?></a></p><br />
	<?php } ?>
		<h2><a href="create.php">Create</a></h2>
		<!--Top Bar-->
		<div class="lb" style="height: 60px;"></div>
		<!--Small Top Bar-->
		<div class="lg" style="height: 5px;"></div>
		<!--Body-->
		<div class="" style="height: 0 auto; min-height: 200px; margin-bottom: 30px; padding: 30px;">
</body>
</html>