<!DOCTYPE HTML>
<html lang="eng">
	<?php
		require('../csv_util.php');
		$authors = returnFile('authors.csv');
		$firstName = $authors[$_GET['Index']][0];
		$lastName = $authors[$_GET['Index']][1];
	?>
	<head>
		<title>Great Authors - <?="".$firstName." ".$lastName?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="..\style1.css">
	</head>
	<body>
		<!--Body Container-->
		<div style="height: 100%;">
			<!--Top Bar-->
			<div class="lb" style="height: 60px;">
				<div class="butDivTwo" style="width: 300px; height: 60px; float: left;"><a class="butTwo" href="..\quotes\index.php">Switch to Authors</a></div>
				<?php if(isset($_SESSION)) { ?>	
				<div class="butDivTwo" style="width: 300px; height: 60px; background-color: red; float: left;"><a class="butTwo" href="..\signout.php">Sign Out</a></div>
				<?php } ?>
			</div>
			<!--Small Top Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Quote Column-->
			<div class="textColumn" style="min-height: 100%;">
				<p class="textlb" style="font-size: 100px;"><?= "".$firstName." ".$lastName?></p>
				<h1 class="textlb">Quotes:</h1><br>
				<?php $quotes = returnFile('..\quotes\quotes.csv');
					for ($x = 0; $x < count(returnFile('..\quotes\quotes.csv')); $x++){
						if ($quotes[$x][1] == $_GET['Index']) {
						?>
						<h2><a class="singleQuote" href="..\quotes\detail.php?quoteIndex=<?= $x?>"><?= "\"".$quotes[$x][0]."\"";?></a></h2><br/>
				<?php }} ?>
				<!--Buttons Row-->
				<div class="row" style="padding-top: 30px;">
					<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="index.php">Home</a></div></div>
					<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="modify.php?Index=<?= $_GET['Index']; ?>">Modify</a></div></div>
					<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="delete.php?Index=<?= $_GET['Index']; ?>">Delete</a></div></div>
				</div>
			</div>
			<!--Small Footer Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Footer Bar-->
			<div class="lb" style="height: 30px;"></div>
		</div>
	</body>
</html>