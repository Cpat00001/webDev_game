<?php
session_start();
?>
<!doctype html>
<html lang="en"> 
<head>
<title> Login Page.Activity Web building</title> <!-- page title-->
<!-- this line makes website responsive -looks good on every diveces -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta lang="eng"> <!-- page in english language-->
<meta charset="UTF-8"> <!-- read ANSI characters-->
<link rel="stylesheet" href="styleactivity.css">
</head>
<body>
<?php include'checkWebActivity.php';?>
<div class="box1">
<br>
<div class="div1">
	<img src="wolverhampton_university_logo.jpg" alt="University of Wolverhampton" style="width:100%;">
</div>
<div class="div2">
<br>
<h3> Login to start an activity</h3><!-- span display information about any errors-required fields if missed-->
<span style="color:orange"><?php echo $emailEr;?><br><?php echo $pswdEr;?><br></span>
</div>
<div class="div2">

	<form method="post" action="checkWebActivity.php" >
	<div class="row">
	<div class="div21">
		Your email:<br><br><input type="email" name="email" autofocus required><br><br>
	</div>
	</div><br>
	<div class="row">
	<div class="div22">
		Your password:<br><br><input type="password" name="pswd" required>
	</div>
	</div>
	<br><br> 
		Login : <br><br><input type="submit" value="Login">
	</form>

</div>

 
 
 
</body>
</html>
