<?php
session_start();
include "../Database/database.php";
include "../Login/loginHeader.php";



?>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand">Courses Enrolment</a>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="../Login/loginOut.php" class="nav-link">Login Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <h3 class="text-center my-3">
                Student enrolment
            </h3>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <table class="table table-dark table-hover">
                <thead>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Price (Rs.)</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM courses ORDER BY cid ASC");
                    while ($row = $query->fetch_array()) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $row['cname']; ?>
                            </td>
                            <td>
                                <?php echo $row['description']; ?>
                            </td>
                            <td>
                                <?php echo $row['duration']; ?>
                            </td>
                            <td>
                                <?php echo number_format($row['price'], 2); ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary my-3 " value="<?php echo $row['cid']; ?><?php echo $_SESSION['uid']; ?>" data-bs-toggle="modal" data-bs-target="#enrollModal<?php echo $row['cid']; ?><?php echo $_SESSION['uid']; ?>">
                                    Join!!!
                                </button>
                                <?php include "enrollModal.php" ?>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>