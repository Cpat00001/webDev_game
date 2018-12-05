<! DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
html, body {
	width: 100%;
    height: auto;
    background-color: rgb(74,90,128);
    color: rgb(237, 236, 213);
    text-align: center;
    margin: 0;
    font-family: Verdana;
    font-size: 15px;
	}
.divHead{
	width:100%;
	height:auto;
	float:left;
	background-color:red;
}
.header{
	height:15%;
	width:90%;
	float:left;
	margin-left:auto;
	margin-right:auto;
}
.flex-container{
	background-color:rgb(74,90,128);
	margin:5px;
	padding:1px;
	font-size:20px;
	display: flex;
	flex-direction:column;
	flex: wrap;
	justify-content:space-around;
	float:left;
}
.main{
	background-color:rgb(74,90,128);
	margin:5px;
	
	font-size:20px;
	display: flex;
	flex-direction:column;
	flex: wrap;
	justify-content:space-around;
	width:70%;
	float:left;
}
.main> div{
	background-color: rgb(74,90,128);
}
#div3{
	background-color:rgb(74,90,128);
	
}
.footer{
	width:100%;
	height:5%;
	background-color: grey;
	float:left;
	background-color: rgb(74,90,128);
	
}

.button{
	width:100%;
	background-color:#ff9800;
	color:white;
	padding:15px;
	text-align:center;
	cursor:pointer;
	display:block;
	font-family: Verdana;
	font-size: 15px;
	border:1px solid rgb(8,	70,168);
	border-radius:10px;
	opacity:0.7;
	margin-left:auto;
	margin-right:auto;
}
.button:hover{
    opacity:1;	
	}
#button2{
	width:50%;
	height:100%;
	margin-top:2%;
	margin-left:auto;
	margin-right:auto;
	background-color:#5664b1;
	opacity: 0.7;	
}
#button2:hover{
	opacity:1;
}
#button3{
	width: 30%;
    height: auto;
    background-color: #ff9800;
    opacity: 0.7;
    margin-left: auto;
    margin-right: auto;
	color:white;
	font-size: 15px;
	font-weight: bold;
}
#button3:hover{
	opacity:1;
}
a {
	text-decoration:none;
	color:rgb(239,200,10);
	font-family:Verdana;
	font-size:20px;
}
#output{
	color:yellow;
}



</style>
</head>
<body>
<div id="divHead">
<div class="header">
<h3>THANK YOU and Hello.</h3>
<h3>You have logged in successfully.</h3>
</div>
</div>


<div class="flex-container">
<a href="http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/LoginWebActivity.php"><button class="button"> WebBuildActivity 1</button></a>
<button class="button"> Arduino Board 2</button> 
<button class="button"> Database Security 3</button>
<button class="button"> Encrypting 4</button> 
</div>

<div class="main">
<div> 
<p>Now you can choose an activity as you like - look at buttons on left,</br>  
or start your INTERACTIVE OPEN DAY as we recommend.
Go to classroom nr XXX and start a fun.
Please collect all letters, which we will display after every activity.
</br></br>
If you collect every letter, then type in below into password field,and check what we have for you.
</p> </div>

<script>
function checkpass(){
var x, text;

// get value of input field from form
x = document.getElementById("pswd").value;

		//condition if input from button name "award" matechs to var pass = "wolf" then inform about free lecture "Safe social media"
		if (x =="wolf" || x =="WOLF" || x =="Wolf"){
			text = "Visit us on next Monday at 18:00 . There will be free coffee,cookie and 'Safe social media' lecture for you";
		}else{
			text = "Use collected letters: in order Activity 1,2,3,4.Use Capital or small letters ";
		}
document.getElementById("output").innerHTML = text;
}
</script>
<h4 input id="output"></h4>

<div id="div3">
<!--<form action="LoginTest.php" method="post" name="validation">-->
<p>Type in a password : 4 letters you have collected from your Interactive Open Day</p>
</br></br>
Password </br>
<input id="pswd" type = "password" placeholder = "Type in our letters.. "></br></br>
<button type="button" onclick="checkpass()"  id="button3">Check your award</button>
</form>
</div>
</div>



<div class="footer">
<div id="button2">
<a href="http://mi-linux.wlv.ac.uk/~1629650/GP/webactivity/registrationForm.php"> Log out </a>
</div>
</div>
</body>
</html>