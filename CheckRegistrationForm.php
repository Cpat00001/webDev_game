<!doctype html>
<html lang="en">
<head>
	
	<title> Welcome Page / Registration Form</title> <!-- page title-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.kopia.css">
	<meta charset="UTF-8"> <!-- read ANSI characters-->
	<meta name="keyword" content="university , wolverhampton,open day"><!-- key words for search engine-->
	<link rel="stylesheet" href="LoginStyle.css">
</head>
<body style="font-family: Verdana;">

<?php
include'loginMDB.php';
$conn = mysqli_connect($hn,$un,$pw,$db);

//check DB connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
	//echo " connected";
}
//include'loginValid.php';


$FNameEr = $LNameEr = $emailEr = $pswdEr = $pswd2Er = $notpass = "";
$FName = $LName = $email = $pswd = $pswd2 ='';
$boolean = 0;
$check_error = 0;

// check if form is sent as POST, check if input is not empty,if no then sanitize inserted values

If($_SERVER['REQUEST_METHOD']=='POST'){
	if(empty($_POST["FName"])){
		$FNameEr = "Required field";
		echo $FNameEr;
		$boolean = 1;
	}else{
		//check if name contain only letters and whitespace
		if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST['FName'])){
			$FNameEr = "Only letters and white spaces allowed in FIRST NAME </br>";
			echo $FNameEr;
			$boolean = 1;
			$check_error = 1;
		}else{
			//send an input to sanitize function
			$FName = checker($_POST["FName"]);
		}
	}
	if(empty($_POST["LName"])){
		$LNameEr = "Required field";
		$boolean = 1;
	}else{
		//check if name contain only letters and whitespace
		if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST['LName'])){
			$LNameEr = "Only letters and white spaces allowed in LAST NAME </br>";
			echo $LNameEr;
			$boolean = 1;
			$check_error = 1;
		}else{
			$LName = checker($_POST["LName"]);
		}
	}
 
	if(empty($_POST["email"])){
			$emailEr = "Email is required </br>";
			$boolean = 1;
		}else{
			//send email to sanitization function checker
			$email = checker($_POST["email"]);
			// check validation of email
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailEr = "Invalid email format </br>";
				echo $emailEr;
				$boolean = 1;
				}
		}
			
			/*$emailEr = "Email is required";
			$boolean = false;
					// Validates whether the value is a valid e-mail address..validates e-mail addresses against the syntax in RFC 822
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$emailEr = "Invalid email format";
					$boolean = false;
						// matches submitted characters
						if(!preg_match("/^[a-zA-Z0-9\_\.\-\@]*$/",$_POST['email'])) {
						echo "Only letters,numbers allowed in email.";
						$boolean=false;
						}
					}
			}else{
				//send email to sanitization function checker
			$email = checker($_POST["email"]);
				
			}	  
	*/
	if(empty($_POST["pswd"])){
		$pswdEr = "Required field";
		$boolean = 1;
	}else{
		$len = strlen($_POST['pswd']);
			
			//conditional checks lenght of password 10< $len <20
			if($len<10){
				$toshortpswd = "Password must be longer than 10 characters,but less than 20 </br>";
				echo $toshortpswd;
				$boolean = 1;
			}elseif($len>20){
				$tolongpswd = "Password cant be longer than 20 characters </br>";
				echo $tolongpswd;
				$boolean = 1;
			}else{
				echo "";
			}
	
		}
		
		if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST['pswd'])){
		$pswd  = checker($_POST["pswd"]);
		
	}
	if(empty($_POST["pswd2"])){
		$pswd2Er = "Required field";
		$boolean = 1;
	}else{
		$pswd2 = checker($_POST["pswd2"]);
	}
}

// check if password and password confrimation are the same
	if(isset($_POST["pswd"], $_POST["pswd2"])) {
		if($_POST["pswd"] != $_POST["pswd2"]){
			$notpass = "password confirmation doesnt match </br>";
			echo $notpass;
			$boolean = 1;
		}
	}
	
	//check form submition
	if($_SERVER['REQUEST_METHOD']=='POST'){
		// form validation if required input fields submitted AND password and confirmation matches,then create and add user into DB user AND login
		//if(isset($_POST['FName'],$_POST['LName'],$_POST['email'],$_POST['pswd'],$_POST['pswd2'], $_POST['Regsubmit']) && ($_POST["pswd"] === $_POST["pswd2"])){
		//checking empty erros messages if no errors then register
		//if(empty($FNameEr) && empty($LNameEr) && empty($emailEr) && empty($pswdEr) && empty($pswd2Er)) && ($_POST["pswd"] === $_POST["pswd2"]){
		if(empty($boolean) && ($_POST["pswd"] === $_POST["pswd2"])) {
		$email2 = $_POST['email'];
		
		$query = "SELECT * FROM user WHERE email = '$email2'";
		//print($query);
		
		$query_run1 = mysqli_query($conn, $query);
		
			if(mysqli_num_rows($query_run1)>0){
				//display message: user already exists
				echo "there is already user with this email </br>";
			}else{
				//if theres no existing user,create a new one in DB tables
				
				//salting submitted password and using hash function to encrypt password - do not store plain text.
				$pswd = checker($_POST["pswd"]);
				$salt1 = "gm&hh";
				$salt2 = "pg49";
				$token = hash('ripemd128',"$salt1$pswd$salt2");
				//print $token;
				
				
				$query2 = "INSERT INTO user(first_name,last_name,email) VALUES('$FName','$LName','$email')";
				//replace $pswd which is S_POST['email'] with $token which is $salt1 + $pswd + $salt2
				$query3 = "INSERT INTO login(email,password) VALUES('$email','$token')";	
				
				//print $query3;
				
				$query_run = mysqli_query($conn,$query2);
				$query_run = mysqli_query($conn,$query3);
			
				
					if($query_run){
						//inform about sucessfully registration
						$registered = "you have been registered ";
						echo $registered;
						echo "<h3> you can go and login now</br>click link below</h3>"; 
						$link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/registrationForm.php";
						echo "<a href='".$link."'>Click me</a>";
						// send an email to confirm registration.for test just use variable from this file.in future use outer php file
						//include'emailConfirmation.php';
							$to = '$email';
							$subject = 'Wolverhampton University Registration Confirmation';
							$message = 'Hello you have been registered in our University Open Day.\n
							Use submitted values to login at Student Office.\n
							Please remember nearest Interactive Open Day is on 01 May 2018 \n
							See you there , student office building MI , grand floor, room 123';
							mail($to,$subject,$message);
					}
						
			
					
				}
	}else{
		echo "sorry we culdnt register you,try again by clicking link below </br>";
		$link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/registrationForm.php";
		echo "<a href='".$link."'>Click me</a>";
	}
		
	
	}


function checker($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
</body>
</html>