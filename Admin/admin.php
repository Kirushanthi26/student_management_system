<?php
session_start();
include "../Database/database.php";
include "../Login/loginHeader.php";




?>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand">Admin Dashboard</a>
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



</body>

</html>