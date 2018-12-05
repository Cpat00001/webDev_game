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
	.flex-container{
		display:flex;
		justify-content:center;
		align-items:center;
		flex-direction:column;
		flex-wrap:wrap;
		color:rgb(150,200,100);
		font-family:Verdana;
		font-size:15px;
	}
	.flex-container > div {
		background-color:#4f6a7d;
		border-radius:30px;
		color:white;
		margin:0.3%;
		
		
	}
	.btn1{
		background-color:orange;
		/*display:flex;
		justify-content:center;
		align-items:center;*/
		width:50%;
		height:auto;
		margin:2%;
		padding:2%;
		left:25%;
		border-radius:5px;
		cursor:pointer;
		color:rgb(100,100,100);
		font-family: Verdana;
		font-size: 15px;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		margin-left:0;
		margin-right:0;
		position:relative;
	}
	.btn1:hover {opacity: 1}
	a{
	  text-decoration: none;
	  color:rgb(100,100,100);
  }
  img {
	  height:400px;
  }
  @media only screen and (max-width:400px){
  img{
	width:100%;
  }
  .btn1{
	width:50%;
  }
  }

</style>
<body>
<div class="flex-container">
<div><h3>Parfait!</br>
You see, you have done it,you have changed a picture size.</br>
Great job <?php echo $_SESSION['first_name'];?>.</br>
See you later. Bye.</br>
Au revoir!</br>
Go to another stage, learn more.</br>
<a href="webbuild12.php"><button class="btn1"> Click to go next mission</button></a>
</div>
<div>
<img src="img/tintin.png" alt="tintin"></img><!-- img source http://www.bdenvrac.com/doc/tindex.html -->
</div> 
</div>
</body>
</html>	