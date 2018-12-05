<?php
session_start();
?>
<?php
// set variables passed from login form
//$mail = '$email';
//$password = '$pswd';

if(isset($_SERVER['PHP_AUTH_USER'])	 && 
   isset($_SERVER['PHP_AUTH_PW'])){
			
			// added comment to echo - not to display this on website
			//echo $_SERVER['PHP_AUTH_USER'];
			//echo $_SERVER['PHP_AUTH_PW'];
			
			//check input validation from pop up window
	   /*if($_SERVER['PHP_AUTH_USER'] == $mail &&
				$_SERVER['PHP_AUTH_PW'] == $password)
	   
	   echo "Welcome, you are logged in";
				else die("Invalid mail/password combination");
	*/
   }else{
	   header('WWW-Authenticate: Basic realm="Restricted Section"');
	   header('HTTP/1.0 401 Unauthorized');
	   die("Please enter your username and password");
   }	
 include 'loginMDB.php';
?>
<! doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Web build activity.Feedback</title>
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!-- website with emoticons used in survey https://afeld.github.io/emoji-css/-->
<style>

	html,body {
		width:100%;
		height:100%;
		background-color:rgb(74,90,128);
		position:absolute;
		margin:0;
	}
	*{
		box-sizing:border-box;
	}
	#div1{
		width:100%;
		height:auto;
		margin-left:10%;
		
	}
	#div2{
		width:100%;
		height:auto;
		float:left;
		left:50%;
		margin-left:8%;
		margin-top:2%;
	}
	.div3{
		display:flex;
		flex-wrap:wrap;
		flex-direction:row;
		width:100%;
		height:10%;
		background-color:rgb(74,90,128);
		justify-content:space-between;
		
	}
	.div3 > div{
		width:20%;
		height:100%;
		margin:2%;
		background-color:black;
		color:white;
		text-align:center;
		border-radius:5px;
		
	}
	#div4{
		width:100%;
		height:10%;
		float:left;
	}
	#div5{
		width:100%;
		height:100%;
		display:flex;
		justify-content:center;
		
	}
	#p1 {
		font-family:Verdana;
		color: rgb(220,220,220);
		line-height:1.8;
		font-size:25px;
		margin: 15px;
		word-spacing:5px;
		text-align:left;
	}
	#p2 {
		font-family:Verdana;
		color: rgb(220,220,220);
		text-align: center;
		line-height:1.8;
		font-size:25px;
		margin: 5px;
		word-spacing:5px;
		align-items:flex-end;
	}
	.em, .em-svg{
		width:100%;
		height:100%;
	}
	.btn1 {
		width: 100%;
		height:100%;
		/*padding: 5px;*/
		background-color:rgb(74,90,128);
		border:none;
		color:rgb(240,200,100);
		text-align:center;
		font-family: Verdana;
		font-size: 15px;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		border-radius:5px;
		cursor:pointer;
	}
	.btn1:hover {opacity: 1}
	
	.btn2 {
		width: 100%;
		height:100%;
		padding: 20px;
		background-color:#54baa1;
		border:none;
		color:rgb(240,200,100);
		text-align:center;
		font-family: Verdana;
		font-size: 15px;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		border-radius:5px;
	}
	.btn2:hover {opacity: 1}
	
	@media only screen and (max-width:600px){
		#p1{
			font-size:20px;
		}
		#p2 { 
			font-size:20px;
		}
	}
</style>
</head>
<body>
<div id="div1">
<p id="p1">
Great answer <?php echo $_SESSION['first_name'];?>!</br>
</p>
<h2 style="color:gold">  please write down these two letters "WO". collect it to complete your University open puzzle day</h2>
<p id="p1">We are happy that you have learnt something new, -</br>how to change elements of your first web site...
</p>
</div>
<div id="div2">
<p id="p2">
We value your feedback.</br>
did you enjoy this activity?</br>
Please click a picture below which reflects your opinion. </br></br>
</p>
</div>

<div class="div3">

<div><form method="post" action="webbuild18.php"><button class="btn1" input type="submit"  name="one" value="1"><i class="em em-frowning"></i></button></form></div><!-- emoticons from website added in head section-->
<div><form method="post" action="webbuild18.php"><button class="btn1" name="two"><i class="em em-expressionless"></i></button></form></div>
<div><form method="post" action="webbuild18.php"><button class="btn1" name="three"><i class="em em-grin"></i></button></form></div>
<div><form method="post" action="webbuild18.php"><button class="btn1" name="four"><i class="em em-grinning_face_with_star_eyes"></i></button></form></div>

</div>

<?php	
//connection to DB
$conn = mysqli_connect($hn,$un,$pw,$db);

//check DB connection_aborted
if(!$conn) {
	die("Connection failed : ". mysqli_connect_error());
	}else{ 
	//echo "18 CONNECTED";
}

// this section returns two values user_id,and second login time from SESSION UNIX format to readable format
// these two values will be used in every insert below,after clicked button with Face/mark
$query3 = "SELECT user_id FROM login WHERE email = '{$_SESSION['useremail']}'";
		$result2 = mysqli_query($conn,$query3);

			if(mysqli_num_rows($result2)>0){
					//fetch associative array runs and outputs data from DB rows,then echo which you want using $row['colunname'] 
				while($row = mysqli_fetch_assoc($result2)){
					//echo "USER_ID: " .$row['user_id'];
					// intval changes string value into INT, which is required in user_id column - primary key(INT)
					$useridrow = intval($row['user_id']);
					var_dump($useridrow);
				}
			}
		
		//convert UNIX time into readable time,stored in DB
		$timestamp = $_SESSION['logintime'];
		$starttime = date('H:i:s',$timestamp);
		print "THIS IS CONVERTED TIME" .$starttime;
		//var_dump($timestamp);
		//var_dump($starttime);
		
		//print "this is SESSIONTIME time " .$starttime;
		//$starttime = strftime('%X');

// check if the form has been submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
//if clicked button name ="one" then execute $query and send feedback to DB, table activity_1 column feedback
	if(isset($_POST['one'])){
				//changed userid into INT by intavl function.from $_SESSION['useremail'] 
				$useridrow = intval($row['user_id']);
				//change UNIX time into 'H:i:s' using dat() function
				$starttime = date('H:i:s',$timestamp);
		
				
				//INSERT query record new row with user data
				$query = "INSERT INTO act1 (user_id,duration,feedback,start,complete) VALUES ('$useridrow',0,1,'$starttime',0)";
				
			$r = mysqli_query($conn,$query);// run the query
			
			if($r){
				//if success print message
				echo " thanks for note";
			}else{
				//if didnt run OK,print debbuging error message for testing purpose
				//echo "_NOT INSERTED VALUE " .mysqli_error($conn);
				echo "Query error: " .$query;
			}
	}
}


// section when second button with face will be clicked
// check if the form has been submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
//if clicked button name ="two" then execute $query3 - choose profer user,use outputed number to assign in UPDATE query 
	if(isset($_POST['two'])){
		//change userid into INT by intavl function. change UNIX time into 'H:i:s' using dat() function
				$useridrow = intval($row['user_id']);
				$starttime = date('H:i:s',$timestamp);
		
				//$query = "UPDATE activity_1 SET start = $starttime WHERE user_id = $useridrow";
				// INSERT query record new row with user data
				$query = "INSERT INTO act1 (user_id,duration,feedback,start,complete) VALUES ('$useridrow',0,2,'$starttime',0)";
				
			$r = mysqli_query($conn,$query);// run the query
			
			if($r){
				//if success print message
				echo " thanks for note";
			}else{
				//if didnt run OK,print debbuging error message for testing purpose
				//echo "_NOT INSERTED VALUE " .mysqli_error($conn);
				echo "Query error: " .$query;
			}
	}
}
// section when third button with face will be clicked
// check if the form has been submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
//if clicked button name ="three" then execute $query3 - choose profer user,use outputed number to assign in UPDATE query 
	if(isset($_POST['three'])){
				//change userid into INT by intavl function. 
				$useridrow = intval($row['user_id']);
				//change UNIX time into 'H:i:s' using dat() function
				$starttime = date('H:i:s',$timestamp);
		
				//$query = "UPDATE activity_1 SET start = $starttime WHERE user_id = $useridrow";
				//INSERT query record new row with user data
				$query = "INSERT INTO act1 (user_id,duration,feedback,start,complete) VALUES ('$useridrow',0,3,'$starttime',0)";
				
			$r = mysqli_query($conn,$query);// run the query
			
			if($r){
				//if success print message
				echo " thanks for note";
			}else{
				//if didnt run OK,print debbuging error message for testing purpose
				//echo "_NOT INSERTED VALUE " .mysqli_error($conn);
				echo "Query error: " .$query;
			}
	}
}
// section when fourth button with face will be clicked
// check if the form has been submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
//if clicked button name ="three" then execute $query3 - choose profer user,use outputed number to assign in UPDATE query 
	if(isset($_POST['four'])){
		//change userid into INT by intavl function. 
				$useridrow = intval($row['user_id']);
				//change UNIX time into 'H:i:s' using dat() function
				$starttime = date('H:i:s',$timestamp);
		
				//$query = "UPDATE activity_1 SET start = $starttime WHERE user_id = $useridrow";
				//INSERT query record new row with user data
				$query = "INSERT INTO act1 (user_id,duration,feedback,start,complete) VALUES ('$useridrow',0,4,'$starttime',0)";
				
			$r = mysqli_query($conn,$query);// run the query
			
			if($r){
				//if success print message
				echo " thanks for note";
			}else{
				//if didnt run OK,print debbuging error message for testing purpose
				//echo "_NOT INSERTED VALUE " .mysqli_error($conn);
				echo "Query error: " .$query;
			}
	}
}

?>

<div id="div2">
<p id="p1">Thank you <?php echo $_SESSION['useremail']; ?>. Merci beaucoup. Dziekujemy . Grazie.</p>
</div>
<div id="div4">
<div id="div5">
<!--<a href="webbuild19.php"><button class="btn2" input type="submit" name="logout" value="1">Logout</button></a>-->
<form method="POST" action="webbuild19.php">
<button class="btn2" input type="submit" name="logout">Logout</button>
</form>

<?php

//measure logout time. if click button btn2 assign time() to $endtime and put into $query INSERT INTO
if($_SERVER['REQUEST_METHOD']=='POST'){	
	if(isset($_POST['logout'])){
		
		$logoutUNIX = time();
		$logout = date('H:i:s',$logoutUNIX);
		echo "THIS IS LOGOUT TIME" .$logout;
		//$starttime = date('H:i:s',$timestamp);
		$duration = $logoutUNIX - $timestamp;		
		//$duration = $logout - $starttime;
		//var_dump($duration);
		//echo "THIS IS DURATION TIME".$duration;
		//var_dump($duration);
		$Hduration = date('H:i:s',$duration);
		//var_dump($Hduration);
		//echo "HHHduration = ". $Hduration;
		
		//4useridrow nadpisuje mi prawdziwy numer user,zmien logout where starttime = $starttime
		//query4 record in DB logout time after click logout button
		$query4 = " UPDATE act1 SET complete ='$logout WHERE user_id = $useridrow'";//LIMIT 1 to reduce row record to 1
		var_dump($query4);
		var_dump($useridrow);
		
		$r1 = mysqli_query($conn,$query4);
		
		if($r1){
			echo "YES LOGOUTTIME INSERTED";
		}else {
			//echo "NO NO NO LOGOUT TIME NOT INSERTED".mysqli_error($conn);
				echo "Query error: " .$query4;
		}
		
		
		//query 5 should record in DB duration of an activity
		$query5 = "UPDATE act1 SET duration = '$duration WHERE user_id = $useridrow' LIMIT 1";
		
		$r2 = mysqli_query($conn,$query5);
		
		if($r2){
			echo "YES DURATIONTIME INSERTED";
		}else {
			echo "NO NO NO LOGOUT TIME NOT INSERTED";
			echo "_NOT INSERTED VALUE " .mysqli_error($conn);
				echo "Query error: " .$query5;
			
		}
		
		//var_dump($r2);
		
  }
}
?>
</div>
</div>

</body>
</html>