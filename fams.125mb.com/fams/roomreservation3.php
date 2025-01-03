<?php

	SESSION_START();
	include('../connect/connect.php');
		if($_SESSION["full"]=="") {
                echo '<script type="text/javascript">';
                echo 'alert("Session Expired, Need to Login Again!");';
                echo 'window.location="../index.php";';
                echo '</script>';
        }

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Reservation - FAMS</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="" />
          <span class="d-none d-lg-block" style="font-size: 30px;">FAMS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown pe-3">
            <a
              class="nav-link nav-profile d-flex align-items-center pe-0"
              href="#"
              data-bs-toggle="dropdown"
            >
              <img
                src="image/it.png"
                alt="Profile"
                class="rounded-circle"
              />
              <span class="d-none d-md-block dropdown-toggle ps-2"
                ><?php echo $_SESSION["full"]; ?></span
              > </a
            ><!-- End Profile Iamge Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
            >
              <li class="dropdown-header">
                <h6><?php echo $_SESSION["full"]; ?></h6>
                <span>IT Admin</span>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="admin-logout.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>
            </ul>
            <!-- End Profile Dropdown Items -->
          </li>
          <!-- End Profile Nav -->
        </ul>
      </nav>
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Dashboard</li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="admin.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->
        <!-- Forms Nav -->
        <!-- End Forms Nav -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#forms-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-journal-text"></i><span>Reservation</span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="forms-nav"
            class="nav-content collapse show"
            data-bs-parent="#sidebar-nav"
          >
			<li>
              <a href="roomreservation.php" class="active">
                <i class="bi bi-circle"></i><span>Classroom</span>
              </a>
            </li>
            <li>
              <a href="labreservation.php">
                <i class="bi bi-circle"></i><span>Laboratory</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#tables-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-layout-text-window-reverse"></i><span>Reservation Info</span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="tables-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
          <li>
            <a href="classroom.php">
              <i class="bi bi-circle"></i><span>Classroom</span>
            </a>
          </li>
          <li>
            <a href="laboratory.php">
              <i class="bi bi-circle"></i><span>Laboratory</span>
            </a>
          </li>
          </ul>
        </li>
        <li class="nav-heading">General</li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="about.php">
            <i class="bi bi-file-person"></i>
            <span>About</span>
          </a>
        </li>
        <!-- End Profile Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="admin-logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
          </a>
        </li> 
      </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Reservation</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item">Reservation</li>
            <li class="breadcrumb-item active">Classroom</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Reservation Form (For Student)</h5>

                <!-- Custom Styled Validation -->
                <form method="post" action="studentroom.php" class="row g-3">
                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingLast" placeholder="Last Name" name="lname">
                      <label for="floatingName">Last Name</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingFirst" placeholder="First Name" name="fname">
                      <label for="floatingEmail">First Name</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingMiddle" placeholder="Middle Name" name="mname">
                      <label for="floatingEmail">Middle Name</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingID" placeholder="School ID"  name="sid">
                      <label for="floatingPassword">Student ID</label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCourse" placeholder="Course"  name="course">
                      <label for="floatingPassword">Course</label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingSection" placeholder="Year & Section"  name="section">
                      <label for="floatingPassword">Yr./Sec</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingSubject" placeholder="Subject"  name="subject">
                      <label for="floatingPassword">Subject</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingInstructor" placeholder="Instructor"  name="instructor">
                      <label for="floatingPassword">Instructor</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" id="floatingDate" placeholder="Date"  name="date">
                      <label for="floatingPassword">Date</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input
                        type="time"
                        class="form-control"
                        id="startTime"
                        placeholder="Start Time"
                        name="start"
                      />
                      <label for="startTime">Start Time</label>
                    </div>
                  </div>
                  <!-- End Time -->
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input
                        type="time"
                        class="form-control"
                        id="endTime"
                        placeholder="End Time"
                        name="end"
                      />
                      <label for="endTime">End Time</label>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"  name="reason"></textarea>
                      <label for="floatingTextarea">Reason For Reservation<span> (Optional)</span></label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="" name="room">
                        <option value="Room 12">Room 12</option>
                        <option value="Room 21">Room 21</option>
                      </select>
                      <label for="floatingSelect">Reservation for</label>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form><!-- End floating Labels Form -->
                <!-- End Custom Styled Validation -->
              </div>
            </div>
                <!-- End Custom Styled Validation with Tooltips -->
              </div>
            </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
              <?php
                $id = $_GET['id'];
                $sql1= mysqli_query($mycon, "SELECT * from insroom where id='$id'") or die (mysqli_error());
                WHILE($insroom=mysqli_fetch_array($sql1)){
                 
                $id= $insroom['id'];
				$instructor= $insroom['instructor'];
				$course= $insroom['course'];
				$section= $insroom['section'];
				$subject= $insroom['subject'];
				$date= $insroom['date'];
				$start= $insroom['start'];
                $end= $insroom['end'];
                $reason= $insroom['reason'];
                $room= $insroom['room'];
                        
                }                                       

             ?>
                <h5 class="card-title">Reservation Form (For Instructor)</h5>

                <!-- Custom Styled Validation -->
                <form method="post" action="updateinsroom.php" class="row g-3">
                 <div class="col-md-1">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingLast" placeholder="Last Name" value="<?php echo $id; ?>" name="id">
                      <label for="floatingInstructor">ID</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingLast" placeholder="Last Name" value="<?php echo $instructor; ?>" name="instructor">
                      <label for="floatingInstructor">Instructor's Name</label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCourse" placeholder="Course" value="<?php echo $course; ?>"  name="course">
                      <label for="floatingCourse">Course</label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingSection" placeholder="Year & Section" value="<?php echo $section; ?>"  name="section">
                      <label for="floatingPassword">Yr./Sec</label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingSubject" placeholder="Subject" value="<?php echo $subject; ?>"  name="subject">
                      <label for="floatingPassword">Subject</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" id="floatingDate" placeholder="Date" value="<?php echo $date; ?>"  name="date">
                      <label for="floatingPassword">Date</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input
                        type="time"
                        class="form-control"
                        id="startTime"
                        placeholder="Start Time"
                        value="<?php echo $start; ?>"
                        name="start"
                      />
                      <label for="startTime">Start Time</label>
                    </div>
                  </div>
                  <!-- End Time -->
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input
                        type="time"
                        class="form-control"
                        id="endTime"
                        placeholder="End Time"
                        value="<?php echo $end; ?>"
                        name="end"
                      />
                      <label for="endTime">End Time</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" value="<?php echo $reason; ?>" name="reason"></textarea>
                      <label for="floatingTextarea">Reason For Reservation<span> (Optional)</span></label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="" value="<?php echo $room; ?>" name="room">
                        <option value="Room 12">Room 12</option>
                        <option value="Room 21">Room 21</option>
                      </select>
                      <label for="floatingSelect">Reservation for</label>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form><!-- End floating Labels Form -->
                <!-- End Custom Styled Validation -->
              </div>
            </div>
                <!-- End Custom Styled Validation with Tooltips -->
              </div>
      </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>BSIT - 2C</span></strong
        >. <?php echo date("Y")?> TAGOLOAN COMMUNITY COLLEGE
      </div>
      <div class="credits">
      	Made by BSIT - 2C Group 6
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
