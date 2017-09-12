<?php
include 'db.php';
$query ="SELECT * FROM `chat`";
	$run = mysqli_query($con, $query);
	if($run == TRUE){
		while($data = mysqli_fetch_assoc($run)){
			?>
			<div id="chat_data"> 
			<span style="color: brown"> <?php echo $data['name'];?></span>:
			<span style="color: green">  <?php echo $data['msg'];?> </span>
			<span style="float: right;">  <?php echo formatDate($data['date']);?></span>
			</div>
			<?php
			}
			}
			?>