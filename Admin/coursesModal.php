<?php
include "../Database/database.php";
include "../Login/loginHeader.php";

if (isset($_POST["submit"])) {
    $cName = $_POST["cName"];
    $cDescription = $_POST["cDescription"];
    $cDuration = $_POST["cDuration"];
    $cPrice = $_POST["cPrice"];

    $sql = "insert into courses (cname, price, duration, description) values ('$cName','$cPrice','$cDuration','$cDescription')";
    $conn->query($sql);

    header('location:./courses.php');
}

if(isset($_POST["editSubmit"])){
    $cEditId= $_POST["cEditId"];
    $cEditName = $_POST["cEditName"];
    $cEditDescription = $_POST["cEditDescription"];
    $cEditDuration = $_POST["cEditDuration"];
    $cEditPrice = $_POST["cEditPrice"];

    $sql="update courses set cname='$cEditName', price='$cEditPrice', duration='$cEditDuration', description='$cEditDescription' where cid='$cEditId'";
    $conn->query($sql);
    header('location:./courses.php');
}

if(isset($_POST["deleteSubmit"])){

}
?>

<!-- add course model  -->
<div class="modal fade" id="addCoursesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="coursesModal.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="Course name" class="col-sm-2 col-form-label">Course name</label>
                        <div class="col-sm-10">
                            <input type="text" name="cName" class="form-control" id="Course name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="cDescription" id="Description" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="text" name="cDuration" class="form-control" id="Duration" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" name="cPrice" class="form-control" id="Price" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- edit course model  -->
<div class="modal fade" id="editCoursesModal<?php echo $row['cid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Edit Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="coursesModal.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <input type="hidden" name="cEditId" class="form-control" value="<?php echo $row['cid']; ?>" id="Course name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Course name" class="col-sm-2 col-form-label text-dark">Course name</label>
                        <div class="col-sm-10">
                            <input type="text" name="cEditName" class="form-control" value="<?php echo $row['cname']; ?>" id="Course name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Description" class="col-sm-2 col-form-label text-dark">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="cEditDescription" id="Description" required><?php echo $row['description']; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Duration" class="col-sm-2 col-form-label text-dark">Duration</label>
                        <div class="col-sm-10">
                            <input type="text" name="cEditDuration" value="<?php echo $row['duration']; ?>" class="form-control" id="Duration" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Price" class="col-sm-2 col-form-label text-dark">Price</label>
                        <div class="col-sm-10">
                            <input type="number" name="cEditPrice" value="<?php echo $row['price']; ?>" class="form-control" id="Price" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="editSubmit" name="editSubmit" class="btn btn-primary">Update changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- delete course model  -->
<div class="modal fade" id="deleteCoursesModal<?php echo $row['cid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Delete Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="deleteSubmit" name="deleteSubmit" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>