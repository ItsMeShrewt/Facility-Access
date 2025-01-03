<?php
    include('../connect/connect.php');

    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $sid = $_POST['sid'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $instructor = $_POST['instructor'];
    $date = $_POST['date'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $reason = $_POST['reason'];
    $room = $_POST['room'];

    // Get the current date and time
    $currentDate = date('Y-m-d'); // Format as YYYY-MM-DD
    $currentTime = date('H:i');  // Format as HH:MM (24-hour time)

    // Check if the necessary fields are not empty
    if ($lname == "" || $fname == "" || $mname == "" || $sid == "" || $course == "" || $section == "" || $subject == "" || $instructor == ""
		|| $date == "" || $start == "" || $end == "" || $room == "") {
        echo '<script type="text/javascript">';
        echo 'alert("All fields are required!");';
        echo 'window.location="classroom.php";';
        echo '</script>';
    } elseif ($date < $currentDate) {
        // Check if the date is in the past
        echo '<script type="text/javascript">';
        echo 'alert("Error: The selected date cannot be in the past.");';
        echo 'window.history.back();'; // Go back to the previous page
        echo '</script>';
    } elseif ($date == $currentDate && $start < $currentTime) {
        // Check if the time is in the past for the current date
        echo '<script type="text/javascript">';
        echo 'alert("Error: The selected time cannot be in the past.");';
        echo 'window.history.back();'; // Go back to the previous page
        echo '</script>';
    } else {
        // Check if the lab is already reserved for the given date and time
        $checkQuery = "SELECT * FROM studentroom WHERE room = '$room' AND date = '$date' AND (
            ('$start' < end AND '$start' >= start) OR 
            ('$end' > start AND '$end' <= end) OR 
            ('$start' <= start AND '$end' >= end)
        )";

        $result = mysqli_query($mycon, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // If there's a conflict, show an error
            echo '<script type="text/javascript">';
            echo 'alert("Error: The lab is already reserved for the selected date and time.");';
            echo 'window.history.back();'; // Go back to the previous page
            echo '</script>';
        } else {
            // Insert the new reservation if no conflict
            $insertQuery = "INSERT INTO studentroom(lname, fname, mname, sid, course, section, subject, instructor, date, start, end, reason, room) 
                            VALUES('$lname', '$fname', '$mname', '$sid', '$course', '$section', '$subject', '$instructor', '$date', '$start', '$end', '$reason', '$room')";
            
            mysqli_query($mycon, $insertQuery) or die(mysqli_error($mycon));
            
            echo '<script type="text/javascript">';
            echo 'alert("Reservation Successful!");';
            echo 'window.location="classroom.php";';
            echo '</script>';
        }
    }
?>
