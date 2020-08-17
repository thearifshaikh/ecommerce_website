<?php
    // include header.php file
    include ('header.php');
    $db = new DBController();
    $conn=$db->con;
?>
<?php
    $showalert=false;
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $t=$_POST['title'];
      $des=$_POST['desc'];
      $i=$_POST['sno'];
      $t=str_replace("<","&lt;",$t);
      $t=str_replace(">","&gt;",$t);
      $des=str_replace("<","&lt;",$des);
      $des=str_replace(">","&gt;",$des);
      $sql="INSERT INTO `blog` ( `title`, `description`, `user_id`, `tstamp`) VALUES ('$t', '$des', '$i', current_timestamp())";
      $result = $db->con->query($sql);
      $showalert=true;
    }
    if($showalert)
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Your Blog Has Been Added!.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>THREADS!</title>
  </head>
  <body>
    <div class="container my-4">
        <h1>Add Your Blog</h1>
        <p>
          <a class="btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
           Add Blog
          </a>
        </p>
        <div class="collapse my-3 py-3" id="collapseExample">
          <div class="card card-body">
           <?php
           if( isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true") 
            {
              echo '<form action="blog.php"   method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Blog Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Keep your problem title small and straight.</small>
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="sno" value="'.$_SESSION["id"].'">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>';
            }
        else
        {
          echo "Login to add your blog";
        }
            
            ?>
          </div>
        </div>
    </div>


    <div class="container my-4 py-4">
        <h1 class="py-2"> Latest Blogs</h1>
        <?php
          $sql="SELECT * FROM blog ORDER BY tstamp DESC";
          $result = mysqli_query($db->con,$sql);
          $r=mysqli_num_rows($result);
          // echo var_dump($result);
          // $row=mysqli_fetch_assoc($result);
          // echo var_dump($row);
          // $row=mysqli_fetch_assoc($result);
          // echo var_dump($row);
          // $row=mysqli_fetch_assoc($result);
          // echo var_dump($row);
          $row=mysqli_fetch_assoc($result);
          while($row!=NULL)
          {
            $title=$row['title'];
            $desp=$row['description'];
            $id=$row['blog_id'];
            $blog_user_id=$row['user_id'];
            $blog_time=$row['tstamp'];

            $sql2="SELECT username FROM user WHERE user_id=$blog_user_id";
            $result = $db->con->query($sql);
            $row2=mysqli_fetch_assoc($result);
            $p=$row2['username'];
            echo '<div class="media my-2 py-2">
              <img src="user.png" width="100px" class="align-self-center mr-3" alt="...">
              <div class="media-body">
                <h5 class="my-0"> <a href="blogdetails.php?blogid='. $id.'&user='.$blog_user_id.'">'. $title.' </a></h5>
                <footer class="blockquote-footer">'. $p.'<cite title="Source Title"> at '. $blog_time.'</cite></footer>
                '. $desp.'
              </div>
            </div>';
            $row=mysqli_fetch_assoc($result);
          }
          if($r==0)
          {
            echo "Be the first one to post a blog!!";
          }
        ?>
        
      </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>


