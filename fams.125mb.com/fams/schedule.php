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

    <title>Schedule - FAMS</title>
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
        font-size: 13px;
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
   <center>
<div style="display: flex; align-items: center; justify-content: center; text-align: center;">
  <!-- Left Logo -->
  <img src="image/tcc.png" alt="TCC Logo" style="width: 75px; height: 75px; margin-right: 20px; margin-top: 10px;" />
  
  <!-- Center Text -->
  <div>
    <h5 style="margin: 0;">
      Tagoloan Community College<br>
      College of Information Technology
    </h5>  
  </div>
  
  <!-- Right Logo -->
  <img src="image/it.png" alt="BSIT Logo" style="width: 75px; height: 75px; margin-left: 20px; margin-top: 10px;" />
</div>
<h6>Classrooms & ComLabs Schedules</h6>
      <hr />
    </center>
    <div class="container-lg-10">

      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card">
            <div
              class="card-body profile-card pt-4 d-flex flex-column align-items-center"
            >                        
                    <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title mb-0" style="font-size: 23px; font-weight: 600;">Room 12</h5>
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
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div
              class="card-body profile-card pt-4 d-flex flex-column align-items-center"
            >
             <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title mb-0" style="font-size: 23px; font-weight: 600;">Room 21</h5>
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

      <!-- Bottom row -->
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card">
            <div
              class="card-body profile-card pt-4 d-flex flex-column align-items-center"
            >
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title mb-0" style="font-size: 23px; font-weight: 600;">ComLab 1</h5>
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
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div
              class="card-body profile-card pt-4 d-flex flex-column align-items-center"
            >
              <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0" style="font-size: 23px; font-weight: 600;">ComLab 2</h5>
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
            </div>
          </div>
        </div>
                <div class="col-lg-5">
          <div class="card">
            <div
              class="card-body profile-card pt-4 d-flex flex-column align-items-center"
            >
              <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0" style="font-size: 23px; font-weight: 600;">ComLab 3</h5>
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
            </div>
          </div>
        </div>
                <div class="col-lg-5">
          <div class="card">
            <div
              class="card-body profile-card pt-4 d-flex flex-column align-items-center"
            >
              <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0" style="font-size: 23px; font-weight: 600;">ComLab 4</h5>
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prepared by:<br><br>
    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["full"]; ?></b>

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
