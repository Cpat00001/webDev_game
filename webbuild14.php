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
<title> Web build activity.Flying SuperMan</title>
<style>

	html,body {
		width:100%;
		height:100%;
		margin:0;
		background-image:url('cloudysky.jpg');/*add backgroud image with sky,clouds*/
		background-repeat:no-repeat;
		position:absolute;
	}
	*{
		box-sizing:border-box;
	}
	
	img{
		position:relative;
		float:left;
		max-width:50%;		
	}
	#anim1{
		width:50%;
		height:50%;
		animation-name:superman;
		animation-direction: normal;
		animation-duration:<?php echo $_GET["duration"];?>s;
	}
	@keyframes superman {
	from {
		margin-left00%;
		width:300%;
	}
	to {
		margin-left:100%;
		width:100%;
	}
	}
	
	#div1{
		clear:left;
	}
	#div2{
		width:50%;
		height:50%;
		display:block;
		align-items:center;
		position:relative;
		left:60%;
		top:50px;
	
	}
	.btn1 {
		float:left;
		width:51%;
		height:auto;
		padding:5px;
		background-color:orange;
		border:none;
		color:black;
		text-align:center;
		font-family: Verdana;
		font-size: 15px;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		border-radius:5px;
		margin:1%;
	}
 a{
	text-decoration:none;
	color: black;
 }

  .btn1:hover {opacity: 1}
  
  @media only screen and (max-width:1250px) and (max-width:600px){
	img{
		width:50%;
		height:40%;
  }
  .btn1 {
	float:left;
	width:60%;
	height:auto;
	font-size:15px;
  } 
</style>
<body>

<div id="anim1"><img src="img/AngryBird.jpg" alt="angrybird" width="300" height="250"></div>

<div id="div1">
<div id="div2">
<a href="webbuild13.html"><button class="btn1"> Wow...Let me try again</button></a>
<a href="webbuild15.html"><button class="btn1">I'd like discover next stage</button></a>
</div>
</div>

</body>
</html>	