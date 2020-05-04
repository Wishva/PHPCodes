<?php

class db_data
{

        private $server="localhost";
        private $username="root";
        private $password="";
        private $db="shpcart";
        private $con;


        public function __construct()
        {
               try {
                   
                $this->con= new mysqli($this->server,$this->username,$this->password,$this->db);

               } catch (Exception $e) {
                
                    echo "Connection failed". $e->getMessage();

               } 

        }
                    
            public  function getdata()
             {
                

                $sql="select * from productdb";

                $result=mysqli_query($this->con,$sql);


                if(mysqli_num_rows($result)>0)
                {
                    return $result;

                }


             }



}

?>