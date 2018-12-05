<! doctype html>
<html>
<head>
<title>page2</title>
</head>
<body>
<p> color is: <?php echo $_GET["color"];?></p></br>
<p> text is: <?php echo $_GET["sentence"];?></p>
<?php
$x = $_GET["color"];
$y = $_GET["sentence"];

?>
<p id="demo"></p>

<script type="text/javascript">
var x = "<?php echo $x;?>";
var y = "<?php echo $y;?>";
document.getElementById("demo").innerHTML = y;
document.getElementById("demo").style.color = x;
</script>

</body>
</html>