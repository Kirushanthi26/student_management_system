<?php
session_start();
include "../Database/database.php";
include "../Login/loginHeader.php";


?>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="./admin.php" class="navbar-brand">Admin Dashboard</a>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="./courses.php" class="nav-link">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Login/loginOut.php" class="btn btn-outline-danger nav-link">Login Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <h3 class="text-center my-3">
                Courses
            </h3>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary my-3 " data-bs-toggle="modal" data-bs-target="#addCoursesModal">
                    Add Courses
                </button>
                <?php include "coursesModal.php" ?>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <table class="table table-dark table-hover">
                <thead>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>