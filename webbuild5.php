<?php
session_start();
include 'loginMDB.php';
$conn = mysqli_connect($hn,$un,$pw,$db);

	//check DB connection
	if(!$conn) {
		die("Connection failed : ". mysqli_connect_error());
	}
/*//working and retriving select query in DB 
$sql = "SELECT user.first_name FROM user INNER JOIN login ON user.email = login.email WHERE login.email = 'robin@hood.com'"; 
	$result = mysqli_query($conn, $sql);
	
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				echo "FName : " .$row["first_name"];
				$xxx = $row["first_name"];
				//$yyy = print_r ($result);
				$_SESSION['first_name'] = $xxx;
			}
		}
*/	
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
 
?>
<! doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Web build activity.Mario</title>
<style>

	html,body {
		width:100%;
		height:100%;
		background-color:rgb(74,90,128);
		position:absolute;
	}
	*{
		box-sizing:border-box;
	}
	.div0 {
		position: relative;
	}
	.div1 {
		width:20%;
		height:60%;
		top:20%;
		right:1%;
		float:right;
		background-color:powderblue;
		position:relative;
	
	}
	.div2 {
		width:40%;
		height:auto;
		float:right;
		background-color:#4f6a7d;
		border-radius:30px;
		margin:5px;
		position:relative;
		top:5%;
		right:1%;
	}
	.div3 {
		width:50%;
		height:30px;
		background-color:powderblue;
		margin:auto;
		border-radius:5px;
	}
	.div4 {
		width: 20%;
		height: 0%;
		float:right;
		position:relative;
		left:90px;
		top:90%;
		border-top: 10px solid transparent;
		border-left: 100px solid rgb(50,150,50);
		border-bottom: 10px solid transparent;
	}
	.btn1 {
		width: 100%;
		height:100%;
		padding: 5px;
		background-color:#54baa1;
		border:none;
		color:rgb(240,200,100);
		text-align:center;
		font-family: Verdana;
		font-size: 20px;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		border-radius:5px;
 }

  .btn1:hover {opacity: 1}

	.p1 {
		font-family:Verdana;
		color: rgb(220,220,220);
		text-align: center;
		line-height:1.8;
		font-size:25px;
		margin: 5px;
		word-spacing:5px;
	}
	@media only screen and (max-width:600px){
		.div1 { 
			width:50%;
			height:60%;
			float:right;
	}
	.div2 {
		width:40%;
		height:auto;
		float:right;
	}
	img {
		width:100%;
	}
	.p1 {
		font-size:5vw;
	}
	.btn1 {
		font-size: 15px;
	
	}
	}
	@media only screen and (max-width:1250px) and (min-width:600px){
		.div1 { 
			width:40%;
			height:60%;
			float:right;
	}
	.div2 {
		width:50%;
		height:auto;
		float:right;
	}
	img {
		width:100%;
	}
	.p1{
		font-size:3vw;
	}
	.btn1 {
		font-size: 2.5vw;
	}
	}
</style>
</head>
<body>
<div class="div1"><img src="img/CHmario2.png" alt="Mario web builder" style="width:100%; height:100%"></div>
<div class="div2">
<p class="p1"> Welcome <?php echo $_SESSION['first_name'];?></br>
	Good to see you here </br>
	You started your webActivity adventure at <?php echo date('H:i:s', $_SESSION['logintime']);?>. take a time,have a fun.
	We have prepared a fun for you.
	Here you will learn how to build a website</p>
	<a href="webbuild6.html"><div class="div3"><button class="btn1"> START </button></div></a>
</div>

	
</body>
</html>