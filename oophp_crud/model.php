<?php

class model
{
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $db="oop_crud";
    private $con;


    public function __construct()
    {
        try {
            $this->con= new mysqli($this->servername, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Connection Failed".$e->getMessage();
        }
    }


    /**
     *
     */
    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
                $name=$_POST['name'];
                $email=$_POST['email'];
                $mobile=$_POST['mobile'];
                $address=$_POST['address'];

                $query= ("insert into records (name,email,mobile,address)values ('$name','$email','$mobile','$address');");

                $sql=$this->con->query($query);

                if ($sql) {
                    echo "<script>alert('data added')</script>";
                    echo "<script>window.location.href='index.php'</script>";
                } else {
                    echo "<script>alert('Failed')</script>";
                    echo "<script>window.location.href='index.php'</script>";
                }
            } else {
                echo "<script>alert('Empty Fields')</script>";
                echo "<script>window.location.href='index.php'</script>";
            }
        }
    }


    public function fetch()
    {
        $data=null;


        $query=("select * from records");

        $result=$this->con->query($query);

        if ($result) {
            while ($row=mysqli_fetch_assoc($result)) {
                $data[]=$row;  //Creating an associative array of mixed types
            }
        }

        return $data;
    }


    public function delete($id)
    {
        $query="delete from records where `id`='$id';";

        $sql=$this->con->query($query);

        if ($sql) {
            return true;
        } else {
            return false;
        }
    }




    public function fetch_single($id)
    {
        $data=null;
        //$data=array();

        $query="select * from records where id='$id'";

        $sql=$this->con->query($query);

        if ($sql) {
            while ($row=mysqli_fetch_assoc($sql)) {
                $data=$row;
            }
        }
        return $data;
    }


    public function update($id, $name, $email, $mobile, $address)
    {
        $query=" UPDATE `records` SET `name`='$name',`email`='$email',`mobile`=$mobile,`address`='$address' WHERE `id`='$id';";

        $sql=$this->con->query($query);

        if ($sql) {
            return true;
        } else {
            return false;
        }
    }
}
