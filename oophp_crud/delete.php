<?php

// if you want you can put ajax req to this

include('model.php');

$del_obj= new model();
$id=$_REQUEST['id'];

$delete=$del_obj->delete($id);

if ($delete) {
    echo "<script>alert('deleted')</script>";
    echo "<script>window.location='records.php';</script>";
}
