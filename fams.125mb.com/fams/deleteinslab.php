<?php
	include('../connect/connect.php');
	$id = $_GET['id'];

	mysqli_query($mycon, "Delete from inslab where id= '$id'") or die(mysqli_error($mycon));
		        echo '<script type="text/javascript">';
                echo 'alert("Reservation Deleted!");';
                echo 'window.location="laboratory.php";';
                echo '</script>';



?>