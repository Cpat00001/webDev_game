<?php
session_start();
?>
<?php

//print("############################");

if($_SESSION['username'] == $email){
	
	$conn = mysqli_connect($hn,$un,$pw,$db);

	//check DB connection
	if(!$conn) {
		die("Connection failed : ". mysqli_connect_error());
	}
	//if connected then query DB to select user with submitted email and find his name
	//$sql = "SELECT first_name FROM user WHERE email={$_SESSION['username']} ";
	//$sql = "SELECT user.first_name FROM user INNER JOIN login ON user.email = login.email";
	$sql = "SELECT first_name FROM user WHERE email='$email';"
	$result = mysqli_query($conn, $sql);
	
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				echo "FName : " .$row["first_name"];
				$xyz = $row["first_name"];
				$xxx = print_r($result);
				//$_SESSION['sessionname'] = $xyz;
				echo "zmienna XYZ". $xyz;
				echo "ZMIENNA XXX".$xxx;
			}
			/*echo "SWEET HOME";
			$xyz = var_dump($result);
			$sname = var_dump($xyz);
			*/
		}
}

/*
<? php
session_start ();
	$ sql = "SELECT * FROM orders";
$ result = $ conn-> query ($ sql);
 
if ($ result-> num_rows> 0) {
    // Dane wyjściowe z każdego wiersza
    while ($ row = $ result-> fetch_assoc ()) {
        echo "order_id: & nbsp;". $ row ["order_id"]. "& nbsp; - Waluta: & nbsp;". $ row ["currency"]. "& nbsp; Dane & nbsp;" . $ row ["date"]. "& nbsp; Session & nbsp;" . $ row ["session"]. "<br>";
    }
} else {
    echo "0 wyników";
}
*/

?>

