<!DOCTYPE HTML>
<html lang="eng">
	<?php
		require('../csv_util.php');
		function combineFormData()
		{
			$quote = $_POST['quote'];
			$authors = returnFile('../authors/authors.csv');
			$authorElement = 0;
			$newData = [];
			//loop to find the index for a specific author's name
			for($x = 0; $x < count($authors); $x++)
			{
				if ($authors[$x][0] == $_POST['author'])
				{
					$authorElement = $x;
				}
			}
			$newData[] = $quote;
			$newData[] = $authorElement;
			return $newData;
		}
		$newData = combineFormData();
		modifyRow($_GET['quoteIndex'], $newData, '../quotes/quotes.csv');
	?>
	<head>
		<title>Great Quotes - Quote Modified</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="../style.css">
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
				<p class="textlb" style="font-size: 100px;">Quote Modified!</p>
				<!--Buttons Row-->
				<div class="row" style="padding-top: 30px;">
					<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="detail.php?quoteIndex=<?= $_GET['quoteIndex'];?>">View Quote</a></div></div>
					<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="index.php">Home</a></div></div>
				</div>
			</div>
			<!--Small Footer Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Footer Bar-->
			<div class="lb" style="height: 30px;"></div>
		</div>
	</body>
</html>