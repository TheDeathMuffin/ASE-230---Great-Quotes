<?php
//Makes sure user is authorized to view this webpage
session_start();
if(!isset($_SESSION['logged']) || !isset($_SESSION['logged_user'])){
	header('location:../auth/not_registered.php');
}
?>
<!DOCTYPE HTML>
<html lang="eng">
	<?php
		require("../csv_util.php");
	?>
	<head>
		<title>Great Quotes - Delete Confirmation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<!--Body Container-->
		<div style="height: 100%;">
			<!--Top Bar-->
			<div class="lb" style="height: 60px;">
				<div class="butDivTwo" style="width: 300px; height: 60px; float: left;"><a class="butTwo" href="..\quotes\index.php">Switch to Quotes</a></div>
				<!--Will display sign out button if user is logged in-->
				<?php if(isset($_SESSION['logged']) && isset($_SESSION['logged_user'])) { ?>	
				<div class="butDivTwo" style="width: 300px; height: 60px; float: left; background-color: red;"><a class="butTwo" href="../auth/signout.php">Sign Out</a></div>
				<?php } ?>
				<?php if(!isset($_SESSION['logged']) || !isset($_SESSION['logged_user'])) { ?>	
				<!--Will display sign in button if user isn't logged in-->
				<div class="butDivThree" style="width: 300px; height: 60px; float: left;"><a class="butTwo" href="../auth/signin.php">Sign In</a></div>
				<?php } ?>
			</div>
			<!--Small Top Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Quote Column-->
			<div class="textColumn" style="min-height: 100%;">
				<p class="textlb" style="font-size: 100px;">Delete Quote</p>
				<form class="createForm" action="deleted.php?quoteIndex=<?= $_GET['quoteIndex'] ?>" method="POST">
					<h1 style="margin-bottom: -20px;">Are you sure you want to delete this quote?</h1>
					<!--Buttons Row-->
					<div class="row" style="padding-top: 70px;">
						<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><input class="but lb" style="border: 0px;" type="submit" value="Delete"></div></div>
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