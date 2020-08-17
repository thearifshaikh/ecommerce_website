<!--   product  -->
<?php
   

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if (isset($_POST["productpage_submit"]))
            {
                // call method addToCart
                $Cart->addToCartP($_POST['user_id'], $_POST['item_id']);
            }
         }
        $item_id = $_GET['item_id'] ?? 1;
        foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
            
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                   
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                <hr class="m-0">


                <!---    product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>₹20999.00</strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger">₹<span><?php echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                </table>
                <div class="col">

                 
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
                                    echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                                }
                                else
                                {
                                    echo '<button type="submit" name="productpage_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                                }
                           echo '</form>';
                        }
                        else
                        {
                              echo '<button type="submit" name="productpage_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                        }
                    ?>
                    </div>
                <hr>

                <div class="row">
                    <div class="col-6">
                        <!-- color -->
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-baloo">Color:</h6>
                                <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                            </div>
                        </div>
                        <!-- !color -->
                    </div>
                    <div class="col-6">
                    </div>
                </div>

                <!-- size -->
                <div class="size my-3">
                    <h6 class="font-baloo">Size :</h6>
                    <div class="d-flex justify-content-between w-75">
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">4GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">6GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">8GB RAM</button>
                        </div>
                    </div>
                </div>
                <!-- !size -->


            </div>

            <div class="col-12">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14">
                    <li>48MP (F2.0) quad rear camera +8MP (F2.2) ultra wide camera +2MP(F2.4) depth camera + 2MP(F2.4) macro camera | 13MP (F2.2) front facing punch hole camera</li>
                    <li>16.40 centimeters (6.5-inch) TFT infinity-O display with capacitive touchscreen and HD+ resolution with 720 x 1600 pixels resolution</li>
                    <li>Memory, Storage & SIM: 6GB RAM | 64GB internal memory expandable up to 512GB | Dual SIM dual-standby (4G+4G)</ul>
                    <li>Android v10 operating system with 2.0GHz Exynos 850 octa-core processor</li>
                    <li>5000mAH lithium-ion battery</li>
                    <li>1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</li>
                    <li>Box also includes: Travel adapter, USB cable, ejection pin and user manual. The box does not include earphones</li>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->
<?php
        endif;
        endforeach;
?> 