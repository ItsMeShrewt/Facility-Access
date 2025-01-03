<?php
	include('../connect/connect.php');
	$id = $_GET['id'];

	mysqli_query($mycon, "Delete from studentroom where id= '$id'") or die(mysqli_error($mycon));
		        echo '<script type="text/javascript">';
                echo 'alert("Reservation Deleted!");';
                echo 'window.location="classroom.php";';
                echo '</script>';



?>