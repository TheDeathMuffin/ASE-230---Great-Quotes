<!DOCTYPE HTML>
<html lang="eng">
    <head>
		<title>Sign Up</title>
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
                <p class="textlb" style="font-size: 100px;">Sign Up</p>
<?php
require('../csv_util.php');
//session_start();
// if the user is alreay signed in, redirect them to the members_page.php page

// use the following guidelines to create the function in auth.php
// instead of using "die", return a message that can be printed in the HTML page
if(count($_POST)>0){
	
	$bannedUsers = returnfile('banned.csv');
	// check if the fields are empty
	if(!isset($_POST['email'][0])){
		echo "FAILED: Please enter your email";
	//checks if the email is a valid email
	} else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		echo "FAILED: Please enter a valid email";
	//checks if information has been entered for password
	} else if(!isset($_POST['password'][0])){
		echo "FAILED: Please enter your password";
	//checks for atleast 2 special characters in the password
	} else if(!preg_match('/([A-Za-z0-9]*[^A-Za-z0-9]+){2,}[A-Za-z0-9]*/', $_POST['password'])){
		echo "FAILED: Please include at least 2 or more special characters in your password";
	//checks if password meets character requirement
	}else if(strlen($_POST['password']) < 8){
		echo "FAILED: Your password must be atleast 8 characters";
	//checks if password has been confirmed accurately
	} else if($_POST['password'] != $_POST['confirm_password']){
		echo "FAILED: Passwords do not match";
	}else {
		$error = false;
		if(file_exists('users.csv')){
			$users = returnFile('users.csv');
			//This loop makes sure the user isn't already registered
			foreach($users as $user){
				if($user[0] == $_POST['email']){
					echo "FAILED: Email already registered";
					$error = true;
					break;
				}
			}
			//This loop makes sure the user isn't banned
			foreach($bannedUsers as $bannedUsers){
				if($bannedUsers[0] == $_POST['email']){
					echo "FAILED: Email account is BANNED";
					$error = true;
					break;
				}
			}
		} else {
			echo "There is no user database";
			$error = true;
		}
		//will contain code to put the data in the database;
		//Conditional statement that 
		if($error == false){
			echo "Email:". $_POST['email'];
			echo "Password:". $_POST['password'];
			$newRow = array();
			$newRow[] = $_POST['email'];
			$newRow[] = password_hash($_POST['password'], PASSWORD_BCRYPT);
			createRow($newRow, 'users.csv');
			session_start();
			$_SESSION['logged_user']=$_POST['email'];
            $_SESSION['logged']=true;
            header('location:../authors/index.php');
		}
		
	}
	#*NOTE: ADD ALL THESE AUTHENTICATION REQUIREMENTS
	// check if the password contains at least 2 special characters
	// check if the file containing banned users exists
	// check if the email has not been banned
	// check if the file containing users exists
	// check if the email is in the database already
	// encrypt password
	// save the user in the database 
	// show them a success message and redirect them to the sign in page

};
?>
				<form class="createForm" method="POST">
					<h2 style="margin-bottom: -10px;">Email</h2><br/>
                    <input style="margin-bottom: 15px;" type="email" name="email" /><br />
                    <h2 style="margin-bottom: -10px;">Password</h2><br><h5 style="margin-top: -10px; margin-bottom: 10px;">(Password must have at least 2 special characters and at least 8 characters.)</h5>
                    <input type="password" name="password" /><br/>
					<h2 style="margin-top: 20px; margin-bottom: -10px;">Confirm Password</h2><br>
					<input type="password" name="confirm_password" required="true"/><br /><br/>
					<!--Buttons Row-->
					<div class="row" style="padding-top: 30px;">
                        <div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><input class="but lb" style="border: 0px;" type="submit" value="Sign Up"></div></div>
                        <div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="..\authors\index.php">Back to Sign In</a></div></div>
                        <div class="col-md-2 col-sm-5 col-xs-12"><div class="butDiv"><a class="but" href="..\authors\index.php">Cancel</a></div></div>
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