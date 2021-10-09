<!DOCTYPE HTML>
<html lang="eng">
	<?php
		require('csv_util.php');
		function readCSV($csvFile)
		{
			$newData = $_POST;
			$csvArray = array();
			$handle = fopen($csvFile, 'r');
			while (($line = fgetcsv($handle)) !== FALSE) 
			{
				$csvArray[] = $line;
			}
			fclose($handle);
			return $csvArray;
		}
	?>
	<head>
		<title>Great Quotes - Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<!--Body Container-->
		<div style="height: 100%;">
			<!--Top Bar-->
			<div class="lb" style="height: 60px;"></div>
			<!--Small Top Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Quote Column-->
			<div class="textColumn" style="min-height: 100%;">
				<p class="textlb" style="font-size: 100px;">Great Quotes</p>
				<?php $authors = readCSV('authors.csv');
					$authorName = "";
					for ($x = 0; $x < count(readCSV('quotes.csv')); $x++){ ?>
						<?php
						$authorElement = readCSV('quotes.csv')[$x][1];
						$quoteIndex = $x;
						?>
						<p><a class="otb" href="detail.php?quoteIndex=<?= $quoteIndex?>"><?= "\"".readCSV('quotes.csv')[$x][0]."\"<br>~".returnRow($authorElement)[0]." ".returnRow($authorElement)[1];?></a></p><br />
				<?php } ?>
				<!--Buttons Row-->
				<div class="row" style="padding-top: 30px;">
					<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="create.php">Create</a></div></div>
				</div>
			</div>
			<!--Small Footer Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Footer Bar-->
			<div class="lb" style="height: 30px;"></div>
		</div>
	</body>
</html>