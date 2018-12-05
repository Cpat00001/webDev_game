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
<title> Web build activity.Mario</title>
<style>

	body {
		background-color:rgb(74,90,128);
	}
	*{
		box-sizing:border-box;
	}
	.div0 {
		position:relative;
	}
	.div1 {
		width:95%;
		height:10%;
		background-color:rgb(120,100,128);
		position:relative;
		top: 5%;
		left: 1%;
		height: 100px;
		line-height: 100px;
	}
	#div2 {
		width:80%;
		height:auto;
		background-color:rgb(120,100,128);
		position:relative;
		top: 10%;
		left:5%;
		/*line-height: 100px;*/
		padding:5px;
		margin-top:2%;
		
	}
	.div3 {
		width:30%;
		height:20%;
		background-color:rgb(120,100,128);
		position:relative;
		top: 0%;
		left:45%
		
	}
	.div4 {
		width:25%;
		height:20%;
		background-color:rgb(120,100,128);
		position:relative;
		top:20%;
		left:15%
	}
	.p1 {
		font-family:Verdana;
		color: rgb(220,220,220);
		text-align: center;
		/*line-height:1.8;*/
		font-size:20px;
		margin: 5px;
		/*word-spacing:5px;	*/
	}
	#p2 {
		font-family:Verdana;
		color: rgb(220,220,220);
		text-align: center;
		padding:20px;
		font-size:25px;
		margin: 5px;
		word-spacing:5px;	
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
		font-size: 2vw;
		font-weight:bold;
		opacity: 0.7;
		transition: 0.3s;
		border-radius:5px;
    }
  .btn1:hover {opacity: 1}
  
  a{
    text-decoration: none;
  }
  
  @media only screen and (max-width:850px){
	.div1{
			width:100%;
			float:left;
			margin:2%;
			left:0%;
	}
	#div2{
			width:95%;
			float:left;	
			left:0%;
	}
	.div3{
			width:95%;
			float:left;
			left:0%;
			top:15%;
			margin:2%;
	}
	.div4 {
		   width:95%;
		   float:left;
		   left:0%;
		   top:15%;
	}
	.p1{
			font-size: 3vw;
	}
  }

</style>
</head>
<body>
<div class="div1">
	<p class="p1"> Yuppie Complimenti!, below is your coloured text</p><br>
</div>
<div id="div2">
	<p id="p2"></p>
</div>

<?php
$x = $_GET["color"];
$y = $_GET["sentence"];
?>
<script type="text/javascript">
var x = "<?php echo $x;?>";
var y = "<?php echo $y;?>";
document.getElementById("p2").innerHTML = y;
document.getElementById("p2").style.color = x;
</script>


<div class = "div4">
	<a href="webbuild6.html"><button class="btn1"><p class="p1"> Try again </p></button></a>
</div>
<div class="div3">
	<a href="webbuild8.php"><button class="btn1"><p class="p1"> Interesting...,what will be next?? Click me </p></button></a>
</div>

</body>
</html>
