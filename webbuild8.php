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
<title> Web build activity.Tintin</title>
<style>

	html,body {
		width:100%;
		height:100%;
		background-color:rgb(74,90,128);
		position:relative;
		margin:0;
	}
	*{
		box-sizing:border-box;
	}
	.div0 {
		position: relative;
	}
	.div1 {
		width:20%;
		height:80%;
		background-color:powderblue;
		position:relative;
		float:left;
		left:75%;
		
	}
	.div2 {
		width:50%;
		height:60%;
		background-color:#4f6a7d;
		position:relative;
		float:left;
		left:-5%;
		top: 5%;
		border-radius:30px;
		
	}
	.div3 {
		width:50%;
		height:12%;
		background-color:powderblue;
		margin:auto;
		border-radius:5px;
		position:relative;
		top: 10%;
		left:0;
	}
	.div4 {
		width: 1%;
		border-top: 10px solid transparent;
		border-left: 100px solid rgb(50,150,50);
		border-bottom: 10px solid transparent;
		position:absolute;
		top:15%;
		left:100%;
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
		font-size: 18px;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		border-radius:5px;
 }

  .btn1:hover {opacity: 1}

	.p1 {
		font-style:Verdana;
		color: rgb(220,220,220);
		text-align: center;
		line-height:1.8;
		font-size:20px;
		text-indent: 50px;
		margin: 5px;
		word-spacing:5px;
	}
	@media only screen and (max-width:850px){
	.div1{
			width:30%;
			float:left;
			left:65%;
	}
	.div2{
			width:50%;
			float:left;
			top:0;
			height:100%;
			left:-30%;
			
	}
	.div3{
			width:90%;
			margin:auto;
			top:0;
	}
	.div4{
		    width:100%;
			top:20%;
			}
	.p1{
			font-size: 20px;
	}
    }
  
  @media only screen and (max-width:410px){
  .div2{
		width:50%;
		height:100%;
  }
  .div4{
		    width:100%;
			top:25%;
		}
	.p1{
		font-size:15px;
  }
  .div3{
			width:90%;
			height:15%;
			margin: auto;
			top:0;
	}
  }
  @media only screen and (min-width:1250px){
	  .p1{
		font-size:23px;
  }
  }
</style>
</head>
<body>
<div class="div1"><img src="img/tintin3_dog.png" style="width:100%; height:100%"></div>
<div class="div2">
<!--<div class="div4" width="10"></div>-->
<p class="p1">Hello <?php echo $_SESSION['first_name'];?> , good to see you.
My dog wants to go out, we don’t have much time, but don’t worry. 
Very quick I’ll teach you next trick. 
Please read carefully and fallow. Ready? <br> Click Next Website Mission button below.
</p>
<div class="div3">
<a href="webbuild9.html"><button class="btn1">Next Website Mission</button></a>
</div>	
</div>



</body>
</html>