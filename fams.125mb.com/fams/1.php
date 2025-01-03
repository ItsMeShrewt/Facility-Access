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

    <title>Edit / ComLab 1 - FAMS</title>
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
      .table th,
      .table td {
        text-align: center;
        vertical-align: middle;
        padding: 12px;
        min-width: 100px;
      }
      .table {
        table-layout: fixed;
        width: 100%;
        border-collapse: collapse;
      }
      .table tbody th {
        font-weight: normal;
      }
      .table thead th {
        font-weight: bold;
      }
      .btn-xs {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        border-radius: 0.2rem;
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
        <a href="admin.php" class="logo d-flex align-items-center">
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
            <i class="bi bi-layout-text-window-reverse"></i
            ><span>Reservation Info</span
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
        <h1>Edit Schedule</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item">Schedule</li>
            <li class="breadcrumb-item active">ComLab 1</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-5">
      <div class="card">
        <div class="card-body">
          <?php
                $id = $_GET['id'];
                $sql1= mysqli_query($mycon, "SELECT * from lab1 where id='$id'") or die (mysqli_error());
                WHILE($lab1=mysqli_fetch_array($sql1)){
                 
                $id= $lab1['id'];
                $monday = $lab1['monday'];
                $tuesday = $lab1['tuesday'];
				$wednesday = $lab1['wednesday'];
				$thursday = $lab1['thursday'];
				$friday = $lab1['friday'];
				$saturday = $lab1['saturday'];

                }                                       

             ?>
          <h5 class="card-title">Schedule for ComLab 1</h5>
          <hr>
          <p><b>Description:</b> 
Fill out the fields for <b>SUBJECT</b>, <b>INSTRUCTOR (Last Name)</b>, <b>TIME (e.g., 7-10am)</b>, and <b>SECTION</b>. If vacant, just put <b>"VACANT"</b> and its <b>TIME</b>, then click <b>ADD</b> to save.</p>

          <!-- Custom Styled Validation -->
          <form method="post" action="update1.php" class="g-3">
            <!-- Row 1 -->
            <div class="d-flex justify-content-end align-items-center mb-3">
              <div class="me-1">
                <input
                  type="text"
                  class="form-control bg-danger"
                  id="readonlyDay"
                  placeholder="Day"
                  value="ID"
                  style="width: 115px; height: 58px; text-align: center; font-weight: bold;"
                  readonly
                />
              </div>
              <div class="flex-grow-1">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingSubject"
                    value="<?php echo $id; ?>"
                    name="id"
                    style="height: 58px;"
                    readonly
                  />
              </div>
            </div>
            <div class="d-flex justify-content-end align-items-center mb-3">
              <div class="me-1">
                <input
                  type="text"
                  class="form-control bg-danger"
                  id="readonlyDay"
                  placeholder="Day"
                  value="Monday"
                  style="width: 115px; height: 58px; text-align: center; font-weight: bold;"
                  readonly
                />
              </div>
              <div class="flex-grow-1">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingSubject"
                    value="<?php echo $monday; ?>"
                    name="monday"
                    style="height: 58px;"
                  />
              </div>
            </div>

            <!-- Row 2 -->
            <div class="d-flex justify-content-end align-items-center mb-3">
              <div class="me-1">
                <input
                  type="text"
                  class="form-control bg-primary"
                  id="readonlyDay"
                  placeholder="Day"
                  value="Tuesday"
                  style="width: 115px; height: 58px; text-align: center; font-weight: bold;"
                  readonly
                />
              </div>
              <div class="flex-grow-1">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingSubject"
                    value="<?php echo $tuesday; ?>"
                    name="tuesday"
                    style="height: 58px;"
                  />
              </div>
            </div>
            
            <!-- Row 3 -->
            <div class="d-flex justify-content-end align-items-center mb-3">
              <div class="me-1">
                <input
                  type="text"
                  class="form-control bg-success"
                  id="readonlyDay"
                  placeholder="Day"
                  value="Wednesday"
                  style="width: 115px; height: 58px; text-align: center; font-weight: bold;"
                  readonly
                />
              </div>
              <div class="flex-grow-1">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingSubject"
                    value="<?php echo $wednesday; ?>"
                    name="wednesday"
                    style="height: 58px;"
                  />
              </div>
            </div>
                  
            <!-- Row 4 -->
            <div class="d-flex justify-content-end align-items-center mb-3">
              <div class="me-1">
                <input
                  type="text"
                  class="form-control bg-warning"
                  id="readonlyDay"
                  placeholder="Day"
                  value="Thursday"
                  style="width: 115px; height: 58px; text-align: center; font-weight: bold;"
                  readonly
                />
              </div>
              <div class="flex-grow-1">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingSubject"
                    value="<?php echo $thursday; ?>"
                    name="thursday"
                    style="height: 58px;"
                  />
              </div>
            </div>
                  
            <!-- Row 5 -->
            <div class="d-flex justify-content-end align-items-center mb-3">
              <div class="me-1">
                <input
                  type="text"
                  class="form-control bg-info"
                  id="readonlyDay"
                  placeholder="Day"
                  value="Friday"
                  style="width: 115px; height: 58px; text-align: center; font-weight: bold;"
                  readonly
                />
              </div>
              <div class="flex-grow-1">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingSubject"
                    value="<?php echo $friday; ?>"
                    name="friday"
                    style="height: 58px;"
                  />
              </div>
            </div>
                  
            <!-- Row 6 -->
            <div class="d-flex justify-content-end align-items-center mb-3">
              <div class="me-1">
                <input
                  type="text"
                  class="form-control bg-light"
                  id="readonlyDay"
                  placeholder="Day"
                  value="Saturday"
                  style="width: 115px; height: 58px; text-align: center; font-weight: bold;"
                  readonly
                />
              </div>
              <div class="flex-grow-1">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingSubject"
                    value="<?php echo $saturday; ?>"
                    name="saturday"
                    style="height: 58px;"
                  />
              </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Table Section -->
    <div class="col-lg-7">
      <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title mb-0">ComLab 1</h5>
          <div>
            <a href="edit1.php">
              <button class="btn btn-info btn-sm" style="text-decoration: none; font-weight: bold;">Back</button>
            </a>
          </div>
        </div>
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th scope="col"><b>Monday</th>
                <th scope="col"><b>Tuesday</th>
                <th scope="col"><b>Wednesday</th>
                <th scope="col"><b>Thursday</th>
                <th scope="col"><b>Friday</th>
                <th scope="col"><b>Saturday</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $i=0;
                $sql1= mysqli_query($mycon, "SELECT * from lab1 order by id ASC") or die (mysqli_error());
                WHILE($lab1=mysqli_fetch_array($sql1)){
                $id = $lab1['id'];
                                                    
                $i++;
            ?>
              <tr>
                    <td class="table-danger" style="text-transform: uppercase; font-weight: 600;">
                        <?php echo str_replace(',', '<br>', $lab1['monday']); ?>
                    </td>
                    <td class="table-primary" style="text-transform: uppercase; font-weight: 600;">
                        <?php echo str_replace(',', '<br>', $lab1['tuesday']); ?>
                    </td>
                    <td class="table-success" style="text-transform: uppercase; font-weight: 600;">
                        <?php echo str_replace(',', '<br>', $lab1['wednesday']); ?>
                    </td>
                    <td class="table-warning" style="text-transform: uppercase; font-weight: 600;">
                        <?php echo str_replace(',', '<br>', $lab1['thursday']); ?>
                    </td>
                    <td class="table-info" style="text-transform: uppercase; font-weight: 600;">
                        <?php echo str_replace(',', '<br>', $lab1['friday']); ?>
                    </td>
                    <td class="table-light" style="text-transform: uppercase; font-weight: 600;">
                        <?php echo str_replace(',', '<br>', $lab1['saturday']); ?>
                    </td>
                </tr>
               <?php } ?>
            </tbody>
          </table>
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
