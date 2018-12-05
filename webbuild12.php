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
 
?>
<! doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Web build activity.Cowgirl</title>
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
		left:1%;
		float:left;
		background-color:powderblue;
		position:relative;
	
	}
	.div2 {
		width:40%;
		height:auto;
		float:left;
		background-color:#4f6a7d;
		border-radius:10px;
		margin:5px;
		position:relative;
		top:5%;
		left:2%;
	}
	.div3 {
		width:50%;
		height:30px;
		background-color:powderblue;
		margin:auto;
		border-radius:5px;
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
		font-size:20px;
		margin: 5px;
		word-spacing:5px;
	}
	@media only screen and (max-width:600px){
		.div1 { 
			width:50%;
			height:60%;
			float:left;
	}
	.div2 {
		width:40%;
		height:auto;
		float:left;
	}
	img {
		width:100%;
	}
	.p1 {
		font-size:4vw;
	}
	.btn1 {
		font-size:2.5vw;
	}
	@media only screen and (max-width:1250px) and (min-width:600px){
		.div1 { 
			width:40%;
			height:60%;
			float:left;
	}
	.div2 {
		width:50%;
		height:auto;
		float:left;
	}
	img {
		width:100%;
	}
	.p1{
		font-size:3vw;
	}
	}
	@media only screen and (min-width:1250px){
		.btn1 {
			font-size: 20px;
		}
	}
</style>
</head>
<body>
<div class="div1"><img src="img/transparent6.png" alt="Mario web builder" style="width:100%; height:100%"></div>
<div class="div2">
<p class="p1"> Hello <?php echo $_SESSION['first_name'];?>, are you still here?</br>
OK my hero.Here is last task for you.</br>I’ll teach you how to do some animations. If you ready, click START button below.</br>
Good luck , read carefully.
</p>
	<a href="webbuild13.html"><div class="div3"><button class="btn1"> START </button></div></a>
</div>


</body>
</html>