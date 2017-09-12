<?php
require 'db.php';
include 'show.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat System in PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if(req.readyState == 4 && req.status == 200){
					document.getElementById('chat').innerHTML =req.responseText;

				}
			}
			req.open('GET','chat.php',true);
			req.send();
		}
	</script>
</head>
<!--onload="ajax();"-->
<body >
	<div id="container">
		<div id="chat_box">
		<div id="chat"><div>
		<?php showdata(); ?>
			
		</div>
	<form method="post" action="index.php">
	<input type="text" name="name" placeholder="enter name"/>	
	<textarea name="msg" placeholder="enter message"></textarea>
	<input type="submit" name="submit" value="Send it"/>
	</form>
	<?php 
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$msg = $_POST['msg'];
		$con = new mysqli($host,$user,$pass,$db_name);
		$query ="INSERT INTO `chat`( `name`, `msg`) VALUES ('$name','$msg')";
		$run = mysqli_query($con,$query);
		if($run==TRUE)
		{
			echo "<embed loop = 'false' src= 'tone.wav' hidden='true' autoplay='true'/>";
			echo "Message Sent";
		}
		else 
			echo "Error";
	}
	?>
	</div>
</body>
</html>