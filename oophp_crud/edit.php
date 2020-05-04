<?php

include('model.php');

$model_obj= new model();

$id=$_REQUEST['id'];

$row=$model_obj->fetch_single($id);



if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
        $update_obj= new model();

        $result=$update_obj->update($id, $_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['address']);

        if ($result) {
            echo "<script>alert('Updated')</script>";
        } else {
            echo "<script>alert('Update failed')</script>";
        }
    } else {
        echo "<script>alert('please fill fields')</script>";
    }
}




?>




<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<h1>Hello, world!</h1>

<hr style="height:1px;color:black;background-color: black";>
<div class="container">

    <div class="row">

        <div class="col-md-12 mt-5">
            <h1 class="text-center">PHP OOP CRUD</h1>

        </div>
    </div>

    <div class="row">

        <div class="col-md-5 mx-auto">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="<?php echo $row['name'];?>">


                </div>

                <div class="form-group">
                    <label for="">Emaill</label>
                    <input type="text" name="email" class="form-control" placeholder="<?php echo $row['email'];?>">


                </div>

                <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="<?php echo $row['mobile'];?>">


                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" cols="" rowas="3" placeholder="<?php echo $row['address'];?>">


                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Update</button>


                </div>



            </form>
        </div>
    </div>

</div>








<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



