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

    <title>Reservation Info / Classroom - FAMS</title>
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
    <style>
       th {
        font-weight: bold !important;
        text-align: center;
    	}
    </style>
    

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
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="users-profile.html"
                >
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
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
        <!-- End Components Nav -->
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
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="roomreservation.php">
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
            class="nav-content collapse show"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="classroom.php" class="active">
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

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Reservation Info</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item">Reservation</li>
            <li class="breadcrumb-item active">Records</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row">
              <div class="col-lg-12">
              	<div class="card">
                  <div class="card-body">
                  	<h5 class="card-title">Classroom (Student)</h5>
                  	<table class="table datatable">
                    	<thead>
                      	<tr>
                            <th style="text-align: center;"><b>No.</th>
    						<th style="text-align: center;"><b>Laboratory</th>
    						<th style="text-align: center;"><b>Date</th>
    						<th style="text-align: center;"><b>Time</th>
                            <th style="text-align: center;"><b>Subject</th>
                            <th style="text-align: center;"><b>Course</th>
    						<th style="text-align: center;"><b>Student ID</th>
    						<th style="text-align: center;"><b>Last Name</th>
                            <th style="text-align: center;"><b>First Name</th>
                            <th style="text-align: center;"><b>Yr./Sec</th>
                            <th style="text-align: center;"><b>Instructor</th>
                            <th></th>
						</tr>
                    	</thead>
                    	<tbody>
						<?php
                            $i=0;
                            $sql1= mysqli_query($mycon, "SELECT * from studentroom order by date ASC") or die (mysqli_error());
                            WHILE($studentroom=mysqli_fetch_array($sql1)){
                            $id = $studentroom['id'];
                                                    
                            $i++;
                         ?>
                      	<tr>
                        	<td class="table-light" style="text-align: center;"><?php echo $i; ?></td>
                        	<td class="table-info" style="text-align: center; text-transform: capitalize;"><?php echo $studentroom['room']; ?></td>
                        	<td class="table-info" style="text-align: center; text-transform: capitalize;"><?php echo $studentroom['date']; ?></td>
                        	<td class="table-info" style="text-align: center; text-transform: capitalize;"><?php echo $studentroom['start']; ?>-<?php echo $studentroom['end']; ?></td>
                            <td class="table-primary" style="text-align: center; text-transform: uppercase;"><?php echo $studentroom['subject']; ?></td>
                            <td class="table-primary" style="text-align: center; text-transform: uppercase;"><?php echo $studentroom['course']; ?></td>
                            <td class="table-primary" style="text-align: center; text-transform: capitalize;"><?php echo $studentroom['sid']; ?></td>
                        	<td class="table-success" style="text-align: center; text-transform: capitalize;"><?php echo $studentroom['lname']; ?></td>
                            <td class="table-success" style="text-align: center; text-transform: capitalize;"><?php echo $studentroom['fname']; ?></td>
                        	<td class="table-danger" style="text-align: center; text-transform: uppercase;"><?php echo $studentroom['section']; ?></td>
                        	<td class="table-warning" style="text-align: center; text-transform: capitalize;"><?php echo $studentroom['instructor']; ?></td>
                            <td class="table-dark" style="font-size: 22px; text-align: center;">
                        		<a href=deletestudentroom.php?id=<?php echo $id; ?>><i class="bi bi-trash-fill text-danger"></i>&nbsp;</a> |&nbsp;
                        		<a href="roomreservation2.php?id=<?php echo $id; ?>"><i class="bi bi-pen-fill"></i></a>
                    		</td>
                      	</tr>
                        <?php } ?>
                    	</tbody>
                  	</table>
                </div>
              </div>
            </div>
          </div>
        </div>
            <div class="col-lg-12">
              	<div class="card">
                  <div class="card-body">
                  	<h5 class="card-title">Classroom (Instructor)</h5>
                  	<table class="table datatable">
                    	<thead>
                      	<tr>
                            <th style="text-align: center;"><b>No.</th>
    						<th style="text-align: center;"><b>Laboratory</th>
    						<th style="text-align: center;"><b>Date</th>
    						<th style="text-align: center;"><b>Time</th>
                            <th style="text-align: center;"><b>Instructor</th>  
    						<th style="text-align: center;"><b>Course</th>
                            <th style="text-align: center;"><b>Yr./Sec</th>
                            <th style="text-align: center;"><b>Subject</th>
                            <th></th>
						</tr>
                    	</thead>
                    	<tbody>
						<?php
                            $i=0;
                            $sql1= mysqli_query($mycon, "SELECT * from insroom order by date ASC") or die (mysqli_error());
                            WHILE($insroom=mysqli_fetch_array($sql1)){
                            $id = $insroom['id'];
                                                    
                            $i++;
                         ?>
                      	<tr>
                        	<td class="table-light" style="text-align: center;"><?php echo $i; ?></td>
                        	<td class="table-info" style="text-align: center; text-transform: capitalize;"><?php echo $insroom['room']; ?></td>
                        	<td class="table-info" style="text-align: center; text-transform: capitalize;"><?php echo $insroom['date']; ?></td>
                        	<td class="table-info" style="text-align: center; text-transform: capitalize;"><?php echo $insroom['start']; ?>-<?php echo $insroom['end']; ?></td>
                            <td class="table-warning" style="text-align: center; text-transform: capitalize;"><?php echo $insroom['instructor']; ?></td>
                            <td class="table-success" style="text-align: center; text-transform: uppercase;"><?php echo $insroom['course']; ?></td>
                        	<td class="table-success" style="text-align: center; text-transform: uppercase;"><?php echo $insroom['section']; ?></td>
                            <td class="table-primary" style="text-align: center; text-transform: uppercase;"><?php echo $insroom['subject']; ?></td>
                            <td class="table-dark" style="font-size: 22px; text-align: center;">
                        		<a href=deleteinsroom.php?id=<?php echo $id; ?>><i class="bi bi-trash-fill text-danger"></i>&nbsp;</a> |&nbsp;
                        		<a href="roomreservation3.php?id=<?php echo $id; ?>"><i class="bi bi-pen-fill"></i></a>
                    		</td>
                      	</tr>
                        <?php } ?>
                    	</tbody>
                  	</table>
                </div>
              </div>
            </div>
          </div>
        </div>
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
