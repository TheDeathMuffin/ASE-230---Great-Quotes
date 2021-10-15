<?php
session_start();
/*
if(!isset($_SESSION['logged']) || !isset($_SESSION['logged_user'])){
	header('location:../auth/signup.php');
}
*/
?>
<!DOCTYPE HTML>
<html lang="eng">
	<?php
		require('../csv_util.php');
	?>
	<head>
		<title>Great Authors - Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="../style1.css">
	</head>
	<body>
		<!--Body Container-->
		<div style="height: 100%;">
			<!--Top Bar-->
			<div class="lb" style="height: 60px;">
				<div class="butDivTwo" style="width: 300px; height: 60px; float: left;"><a class="butTwo" href="..\quotes\index.php">Switch to Quotes</a></div>
				<?php if(isset($_SESSION['logged']) && isset($_SESSION['logged_user'])) { ?>	
				<div class="butDivTwo" style="width: 300px; height: 60px; float: left; background-color: red;"><a class="butTwo" href="../auth/signout.php">Sign Out</a></div>
				<?php } ?>
				<?php if(!isset($_SESSION['logged']) || !isset($_SESSION['logged_user'])) { ?>	
				<div class="butDivThree" style="width: 300px; height: 60px; float: left;"><a class="butTwo" href="../auth/signin.php">Sign In</a></div>
				<?php } ?>
			</div>
			<!--Small Top Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Quote Column-->
			<div class="textColumn" style="min-height: 100%;">
				<p class="textlb" style="font-size: 100px;">Authors</p>
				<?php $authors = returnFile('authors.csv');
					for ($x = 0; $x < count(returnFile('authors.csv')); $x++){ ?>
						<p><a class="otb" href="detail.php?Index=<?= $x?>"><?= "".$authors[$x][0]." ".$authors[$x][1];?></a></p><br />
				<?php } ?>
				<!--Buttons Row-->
				<?php if(isset($_SESSION['logged']) && isset($_SESSION['logged_user'])){ ?>
				<div class="row" style="padding-top: 30px;">	
					<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="create.php">Create</a></div></div>
				</div>
				<?php } ?>
			</div>
			<!--Small Footer Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Footer Bar-->
			<div class="lb" style="height: 30px;"></div>
		</div>
	</body>
</html>