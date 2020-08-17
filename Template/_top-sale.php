<!-- Top Sale --> 
<?php
    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo  $item['item_name'] ?? "Unknown";  ?></h6>
                        
                        <div class="price py-2">
                            <span>₹<?php echo $item['item_price'] ?? '0' ; ?></span>
                        </div>

                        <?php
                            if( isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true") 
                            {

                                echo '<form method="post">
                                    <input type="hidden" name="item_id" value="'. $item["item_id"].'">
                                    <input type="hidden" name="user_id" value="'.$_SESSION["id"].'">';
                                    
                                    $db = new DBController();
                                    $uid=$_SESSION['id'];
                                    $it=$item['item_id'];
                                    $query_string="SELECT * FROM `cart` WHERE user_id='$uid' AND item_id='$it'";
                                    $result = $db->con->query($query_string);
                                    $nrow= mysqli_num_rows($result);
                                    if ( $nrow >0 )
                                    {
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                    }
                                    else
                                    {
                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                    }
                               echo '</form>';
                            }
                            else
                            {
                                  echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale