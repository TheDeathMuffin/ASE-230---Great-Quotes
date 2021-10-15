<?php
session_start();
// if the user is already signed in, redirect them to the members_page.php page

// use the following guidelines to create the function in auth.php
//instead of using "die", return a message that can be printed in the HTML page
if(count($_POST)>0){
	// 1. check if email and password have been submitted

    if(!isset($_POST['email'][0]) || !isset($_POST['password'][0])){
        echo 'All fields are required';
        die();
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password)<8){
        echo 'Please provide a valid email address and password';
        die();
    }

	// 4. check if the file containing banned users exists
        if(file_exists('banned.csv')){
            //echo 'The file exists';
            // 5. check if the email has been banned
            $handle=fopen('banned.csv', 'r+');
            while(!feof($handle)){
                if(fgets($handle)==$email){
                    echo 'you have been banned';
                    fclose($handle);
                    die();
                }
            }
            fclose($handle);
            // 6. check if the file containing users exists
            if(file_exists('users.csv')){
                // 7. check if the email is registered
                $h = fopen('users.csv', 'r+');
                while(!feof($h)){
                    $line = fgets($h);
                    $data = explode(';', $line);
                    var_dump($data);
                    // 8. check if the password is correct
                    if($data[0]==$email && $data[1]==$password){
                        echo 'valid email and password';
                        // 9. store session information
                        $_SESSION['logged_user']=$email;
                        header('location: members.php');
                        // 10. redirect the user to the members_page.php page
                        die();
                    }
                }
                fclose($h);
                echo 'The email is not registered, please signup';
            }
        }



	
	/*
	echo 'check email+password';
	if(true){
		$_SESSION['logged']=true;
		
	}else $_SESSION['logged']=false;
	*/
}

// improve the form
?>
<form method="POST">
    Email
	<input type="email" name="email" /><br />
    Password
	<input type="password" name="password" /><br/>
	
	<input type="submit" value="submit" />
</form>
