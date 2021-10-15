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
			print_r($newRow);
			createRow($newRow, 'users.csv');
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

} else {
	Echo "Please enter some data";
};


// improve the form
?>
<form method="POST">
	Email:
	<input type="email" name="email" required="true" /> <br /><br />
	Password:
	<input type="password" name="password" required="true"/><br />Password must have at least 2 special characters and at least 8 characters<br /><br />
	Confirm Password:
	<input type="password" name="confirm_password" required="true"/><br />
	
	<input type="submit" value="submit" /> <br />
	<a href="signin.php">Sign in</a><br />
	<a href="..\quotes\index.php">Quotes</a><br />
	<a href="..\authors\index.php">Authors</a><br />
</form>
