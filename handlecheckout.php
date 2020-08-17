<?php
session_start();
require ('database/DBController.php');
$db = new DBController();

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $add=$_POST['add'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $pincode=$_POST['pincode'];
        $id=$_SESSION['id'];

        $query_string="SELECT * FROM cart where user_id='$id'";
        $result = $db->con->query($query_string);

        while($rows=mysqli_fetch_assoc($result))
        {
            $c=$rows['cart_id'];
            $i=$rows['item_id'];
            $sql="INSERT INTO `ordered` (`oderid`, `user_id`, `item_id`, `name`, `phone`, `address`, `city`, `state`, `pincode`, `status`, `tstamp`) VALUES (NULL, '$id', '$i', '$name', '$phone', '$add', '$city', '$state', '$pincode', 'Not delivered', current_timestamp());";
            $result2 = $db->con->query($sql);
            
            $sql="DELETE FROM `cart` WHERE `cart`.`cart_id` = '$c'";
            $result2 = $db->con->query($sql);
        }
    }
    header("Location:index.php?order=true");
?>