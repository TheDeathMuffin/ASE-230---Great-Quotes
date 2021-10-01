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
<body>

<?php $authors = readCSV('authors.csv');
	  $authorName = "";
	  for ($x = 0; $x < count(readCSV('quotes.csv')); $x++){ ?>
		<?php
		$authorElement = readCSV('quotes.csv')[$x][1];
		$quoteIndex = $x;
		?>
		<h2><a href="detail.php?quoteIndex=<?= $quoteIndex?>&author=<?= returnRow($authorElement)[0]."_".returnRow($authorElement)[1] ?>"><?= "\"".readCSV('quotes.csv')[$x][0]."\" -".returnRow($authorElement)[0]." ".returnRow($authorElement)[1];?></a></h2><br />
	<?php } ?>
	
	<h2><a href="create.php">Create</a></h2>
</body>
</html>