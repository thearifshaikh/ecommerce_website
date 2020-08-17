<?php
require ('database/DBController.php');
$db = new DBController();
$conn=$db->con;

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $user_email=$_POST['signupemail'];
        $pass=$_POST['signuppassword'];
        $cpass=$_POST['signupcpassword'];
        $username=$_POST['username'];

        $query_string="SELECT * FROM user where user_email='$user_email'";
        $result = $db->con->query($query_string);
        $nrow= mysqli_num_rows($result);
        $showerror="false";
        $showalert=false;
        if($nrow>0)
        {
            $showerror="USER ALREADY EXISTS";
        }
        else
        {
            if($pass==$cpass)
            {
                $hash=password_hash($pass, PASSWORD_DEFAULT);
                $sql="INSERT INTO `user` (`user_email`,`username`, `user_pass`) VALUES ('$user_email','$username', '$hash')";
                $result = $db->con->query($sql);
                if($result)
                {
                    $showalert=true;
                    header("Location:index.php?signupsuccess=true");
                    exit();
                }
            }
            else
            {
                $showerror="PASSWORD DOES NOT MATCH";
            }
        }
        header("Location:index.php?signupsuccess=false&error=$showerror");
    }
?>