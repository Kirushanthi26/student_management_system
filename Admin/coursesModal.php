<?php
include "../Database/database.php";
include "../Login/loginHeader.php";

if(isset($_POST["submit"])){
    $cName=$_POST["cName"];
    $cDescription=$_POST["cDescription"];
    $cDuration=$_POST["cDuration"];
    $cPrice=$_POST["cPrice"];

    $sql = "insert into courses (cname, price, duration, description) values ('$cName','$cPrice','$cDuration','$cDescription')";
    $conn->query($sql);
    
    header('location:./courses.php');
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
                        <textarea class="form-control" name="cDescription"  id="Description" required></textarea>
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
<div class="modal fade" id="editCoursesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update changes</button>
            </div>
        </div>
    </div>
</div>

<!-- delete course model  -->
<div class="modal fade" id="deleteCoursesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>