<?php
 //form of more dynamics website, after typed in part of input,php could execute and display (include file) 
 //part of code which is adequate to submited form/ action
?>

<!doctype html>
<html lang="en">
<head>
	
	<title> Welcome Page / Registration Form</title> <!-- page title-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.kopia.css">
	<meta charset="UTF-8"> <!-- read ANSI characters-->
	<meta name="keyword" content="university , wolverhampton,open day"><!-- key words for search engine-->
</head>
<body style="font-family: Verdana;">
	
	<?php include'CheckRegistrationForm.php';?> 
	<?php include'loginValid.php';?>
	
	<div id="error_box">
		<!--<span style="color:orange"><?php echo $tolongpswd;?></span>-->
	</div>
	
	

	<div class="header">
	<h1> Welcome to University of Wolverhampton.</h1>
	<p> Knowledge. Innovation.Enterprise.</p>
	</div>

	<div class="row">
		<div class="log">
			<div class="div4">
			<h4> If registered, just log in.</h4>
				<div class="div8">
					<form method="post" action="loginValid.php">
						<p><span class="error"> * required field.</span></p>
						Your email:<br><span class="error"> * <?php echo $emailEr;?></span><br>
						<input type="email" name="Logemail" autofocus required><br><br>
						Your password:<br><span class="error"> * <?php echo $pswdEr;?></span><br> 
						<input type="password" name="Logpswd" required><br><br>
						Login : <br><br><input type="submit" name="Logsubmit" value="Login">
					</form>
				</div>
			</div>

			<div class="div4">
			<h4> If NOT registered, please register.</h4>
			<div class="div8">
				<p><span class="error"> * required field.</span></p>
				<form method="post" action="CheckRegistrationForm.php">
					Your First Name:<br><span class="error"> * <?php echo $FNameEr;?></span><br>
					<input type="text" name="FName" required><br><br>
					
					Your Last Name:<br><span class="error"> * <?php echo $FNameEr;?></span><br> 
					<input type="text" name="LName" required><br><br>
					
					Your email:<br><span class="error"> * <?php echo $emailEr;?></span><br>
					<input type="email" name="email" required><br><br>
					
					Select a password:<br><span class="error"> * <?php echo $pswdEr;?></span><br>
					<input type="password" name="pswd" required><br><br>
					
					Confirm a password:<br><span class="error"> * <?php echo $pswd2Er;?><?php echo $notpass ;?></span><br>
					<input type="password" name="pswd2" required><br><br>
					
					Register : <br><br><input type="submit" name="Regsubmit" value="Register">
				</form>
			</div>
			</div>
		</div>

		<div class="pic">
		<h2> Register or Login to start your interactive day</h2>
		<a href="https://www.wlv.ac.uk/"><img src="img/UniverWlv.jpg" height="305"></a>
		</div>
	</div>
	<br>

	<div class="row">
		<footer>GroupProject Group3 Wolverhampton 2018</footer>
	</div>


</body>
</html>