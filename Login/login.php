<?php
session_start();
include "../Database/database.php";
include "loginHeader.php";

$error_info = "";

if (isset($_POST['login'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (!empty($username) && !empty($password)) {
    $result = $conn->query("SELECT * FROM user WHERE username = '" . $username . "' ");
    $row = mysqli_fetch_assoc($result);

    if (MD5('$password') == isset($row["password"])) {
      $_SESSION["username"] = $username;
      $_SESSION["uid"] = $row["uid"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["age"] = $row["age"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["nic"] = $row["nic"];
      $_SESSION["pro_pic"] = $row["pro_pic"];

      if ($row["admin"] == 1) {
        header("Location: ../Admin/admin.php");
      } else {
        header("Location: ../Client/index.php");
      }
    } else {
      $error_info = "Wrong username or Password, please Try Again";
    }
  } else {
    $error_info = "Please, Enter The Username And Password!!";
  }
}
?>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="card mt-5 w-50">
        <h5 class="card-header text-center">Login</h5>
        <div class="card-body">
          <form action="login.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <!-- error-->
            <div class="inputForm">
              <?php
              if (!empty($error_info)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <?= $error_info ?>
                </div>
              <?php } ?>
            </div>
            <!-- error-->

            <div class="pb-3">
              <button name="login" class="btn btn-success">Login</button>
              <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
          </form>
          <a href="register.php">Don't have an account? Register Now!!</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>