<?php 
session_start();
?>
<!DOCTYPE HTML>
<html lang="eng">
	<?php
		require('../csv_util.php');
	?>
	<head>
		<title>Great Quotes - Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<!--Body Container-->
		<div style="height: 100%;">
			<!--Top Bar-->
			<div class="lb" style="height: 60px;">
				<div class="butDivTwo" style="width: 300px; height: 60px; float: left;"><a class="butTwo" href="..\authors\index.php">Switch to Authors</a></div>
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
				<p class="textlb" style="font-size: 100px;">Great Quotes</p>
				<?php $authors = returnFile('..\authors\authors.csv');
					if (0 >= count($authors)) 
					{ ?>
						<h1 class="textlb">There are no authors!</h1>
						<div class="row" style="padding-top: 30px;">
							<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="..\authors\index.php">Create Author</a></div></div>
						</div>
					<?php }
					else
					{
					$authorName = "";
					//Loop that prints the quotes on the index page
					for ($x = 0; $x < count(returnFile('quotes.csv')); $x++){
						$authorElement = returnFile('quotes.csv')[$x][1];
						$quoteIndex = $x;
						?>
						<p><a class="otb" href="detail.php?quoteIndex=<?= $quoteIndex?>"><?= "\"".returnFile('quotes.csv')[$x][0]."\" ~".returnRow($authorElement)[0]." ".returnRow($authorElement)[1];?></a></p><br />
					<?php } ?>
					
				<!--Buttons Row-->
				<!--Shows create button if user is logged in-->
				<?php if(isset($_SESSION['logged']) && isset($_SESSION['logged_user'])){ ?>
				<div class="row" style="padding-top: 30px;">
					<div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="create.php">Create</a></div></div>
				</div> <?php }} ?>
			</div>
			<!--Small Footer Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Footer Bar-->
			<div class="lb" style="height: 30px;"></div>
		</div>
	</body>
</html>