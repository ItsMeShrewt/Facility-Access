<?php
    include('../connect/connect.php');

    $id = $_POST['id'];
    $monday = $_POST['monday'];
    $tuesday = $_POST['tuesday'];
    $wednesday = $_POST['wednesday'];
    $thursday = $_POST['thursday'];
    $friday = $_POST['friday'];
    $saturday = $_POST['saturday'];

    // Fetch current data for comparison
    $query_current = "SELECT * FROM lab4 WHERE id = '$id'";
    $result_current = mysqli_query($mycon, $query_current);
    $current_data = mysqli_fetch_assoc($result_current);

    if (
        $current_data['monday'] === $monday &&
        $current_data['tuesday'] === $tuesday &&
        $current_data['wednesday'] === $wednesday &&
        $current_data['thursday'] === $thursday &&
        $current_data['friday'] === $friday &&
        $current_data['saturday'] === $saturday
    ) {
        // If data is the same, do not update
        echo '<script type="text/javascript">';
        echo 'alert("No changes detected. Update not performed.");';
        echo 'window.location="edit4.php";';
        echo '</script>';
    } else {
        // Check for duplicates
        $duplicate = false;
        $duplicate_day = "";

        $query_monday = "SELECT * FROM lab4 WHERE monday = '$monday' AND id != '$id'";
        $result_monday = mysqli_query($mycon, $query_monday);
        if (mysqli_num_rows($result_monday) > 0) {
            $duplicate = true;
            $duplicate_day = "Monday";
        }
        $query_tuesday = "SELECT * FROM lab4 WHERE tuesday = '$tuesday' AND id != '$id'";
        $result_tuesday = mysqli_query($mycon, $query_tuesday);
        if (mysqli_num_rows($result_tuesday) > 0) {
            $duplicate = true;
            $duplicate_day = "Tuesday";
        }
      	$query_wednesday = "SELECT * FROM lab4 WHERE wednesday = '$wednesday' AND id != '$id'";
        $result_wednesday = mysqli_query($mycon, $query_wednesday);
        if (mysqli_num_rows($result_wednesday) > 0) {
            $duplicate = true;
            $duplicate_day = "Wednesday";
        }
        $query_thursday = "SELECT * FROM lab4 WHERE thursday = '$thursday' AND id != '$id'";
        $result_thursday = mysqli_query($mycon, $query_thursday);
        if (mysqli_num_rows($result_thursday) > 0) {
            $duplicate = true;
            $duplicate_day = "Monday";
        }
        $query_friday = "SELECT * FROM lab4 WHERE friday = '$friday' AND id != '$id'";
        $result_friday = mysqli_query($mycon, $query_friday);
        if (mysqli_num_rows($result_friday) > 0) {
            $duplicate = true;
            $duplicate_day = "Friday";
        }
        $query_saturday = "SELECT * FROM lab4 WHERE saturday = '$saturday' AND id != '$id'";
        $result_saturday = mysqli_query($mycon, $query_saturday);
        if (mysqli_num_rows($result_saturday) > 0) {
            $duplicate = true;
            $duplicate_day = "Saturday";
        }

        // Repeat similar checks for other days...
        $days = ['tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        foreach ($days as $day) {
            $query_day = "SELECT * FROM lab4 WHERE $day = '{$day}' AND id != '$id'";
            $result_day = mysqli_query($mycon, $query_day);
            if (mysqli_num_rows($result_day) > 0) {
                $duplicate = true;
                $duplicate_day = ucfirst($day);
                break;
            }
        }

        // If duplicate found, show an error
        if ($duplicate) {
            echo '<script type="text/javascript">';
            echo 'alert("Duplicate entry found for ' . $duplicate_day . '! Update not allowed.");';
            echo 'window.location="edit4.php";';
            echo '</script>';
        } else {
            // Proceed to update the data if no duplicate is found
            $sql = mysqli_query($mycon, "UPDATE lab4 SET monday='$monday', tuesday='$tuesday', wednesday='$wednesday', thursday='$thursday', 
            friday='$friday', saturday='$saturday' WHERE id='$id'") or die(mysqli_error($mycon));

            echo '<script type="text/javascript">';
            echo 'alert("Schedule Updated!");';
            echo 'window.location="edit4.php";';
            echo '</script>';
        }
    }
?>
