<!-- Special Price -->
<?php
    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
                array_map(function ($brand){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item) use($in_cart){ ?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="price py-2">
                                <span>₹<?php echo $item['item_price'] ?? 0 ?></span>
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
            </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->
