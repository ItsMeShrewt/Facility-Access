<?php
	include('../connect/connect.php');
	$id = $_GET['id'];

	mysqli_query($mycon, "Delete from room12 where id= '$id'") or die(mysqli_error($mycon));
		        echo '<script type="text/javascript">';
                echo 'alert("Schedule Deleted!");';
                echo 'window.location="edit12.php";';
                echo '</script>';



?>