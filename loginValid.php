<!doctype html>
<html lang="en">
<head>
	
	<title> Welcome Page / Registration Form</title> <!-- page title-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.kopia.css">
	<meta charset="UTF-8"> <!-- read ANSI characters-->
	<meta name="keyword" content="university , wolverhampton,open day"><!-- key words for search engine-->
	<!--<link rel="stylesheet" href="LoginStyle.css">-->
</head>
<body style="font-family: Verdana;">

<?php // loginValid.php

include'loginMDB.php';
$conn = mysqli_connect($hn,$un,$pw,$db);
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	exit(); 
}
else {
	//echo " connected";
}

$emailEr = $pswdEr = "";
$email  = $pswd    = "";
$boolean = 0;


if(empty($_POST["Logemail"])){
		$emailEr = "Required field </br>";
		$boolean = 1;
	}else{
		$Logemail = check($_POST["Logemail"]);
		// check validation of email
		if (!filter_var($Logemail, FILTER_VALIDATE_EMAIL)) {
		  $emailEr = "Invalid email format. Try again , click link below</br>";
		  echo $emailEr;
		  $link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/registrationForm.php";
		  echo "<a href='".$link."'>Click me</a>";
		  $boolean = 1;
		}else{
			echo "SOMETHING WRONG WITH YOUR EMAIL/PASSWORD.";
			echo "Try again by clicikng link below</br>";
			$link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/registrationForm.php";
			echo "<a href='".$link."'>Click me</a>";
			$boolean = 1;
		}	  
	}
	if(empty($_POST["Logpswd"])){
		$pswdEr = "Required field";
		$boolean = 1;
	}else{
		$Logpswd  = check($_POST["Logpswd"]);
	}
	
function check($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(empty($emailEr && $pswdEr && $boolean==0) AND isset($_POST['Logsubmit'])){ 
	// no errors occured then retrive user_id,first_name,last_name for submitted email/password combination
	
	$email1 = $_POST['Logemail'];
	print $email1;
	$password = $_POST['Logpswd'];
	
	//salting submitted password and using hash function to encrypt password - do not store plain text.
				$salt1 = "gm&hh";
				$pswd = $_POST['Logpswd'];
				print $pswd;
				$salt2 = "pg49";
				$token = hash('ripemd128',"$salt1$pswd$salt2");
				//print $token;
	
	// select from BD values submitted in input fields
	//run the query $q2 against BD 
	
	$q2 = "SELECT password FROM login WHERE email = '$email1'";
	$query_run = mysqli_query($conn,$q2);
		//myssqli_guery run and return array/rows which can be assign to variable in this case $token
			if($query_run->num_rows){
				$row = $query_run-> fetch_array(MYSQLI_NUM);
				//print($row);
					if($token ==$row[0]) {
						//echo "WELCOME";
						header("Location:Login.php");
					}else{
						//echo "INVALID MATCHING";
						// if not logged in, display information
						echo "<h3>Sorry,The email and password not match those registered. Try again</h3></br></br> ";
						$link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/registrationForm.php";
						echo "<a href='".$link."'>Click me to try again</a>";
						
					}
				
			}else{
					
		}
				
	}

			 
			
	
?>
</body>
</html>

