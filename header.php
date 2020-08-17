<?php
session_start();
    include ('_loginmodal.php');
    include ('_signupmodal.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Collections</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">

    <?php
    // require functions.php file
    require ('functions.php');
    ?>

</head>
<body>

<!-- start #header -->
<header id="header">

    <!-- Primary Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="index.php">Smart Collections</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">
              
                <li class="nav-item active">
                    <a class="nav-link" href="#top-sale">Top Sale</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#special-price">Special Price</a>
                </li>
            </ul>
           <?php
                if( isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true") 
                {
                    echo '<form action="#" class="font-size-14 font-rale">
                            <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                                <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                                <span class="px-3 py-2 rounded-pill text-dark bg-light">'.count($product->getDataforuser($_SESSION["id"])).'</span>
                            </a>
                        </form>
                        <form class="form-inline my-2 my-lg-0">
                            <p class="text-light my-0 mx-2 pl-4">Welcome '.$_SESSION["username"].'</p>
                            <a href="logout.php" class="btn btn-dark ml-2">LOGOUT</a>
                        </form>';
                }
                else
                {
                    echo ' <div class="mx-2">
                 <button class="btn btn-dark my-2 my-sm-0" data-toggle="modal" data-target="#loginmodal"type="submit">LOGIN</button>
                 <button class="btn btn-dark my-2 my-sm-0" data-toggle="modal" data-target="#signupmodal"type="submit">SIGNUP</button>
                    </div>';
                }
           ?>
           

            
        </div>
    </nav>
    <!-- !Primary Navigation -->

    <?php
        if( isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") 
          {
            echo'<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
              <strong>SIGNUP SUCCESFULL!</strong> YOU CAN NOW LOGIN.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }
          if( isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false") 
          {
            $showerror=$_GET['error'];
            echo'<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
              <strong>SIGNUP FAILED!</strong>'.$showerror.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';

          }
          if( isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false") 
          {
            echo'<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
              <strong>LOGIN FAILED!!</strong> Invalid Credentials.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }
          if( isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true") 
          {
            echo'<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
              <strong>LOGIN SUCCESSFUL!!</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }
          if( isset($_GET['order']) && $_GET['order']=="true") 
          {
            echo'<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
              <strong>ORDER SUCCESSFULL!!</strong> Thank you for shopping with us. A mail has been sent to you with the order details.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }
    ?>

</header>
<!-- !start #header -->

<!-- start #main-site -->
<main id="main-site">