<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session and include necessary files
session_start();
include('../connect/connect.php');

// Check if the session has expired
$session_expired = false; // Default to not expired
if (!isset($_SESSION["full"]) || $_SESSION["full"] == "") {
    $session_expired = true;
} else {
            // Logout process and modal display after logout
            if (isset($_GET['logout'])) {
                SESSION_DESTROY();
                $logout_success = true;
            }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard - FAMS</title>
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
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
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
    </style>
  </head>

  <body>
    <?php if ($session_expired): ?>
      <div class="modal" tabindex="-1" role="dialog" style="display: block;" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="modal-body text-center">
              <!-- Warning Icon -->
              <i class="bi bi-exclamation-circle-fill" style="font-size: 5rem; color: #ffc107;"></i>
              <!-- Title -->
              <h5 class="mt-3 text-warning" style="font-size: 25px;">Session Expired</h5>
              <!-- Message -->
              <p style="font-size: 20px;">Your session has expired. Please log in again.</p>
            </div>
          </div>
        </div>
      </div>
      <script>
        setTimeout(function() { window.location = '../index.php'; }, 1500);
      </script>
    <?php endif; ?>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="admin.php" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="" />
          <span class="d-none d-lg-block" style="font-size: 30px;">FAMS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Logo -->

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
              <span class="d-none d-md-block dropdown-toggle ps-2">
                <?php echo isset($_SESSION["full"]) && $_SESSION["full"] != "" ? $_SESSION["full"] : "Guest"; ?>
              </span>
            </a>
            <!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo isset($_SESSION["full"]) && $_SESSION["full"] != "" ? $_SESSION["full"] : "Guest"; ?></h6>
                <span>IT Admin</span>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="admin.php?logout=true">
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
          <a class="nav-link" href="admin.php">
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
          <a class="nav-link collapsed" href="admin.php?logout=true">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
          </a>
        </li> 
      </ul>
    </aside>

    <!-- Modal for Logout -->
    <?php if (isset($logout_success) && $logout_success): ?>
        <div class="modal" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                    <div class="modal-body text-center">
                        <!-- Big Check Icon for Logout -->
                        <i class="bi bi-check-circle-fill" style="font-size: 5rem; color: #dc3545;"></i>
                        <!-- Title -->
                        <h5 class="mt-3 text-danger" style="font-size: 25px;">Logout Successful</h5>
                        <p style="font-size: 20px;">Goodbye, <?php echo htmlspecialchars($_SESSION['full']); ?>!</p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() { window.location = '../index.php'; }, 1500); // Redirect to home page after logout
        </script>
    <?php endif; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">
      <div class="pagetitle">
                        <div class="d-flex justify-content-between align-items-center">
                          <h1>Dashboard</h1>
                          <div>
                              <a href="schedule.php" style="text-decoration: none;"><button class="btn btn-danger" style="font-weight: 800;">Print</button></a>
                          </div>
                        </div>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">
          <!-- Left side columns -->
              <!-- Sales Card -->
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title mb-0">Room 12</h5>
                          <div>
                              <a href="edit12.php"><button class="btn btn-info btn-sm" style="text-decoration: none; font-weight: 800;">Edit</button></a>
                          </div>
                        </div>
                        <!-- Table Variants -->
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Mon</th>
                              <th scope="col">Tue</th>
                              <th scope="col">Wed</th>
                              <th scope="col">Thu</th>
                              <th scope="col">Fri</th>
                              <th scope="col">Sat</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php
                              $i=0;
                              $sql1= mysqli_query($mycon, "SELECT * from room12 order by id ASC") or die (mysqli_error());
                              WHILE($room12=mysqli_fetch_array($sql1)){
                              $id = $room12['id'];
                                                    
                              $i++;
                           ?>
                            <tr>
                            <td class="table-danger" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room12['monday']); ?>
                            </td>
                            <td class="table-primary" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room12['tuesday']); ?>
                            </td>
                            <td class="table-success" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room12['wednesday']); ?>
                            </td>
                            <td class="table-warning" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room12['thursday']); ?>
                            </td>
                            <td class="table-info" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room12['friday']); ?>
                            </td>
                            <td class="table-light" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room12['saturday']); ?>
                            </td>
                		</tr>
             			<?php } ?>
                          </tbody>
                        </table>
                        <!-- End Table Variants -->
                      </div>
                    </div>
                  </div>
              
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title mb-0">Room 21</h5>
                          <div>
                            <a href="edit21.php"><button class="btn btn-info btn-sm" style="text-decoration: none; font-weight: 800;">Edit</button></a>
                          </div>
                        </div>
                        <!-- Table Variants -->
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Mon</th>
                              <th scope="col">Tue</th>
                              <th scope="col">Wed</th>
                              <th scope="col">Thu</th>
                              <th scope="col">Fri</th>
                              <th scope="col">Sat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $i=0;
                              $sql1= mysqli_query($mycon, "SELECT * from room21 order by id ASC") or die (mysqli_error());
                              WHILE($room21=mysqli_fetch_array($sql1)){
                              $id = $room21['id'];
                                                    
                              $i++;
                           ?>
                            <tr>
                            <td class="table-primary" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room21['monday']); ?>
                            </td>
                            <td class="table-success" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room21['tuesday']); ?>
                            </td>
                            <td class="table-warning" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room21['wednesday']); ?>
                            </td>
                            <td class="table-info" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room21['thursday']); ?>
                            </td>
                            <td class="table-light" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room21['friday']); ?>
                            </td>
                            <td class="table-danger" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $room21['saturday']); ?>
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
              

              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title mb-0">ComLab 1</h5>
                          <div>
                            <a href="edit1.php"><button class="btn btn-info btn-sm" style="text-decoration: none; font-weight: 800;">Edit</button></a>
                          </div>
                        </div>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Mon</th>
                              <th scope="col">Tue</th>
                              <th scope="col">Wed</th>
                              <th scope="col">Thu</th>
                              <th scope="col">Fri</th>
                              <th scope="col">Sat</th>
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
                            <td class="table-success" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab1['monday']); ?>
                            </td>
                            <td class="table-warning" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab1['tuesday']); ?>
                            </td>
                            <td class="table-info" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab1['wednesday']); ?>
                            </td>
                            <td class="table-light" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab1['thursday']); ?>
                            </td>
                            <td class="table-danger" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab1['friday']); ?>
                            </td>
                            <td class="table-primary" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab1['saturday']); ?>
                            </td>
                		</tr>
             			<?php } ?>
                          </tbody>
                        </table>
                        <!-- End Table Variants -->
                      </div>
                    </div>
                  </div>
              
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title mb-0">ComLab 2</h5>
                          <div>
                            <a href="edit2.php"><button class="btn btn-info btn-sm" style="text-decoration: none; font-weight: 800;">Edit</button></a>
                          </div>
                        </div>
                        <!-- Table Variants -->
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Mon</th>
                              <th scope="col">Tue</th>
                              <th scope="col">Wed</th>
                              <th scope="col">Thu</th>
                              <th scope="col">Fri</th>
                              <th scope="col">Sat</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php
                              $i=0;
                              $sql1= mysqli_query($mycon, "SELECT * from lab2 order by id ASC") or die (mysqli_error());
                              WHILE($lab2=mysqli_fetch_array($sql1)){
                              $id = $lab2['id'];
                                                    
                              $i++;
                           ?>
                            <tr>
                            <td class="table-warning" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab2['monday']); ?>
                            </td>
                            <td class="table-info" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab2['tuesday']); ?>
                            </td>
                            <td class="table-light" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab2['wednesday']); ?>
                            </td>
                            <td class="table-danger" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab2['thursday']); ?>
                            </td>
                            <td class="table-primary" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab2['friday']); ?>
                            </td>
                            <td class="table-success" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab2['saturday']); ?>
                            </td>
                		</tr>
             			<?php } ?>
                          </tbody>
                        </table>
                        <!-- End Table Variants -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-title mb-0">ComLab 3</h5>
                      <div>
                        <a href="edit3.php"><button class="btn btn-info btn-sm" style="text-decoration: none; font-weight: 800;">Edit</button></a>
                      </div>
                    </div>
                    <!-- Table Variants -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Mon</th>
                          <th scope="col">Tue</th>
                          <th scope="col">Wed</th>
                          <th scope="col">Thu</th>
                          <th scope="col">Fri</th>
                          <th scope="col">Sat</th>
                        </tr>
                      </thead>
                        <tbody>
                         <?php
                              $i=0;
                              $sql1= mysqli_query($mycon, "SELECT * from lab3 order by id ASC") or die (mysqli_error());
                              WHILE($lab3=mysqli_fetch_array($sql1)){
                              $id = $lab3['id'];
                                                    
                              $i++;
                           ?>
                            <tr>
                            <td class="table-info" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab3['monday']); ?>
                            </td>
                            <td class="table-light" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab3['tuesday']); ?>
                            </td>
                            <td class="table-danger" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab3['wednesday']); ?>
                            </td>
                            <td class="table-primary" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab3['thursday']); ?>
                            </td>
                            <td class="table-success" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab3['friday']); ?>
                            </td>
                            <td class="table-warning" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab3['saturday']); ?>
                            </td>
                		</tr>
             			<?php } ?>
                        </tbody>
                      </table>
                        <!-- End Table Variants -->
                    </div>
                  </div>
                </div>
              
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title mb-0">ComLab 4</h5>
                          <div>
                            <a href="edit4.php"><button class="btn btn-info btn-sm" style="text-decoration: none; font-weight: 800;">Edit</button></a>
                        </div>
                        </div>
                        <!-- Table Variants -->
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Mon</th>
                              <th scope="col">Tue</th>
                              <th scope="col">Wed</th>
                              <th scope="col">Thu</th>
                              <th scope="col">Fri</th>
                              <th scope="col">Sat</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                              $i=0;
                              $sql1= mysqli_query($mycon, "SELECT * from lab4 order by id ASC") or die (mysqli_error());
                              WHILE($lab4=mysqli_fetch_array($sql1)){
                              $id = $lab4['id'];
                                                    
                              $i++;
                           ?>
                            <tr>
                            <td class="table-light" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab4['monday']); ?>
                            </td>
                            <td class="table-danger" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab4['tuesday']); ?>
                            </td>
                            <td class="table-success" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab4['wednesday']); ?>
                            </td>
                            <td class="table-warning" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab4['thursday']); ?>
                            </td>
                            <td class="table-info" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab4['friday']); ?>
                            </td>
                            <td class="table-light" style="text-transform: uppercase; font-weight: 600;">
                                <?php echo str_replace(',', '<br>', $lab4['saturday']); ?>
                            </td>
                		</tr>
             			<?php } ?>
                          </tbody>
                        </table>
                        <!-- End Table Variants -->
                      </div>
                    </div>
                  </div>
                </div>
              <!-- End Customers Card -->
              <!-- Reports -->
              <!-- End Reports -->
            <!-- End Website Traffic -->
            <!-- News & Updates Traffic -->
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
