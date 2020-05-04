<?php 

session_start();

require_once('db.php');
require_once('comp.php');
$cartobj= new db_data();

if(isset($_POST['remove']))
{
    if($_GET['action']=='remove')
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['product_id']==$_GET['id'])
            {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('removed')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>

<title>Cart</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">


<?php
require_once('header.php');
?>


<div class="container-fluid">

    <div class="row px-5">

    <div class="col-md-7">
        <div class="shopping-cart">
            <h6>My Cart</h6>
            <hr>

        <?php
                $total=0;
            if(isset($_SESSION['cart']))
            {
                
                $product_id=array_column($_SESSION['cart'],"product_id");

               
                $result=$cartobj->getdata();

                while($row=mysqli_fetch_assoc($result))
                {
                    foreach($product_id as $id)
                    {
                        if($row['id']==$id)
                        {
                            cart($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
                            $total=$total+$row['product_price']; 
                        }
                    }
                }
            }
            else {
                echo "<h5>card is empty</h5>";
            }

        ?>
        </div>  
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25"> 

            <div class="pt-4">
            <h6>PRICE DETAILS</h6>
            <hr>
            <div class="row price-details">
                <div class="col-md-6">
                <?php  
                            
                    if(isset($_SESSION['cart']))
                    {
                        $count=count($_SESSION['cart']);
                        echo "<h6>price ($count items)</h6>";
                    }
                    else {
                        echo "<h6>Price (0 items)</h6>";
                    }
                
                ?>
                    <h6>Delivery Charges</h6>
                    <hr>
                        <h6>Amount payble</h6>
                </div>
            <div class="col-md-6">
                    <h6>$<?php  
                    echo $total; 
                    ?></h6>
                    <h6 class="text-success">Free</h6>
                    <hr>
                    <h6>$
                    <?php 

                        echo $total;


                    ?></h6>
            </div>

        </div>


            </div>

    </div>

    </div>

</div>











<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>