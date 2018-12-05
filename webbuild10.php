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
	.row{
		display:flex;
		justify-content:flex-start;
		flex-wrap:wrap;
		margin:5%;
		color:rgb(200,100,100);
	}
	.column{
		flex:50%;
		max-width:50%;
	}
	.btn1{
		float:left;
		width:51%;
		height:auto;
		background-color:orange;
		cursor:pointer;
		text-align:center;
		font-family: Verdana;
		font-size: 18px;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		border-radius:5px;
		margin:1%;
		
	}
	.btn1:hover{opacity: 1}
	a{
		text-decoration:none;
	}
	@media only screen and (max-width:850px){
	.row{
		width:100%;
	}
	.column{
		max-width:100%;
		flex:100%;
	}
	img{
		clear:both;
		/*width:80%;*/ /* width cant be in % then user cant change size.if size will be big can suit to small devices,
						because not % sizing-responsive*/
	}
	.btn1{
		width:90%;
	}
	
	}
	
</style>
<body>
<div class="row">
<div class="column">
<div><h2> this is an original picture</h2></div>
<img src="img/donkeyKing.jpg" alt="Woody" width= "200" height="200"></img>
</div>
<div class="column">
<div><h2> this is your changed picture</h2></div>
<img id="img1"  src="img/donkeyKing.jpg" alt="Woody" width= "500" height="300"></img>
</div>
<?php
$x= $_GET["width"];
$y = $_GET["height"];
?>
<script type="text/javascript">
var x = "<?php echo $x; ?>";
var y = "<?php echo $y ?>";
document.getElementById("img1").style.width = x;
document.getElementById("img1").style.height = y;
</script>

<div class="column">
<a href="webbuild9.html"><button class="btn1">Try again</button></a>
<a href = "webbuild11.php"><button class="btn1">Lovely take me further</button></a>
</div>
</div>

</body>
</html>















