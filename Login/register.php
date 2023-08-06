<?php
session_start();

include "../Database/database.php";
include "loginHeader.php";

if (isset($_POST["Register"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm = $_POST["confirmPass"];

    $error_info = "";

    if ($password == $confirm) {
        $result = $conn->query("SELECT * FROM user WHERE username ='" . $username . "'");

        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO user (name, age, email, nic, username, password) VALUES ('$name','$age','$email','$nic','$username',
            '$password')";

            if ($conn->query($sql)) {
                header("Location: login.php");
            } else {
                $error_info = "Couldn't create your account";
            }
        } else {
            $error_info = "username already taken";
        }
    } else {
        $error_info = "the confirm password you entered doesn't match";
    }
}
?>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card mt-5 w-50">
                <h5 class="card-header text-center">Registration</h5>
                <div class="card-body">
                    <form action="register.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="age" class="col-sm-2 col-form-label">Age</label>
                            <div class="col-sm-10">
                                <input type="number" name="age" class="form-control" id="age" min="1" max="150" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nic" class="col-sm-2 col-form-label">NIC No</label>
                            <div class="col-sm-10">
                                <input type="text" name="nic" class="form-control" id="nic" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Cpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="confirmPass" class="form-control" id="Cpassword" required>
                            </div>
                        </div>

                        <!-- error-->
                        <div class="inputForm">
                            <?php
                            if (!empty($error_info)) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                                    <?= $error_info ?>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- error-->

                        <div class="pb-3">
                            <button name="Register" class="btn btn-success">Register</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                    <a href="login.php">Already have an account? Login now!!</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>