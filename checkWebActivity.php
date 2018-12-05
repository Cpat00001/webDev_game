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

<?php // check webActivity input
include 'loginMDB.php';
$conn = mysqli_connect($hn,$un,$pw,$db);

//check DB connection_aborted
if(!$conn) {
	die("Connection failed : ". mysqli_connect_error());
}else {
	//echo "Connected sucessfully";
}

$emailEr = $pswdEr = "";

// check if required input fields submitted,if yest check validation and send to sanitization
If($_SERVER["REQUEST_METHOD"]=="POST"){
		if(empty($_POST["email"])){
			$emailEr = "Email is required </br>";
			echo emailEr;
		}else{
			//send email to sanitization function checker
			$email = checker($_POST["email"]);
			// check validation of email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailEr = "Invalid email format </br>";
			echo $emailEr;
			echo "<h3> Please try again to login</br>click link below</h3>"; 
			$link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/LoginWebActivity.php";
			echo "<a href='".$link."'>Click me</a></br>";
			//display message when wrong/not macching email/password
			$notmatch = "<p>submitted email/password doesnt match! try again</p>";
			echo $notmatch;
			echo "<h3> Please try again to login</br>click link below</h3>"; 
			$link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/LoginWebActivity.php";
			echo "<a href='".$link."'>Click me</a></br>";
			}	  
		}
		if(empty($_POST["pswd"])){
			$pswdEr = "password is required </br>";
			//for test display password...echo $pswdEr;
		}else {
			//send password to sanitization function checker
			$pswd = checker($_POST["pswd"]);
		}
}

// function which has 3 built-in functions to sanitize submitted input
function checker($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// if input fields are not empty check if submitted data/user is registered in DB - if not dislay message in <span> box
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['email'],$_POST['pswd'])){
		// if submitted email and password but not matching display message and link to back
		echo "something went wrong not matching email/password.try again</br>";
		$link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/LoginWebActivity.php";
		echo "<a href='".$link."'>Click me</a></br>";
		
		//salting submitted password and using hash function to encrypt password, and match with this stored in DB.
				$salt1 = "gm&hh";
				$pswd = $_POST['pswd'];
				//print $pswd;
				$salt2 = "pg49";
				$token = hash('ripemd128',"$salt1$pswd$salt2");
				//print $token;
				$email1 = $_POST["email"];
		
						$q2 = "SELECT password FROM login WHERE email = '$email1'";
						$query_run = mysqli_query($conn,$q2);
						//myssqli_guery runs and returns array/rows which can be assign to variable in this case $token
							if($query_run->num_rows){
								$row = $query_run-> fetch_array(MYSQLI_NUM);
								//print($row);
									if($token ==$row[0]){
									//echo "for test only IT WORKS";
									//query to DB check if submitted data is registered in DB if yes send user to web activity welcome page,
									//if not registered in DB display message<span> and do not login into an activity
									$query = "SELECT email,password FROM login WHERE email='$email' AND password = '$token'";
									$result = mysqli_query($conn,$query);
										if(mysqli_num_rows($result)>0){
											//$match = "submitted data mateches!";
											//echo $match;
												//working and retriving select query in DB,to get user first name,assign it to session and display on next websites 
												$sql = "SELECT user.first_name FROM user INNER JOIN login ON user.email = login.email WHERE login.email = '{$_POST['email']}'"; 
												$result = mysqli_query($conn, $sql);
								
												if(mysqli_num_rows($result)>0){
													while($row = mysqli_fetch_assoc($result)){
														echo "FName : " .$row["first_name"];
														$xxx = $row["first_name"];
													}
												}
											session_start();
											$_SESSION['useremail'] = $email;
											$_SESSION['logintime'] = time();
											$_SESSION['first_name'] = $xxx;
											header('Location:http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/webbuild5.php');
										}
									}else{
											//display message when wrong/not macching input to this in DB
											/*$notmatch = "<p>submitted email/password doesnt match! try again</p>";
											echo $notmatch;
											echo "<h3> Please try again to login</br>click link below</h3>"; 
											$link = "http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/LoginWebActivity.php";
											echo "<a href='".$link."'>Click me</a>";
											*/
										 }
										 
							}

	}
	
}
?>
</body>
</html>




















