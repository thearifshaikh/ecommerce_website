<?php
session_start();
require ('database/DBController.php');
$db = new DBController();
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email=$_POST['loginemail'];
        $pass=$_POST['loginpass'];

        $sql="SELECT * FROM user WHERE user_email='$email'";
        $result = $db->con->query($sql);
        $nrow= mysqli_num_rows($result);
        $check=false;
        if($nrow==1)
        {
            $row=mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['user_pass']))
            {
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$row['username'];
                $_SESSION['id']=$row['user_id'];
                header("Location:index.php?loginsuccess=true");
                exit();
            }
        }
        header("Location:index.php?loginsuccess=false");
    }
