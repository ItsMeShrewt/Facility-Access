<?php
    include('../connect/connect.php');

    $monday = $_POST['monday'];
    $tuesday = $_POST['tuesday'];
    $wednesday = $_POST['wednesday'];
    $thursday = $_POST['thursday'];
    $friday = $_POST['friday'];
    $saturday = $_POST['saturday'];

    if ($monday == "" || $tuesday == "" || $wednesday == "" || $thursday == "" || $friday == "" || $saturday == "") {
        echo '<script type="text/javascript">';
        echo 'alert("All fields are required!");';
        echo 'window.location="edit12.php";';
        echo '</script>';
    } else {
        // Check for duplicate in 'monday'
        $query_monday = "SELECT * FROM room12 WHERE monday = '$monday'";
        $result_monday = mysqli_query($mycon, $query_monday) or die(mysqli_error($mycon));

        // Check for duplicate in 'tuesday'
        $query_tuesday = "SELECT * FROM room12 WHERE tuesday = '$tuesday'";
        $result_tuesday = mysqli_query($mycon, $query_tuesday) or die(mysqli_error($mycon));

        // Check for duplicate in 'wednesday'
        $query_wednesday = "SELECT * FROM room12 WHERE wednesday = '$wednesday'";
        $result_wednesday = mysqli_query($mycon, $query_wednesday) or die(mysqli_error($mycon));

        // Check for duplicate in 'thursday'
        $query_thursday = "SELECT * FROM room12 WHERE thursday = '$thursday'";
        $result_thursday = mysqli_query($mycon, $query_thursday) or die(mysqli_error($mycon));

        // Check for duplicate in 'friday'
        $query_friday = "SELECT * FROM room12 WHERE friday = '$friday'";
        $result_friday = mysqli_query($mycon, $query_friday) or die(mysqli_error($mycon));

        // Check for duplicate in 'saturday'
        $query_saturday = "SELECT * FROM room12 WHERE saturday = '$saturday'";
        $result_saturday = mysqli_query($mycon, $query_saturday) or die(mysqli_error($mycon));

        // Check all days for duplicates
        if (mysqli_num_rows($result_monday) > 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Duplicate entry found!");';
            echo 'window.location="edit21.php";';
            echo '</script>';
        } elseif (mysqli_num_rows($result_tuesday) > 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Duplicate entry found!");';
            echo 'window.location="edit12.php";';
            echo '</script>';
        } elseif (mysqli_num_rows($result_wednesday) > 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Duplicate entry found!");';
            echo 'window.location="edit12.php";';
            echo '</script>';
        } elseif (mysqli_num_rows($result_thursday) > 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Duplicate entry found!");';
            echo 'window.location="edit12.php";';
            echo '</script>';
        } elseif (mysqli_num_rows($result_friday) > 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Duplicate entry found!");';
            echo 'window.location="edit12.php";';
            echo '</script>';
        } elseif (mysqli_num_rows($result_saturday) > 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Duplicate entry found!");';
            echo 'window.location="edit12.php";';
            echo '</script>';
        } else {
            // Insert new data
            mysqli_query($mycon, "INSERT INTO room12(monday, tuesday, wednesday, thursday, friday, saturday) 
            VALUES('$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday')") 
            or die(mysqli_error($mycon));

            echo '<script type="text/javascript">';
            echo 'alert("Schedule Added!");';
            echo 'window.location="edit12.php";';
            echo '</script>';
        }
    }
?>
