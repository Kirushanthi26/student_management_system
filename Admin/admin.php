<?php
session_start();
include "../Database/database.php";
include "../Login/loginHeader.php";


if (isset($_POST["acceptBtn"])) {
    $eid = $_POST["eid"];

    $sqlA = "UPDATE enroll SET status='1' where eid = $eid ";
    $conn->query($sqlA);
    include "../sendEmail.php";
}
if (isset($_POST["denialBtn"])) {
    $eid = $_POST["eid"];

    $sqld = "UPDATE enroll SET status='2' where eid = $eid ";
    $conn->query($sqld);
}


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

    <div class="container">
        <div class="row my-5">
            <table class="table table-dark table-hover">
                <thead>
                    <th>Course Name</th>
                    <th>Student name</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM enroll ORDER BY eid ASC");
                    while ($row = $query->fetch_array()) {

                        $result = $conn->query("SELECT name, email FROM user WHERE uid='" . $row['uid'] . "' ");
                        while ($row1 = $result->fetch_array()) {

                            $result = $conn->query("SELECT cname FROM courses WHERE cid='" . $row['cid'] . "' ");
                            while ($row2 = $result->fetch_array()) {
                    ?>
                                <form action="admin.php" method="POST" enctype="multipart/form-data">
                                    <tr>
                                        <td>
                                            <input type="text" name="eid" value="<?php echo $row['eid']; ?>" hidden>
                                            <?php echo $row2['cname']; ?>
                                        </td>
                                    <?PHP } ?>
                                    <td>
                                        <?php echo $row1['name']; ?>
                                        <input type="text" name="emailName" value="<?php echo $row1['name']; ?>" hidden>
                                        <input type="text" name="emailAddress" value="<?php echo $row1['email']; ?>" hidden>
                                    </td>
                                <?PHP } ?>
                                <td>
                                    <?php

                                    if ($row["status"] == 1) {
                                        echo ' <span class="badge text-bg-success">Confirmed</span>';
                                    } elseif ($row["status"]  == 2) {
                                        echo ' <span class="badge text-bg-danger">Rejected</span>';
                                    } else {
                                        echo ' <span class="badge text-bg-info">For Verification</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button type="acceptBtn" name="acceptBtn" class="btn btn-success">Accept</button>
                                    <button type="denialBtn" name="denialBtn" class="btn btn-danger">Reject</button>
                                </td>
                                </form>

                                </tr>
                            <?PHP } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>