<?php
SESSION_START();
include("connect/connect.php"); // Ensure the database connection file is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = mysqli_real_escape_string($mycon, $_POST['uname']);
    $pwd = mysqli_real_escape_string($mycon, $_POST['pwd']);

    if (!empty($uname) && !empty($pwd)) {
        $sql = "SELECT * FROM user WHERE uname='$uname' AND pwd='$pwd'";
        $result = mysqli_query($mycon, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $result1 = mysqli_fetch_array($result);
            $_SESSION['full'] = $result1['full'];
            $login_success = true; // Trigger success modal or redirect
        } else {
            $login_error = "Invalid login details.";
        }
    } else {
        $login_error = "Please fill in both username and password.";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Facility Access Monitoring System</title>
    <!-- Favicons -->
    <link href="image/favicon.png" rel="icon" />
    <link href="image/apple-touch-icon.png" rel="apple-touch-icon" />
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP"
      crossorigin="anonymous"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <style>
      .formTitle {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="user_card">
          <div class="d-flex justify-content-center">
            <div class="brand_logo_container">
              <img src="image/it.png" class="brand_logo" alt="Logo" />
            </div>
          </div>
          <div class="d-flex justify-content-center form_container">
            <form name="form_login" method="post" action="">
              <div class="formTitle">
                <h4>FACILITY ACCESS</h4>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <span class="input-group-text"
                    ><i class="fas fa-user"></i
                  ></span>
                </div>
                <input
                  type="text"
                  class="form-control input_user"
                  placeholder="Username"
                  name="uname"
                />
              </div>
              <div class="input-group mb-2">
                <div class="input-group-append">
                  <span class="input-group-text"
                    ><i class="fas fa-key"></i
                  ></span>
                </div>
                <input
                  type="password"
                  class="form-control input_pass"
                  placeholder="Password"
                  name="pwd"
                />
              </div>
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <input
                    class="btn btn-primary px-4"
                    type="submit"
                    name="submit"
                    value="Login"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Display Modal After Successful Login -->
        <?php if (isset($login_success) && $login_success): ?>
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                        <div class="modal-body text-center">
                            <!-- Big Check Icon -->
                            <i class="bi bi-check-circle-fill" style="font-size: 5rem; color: #28a745;"></i>
                            <!-- Title -->
                            <h5 class="mt-3 text-success" style="font-size: 25px;">Login Successful</h5>
                            <!-- Welcome Message -->
                            <p style="font-size: 20px;">Welcome, <?php echo htmlspecialchars($_SESSION['full']); ?>!</p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                setTimeout(function() { window.location = 'fams/admin.php'; }, 1500);
            </script>
        <?php elseif (isset($login_error)): ?>
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                        <div class="modal-body text-center">
                            <!-- Big X Icon -->
                            <i class="bi bi-x-circle-fill" style="font-size: 5rem; color: #dc3545;"></i>
                            <!-- Title -->
                            <h5 class="mt-3 text-danger" style="font-size: 25px;">Login Invalid</h5>
                            <!-- Error Message -->
                            <p style="font-size: 20px;"><?php echo htmlspecialchars($login_error); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                setTimeout(function() { window.location = 'index.php'; }, 1000);
            </script>
        <?php endif; ?>

  </body>
</html>
