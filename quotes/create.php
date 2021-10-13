<!DOCTYPE HTML>
<html lang="eng">
	<?php
		require("../csv_util.php");
	?>
	<head>
		<title>Great Quotes - Create</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="..\style.css">
	</head>
	<body>
		<!--Body Container-->
		<div style="height: 100%;">
			<!--Top Bar-->
			<div class="lb" style="height: 60px;">
				<div class="butDivTwo" style="width: 300px; height: 60px; float: left;"><a class="butTwo" href="..\authors\index.php">Switch to Authors</a></div>
				<?php if(isset($_SESSION)) { ?>	
				<div class="butDivTwo" style="width: 300px; height: 60px; float: left; background-color: red;"><a class="butTwo" href="..\signout.php">Sign Out</a></div>
				<?php } ?>
				<?php if(!isset($_SESSION)) { ?>	
				<div class="butDivThree" style="width: 300px; height: 60px; float: left;"><a class="butTwo" href="..\signin.php">Sign In</a></div>
				<?php } ?>
			</div>
			<!--Small Top Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Quote Column-->
			<div class="textColumn" style="min-height: 100%;">
				<p class="textlb" style="font-size: 100px;">Create a Quote</p>
				<form class="createForm" action="created.php" method="POST">
					<h2 style="margin-bottom: -10px;">Quote</h2><br/>
					<textarea name="quote" rows="7" cols="90" required></textarea><br/><br/>
					<h2 style="margin-bottom: -10px;">Author</h2><br/>
					<select name="author" id="authors"><br/><br/>
					<option value="none" Selected>None</option>
					<?php
						$authors = returnFile('..\authors\authors.csv');
						$i = 0;
						foreach($authors as $author){ ?>
							<option value="<?= $i ?>"><?= $author[0]." ".$author[1]; ?></option>
					<?php	$i++; } ?>
					</select><br/>
					<!--Buttons Row-->
					<div class="row" style="padding-top: 70px;">
						<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><input class="but lb" style="border: 0px;" type="submit" value="Create"></div></div>
						<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="index.php">Cancel</a></div></div>
					</div>
				</form>
			</div>
			<!--Small Footer Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Footer Bar-->
			<div class="lb" style="height: 30px;"></div>
		</div>
	</body>
</html>