<!DOCTYPE HTML>
<html lang="eng">
	<?php
		require("../csv_util.php");
		function deleteAuthor($Index) 
		{
			deleteRow($Index, 'authors.csv');
			$quotes = returnFile('..\quotes\quotes.csv');
			$quoteExists = false;
			foreach($quotes as $quote)
			{
				if ($quote[1] == $Index)
				{
					$quoteExists = true;
				}
			}
			if ($quoteExists)
			{
				$j = 0;
				foreach($quotes as $quote)
				{
					if ($quote[1] == $Index)
					{
						deleteRow($j, '..\quotes\quotes.csv');
						continue;
					}
					elseif ($quote[1] > $Index)
					{
						$quote[1] = $quote[1] - 1;
						modifyRow($j, $quote, '..\quotes\quotes.csv');
					}
					$j++;
				}
			}
		}
		
		
		
		#function deleteAuthor($authorIndex){
		#	deleteRow($authorIndex, 'authors.csv');
		#	$counter = 0;
		#	$updatedData = array();
		#	$quotes = returnFile('..\quotes\quotes.csv');
		#	foreach($quotes as $quote){
		#		$quotes[$counter][1] = $quote[1] - 1;
		#		$counter++;
		#	}
		#	print_r($quotes);
		#}



		deleteAuthor($_GET['Index']);
	?>
	<head>
		<title>Great Quotes - Quote Deleted</title>
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
				<p class="textlb" style="font-size: 100px;">Author Deleted!</p>
				<!--Buttons Row-->
				<div class="row" style="padding-top: 30px;">
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