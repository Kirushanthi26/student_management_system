<?php
include "../Database/database.php";
include "../Login/loginHeader.php";

if (isset($_POST["enrollSubmit"])) {
    $cEId = $_POST["cEId"];
    $uEId = $_POST["uEId"];


    $sql = "insert into enroll (uid,cid) values ('$uEId','$cEId')";
    $conn->query($sql);

    header('location:./index.php');
}

?>

<div class="modal fade" id="enrollModal<?php echo $row['cid']; ?><?php echo $_SESSION['uid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Enroll Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="enrollModal.php" method="POST" enctype="multipart/form-data">
                    <h5 class="text-dark">Hi <?php echo $_SESSION['name']; ?>, Do you really want to Join this Course?</h5>
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <input type="hidden" name="cEId" class="form-control" value="<?php echo $row['cid']; ?>" id="Course name" required>
                            <input type="hidden" name="uEId" class="form-control" value="<?php echo $_SESSION['uid']; ?>" id="Course name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Course name" class="col-sm-2 col-form-label text-dark">Course name</label>
                        <div class="col-sm-10">
                            <h3 class="text-dark px-3"><?php echo $row['cname']; ?></h3>
                            <input type="hidden" name="cEditName" class="form-control" value="<?php echo $row['cname']; ?>" id="Course name" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success" type="enrollSubmit" name="enrollSubmit">Yes!</button>
            </div>
            </form>
        </div>
    </div>
</div>