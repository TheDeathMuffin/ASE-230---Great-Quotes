<!DOCTYPE HTML>
<html lang="eng">
<?php

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
			foreach($authors as $author){
				if($author[1] == readCSV('quotes.csv')[$x][1]){
					$authorName = $author[0];
				}
			}
		?>
		<h2><?= readCSV('quotes.csv')[$x][0]." -".$authorName;?></h2><br />
	<?php } ?>
</body>
</html>