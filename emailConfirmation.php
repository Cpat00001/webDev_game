<?php
$to = '$FName';
$subject = 'Wolverhampton University Registration Confirmation';
$message = 'Hello you have been registered in our University Open Day. </br>
			Use submitted values to login at Student Office.</br>
			Please remember nearest Interactive Open Day is on 01 May 2018
			See you there , student office building MI , grand floor, room 123';
mail($to,$subject,$message);
?>