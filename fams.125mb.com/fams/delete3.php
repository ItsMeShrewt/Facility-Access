<?php
	include('../connect/connect.php');
	$id = $_GET['id'];

	mysqli_query($mycon, "Delete from lab3 where id= '$id'") or die(mysqli_error($mycon));
		        echo '<script type="text/javascript">';
                echo 'alert("Schedule Deleted!");';
                echo 'window.location="edit3.php";';
                echo '</script>';



?>