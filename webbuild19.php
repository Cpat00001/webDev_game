<?php 
	// session_start and directly clean session variables and destroy session
	// reset session array/variables $_SESSION=[];
	//destroy session session_destroy();
session_start();
$_SESSION = array();
session_destroy();
?>
<! doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Logout page.</title>
<style>

	html,body {
		width:100%;
		height:100%;
		background-color:rgb(74,90,128);
		position:absolute;
		margin: 0;
	}
	*{
		box-sizing:border-box;
	}
	.flex-container{
		display:flex;
		flex-wrap:wrap;
		flex-direction:column;
		background-color:rgb(150,90,128);
		flex-wrap:wrap;
	}
	.flex-container > div {
		background-color:rgb(74,90,128) ;
		font-size:20px;
		padding:10px;
		text-align:center;
		color:gold;
		font-family:Verdana;
	}
	.btn1 {
		width: 50%;
		height:20%;
		padding: 5px;
		background-color:#54baa1;
		border:none;
		color:rgb(240,200,100);
		text-align:center;
		font-family: Verdana;
		font-size: 1.5vw;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		border-radius:5px;
		cursor:pointer;
	}

  .btn1:hover {opacity: 1}
  
	a{
		text-decoration:none;
	}
  
  @media only screen and (max-width:600px){
  .btn1 {
		width: 80%;
		font-size: 3.5vw;
  }
</style>
</head>
<body>
	<div class="flex-container">
		<div><h3> you are logged out successfully</h3>
		<div><p> After this activity you can go to classroom nr XXX to start another one</br> 
				and collect another letter in you Wolverhampton University Interactive open activity day puzzle</p></div>
		<div><h1><a href="LoginWebActivity.php"><button class="btn1">click here to START AGAIN A WEBBUILD ACTIVITY</button></a></h1></div>
	</div>


</body>
</html>

