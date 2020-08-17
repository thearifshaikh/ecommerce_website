<?php
    include ('header.php');
?>

    <div class="container my-4 pd-4">
         <h1 class="font-baloo font-size-30">Check Out</h1>
    </div>

    <div class="row mx-5 my-4 h" style="height: 65vh";>

        <div class="col-sm-1">
        </div>
        <div class="col-sm-4">
            <?php
                $arr=array();
                $arr=$product->getDataforuser($_SESSION['id']);
                // echo count($arr);
                    foreach ($product->getDataforuser($_SESSION['id']) as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                            return $item['item_price'];
                        }, $cart); 
                    endforeach;
                ?>

                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery and Cash on Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                    </div>
                </div>
            </div>


        
        <div class="col-sm-6">
            <form action="handlecheckout.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Name</label>
                  <input type="text" name="name" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Phone Number</label>
                  <input type="varchar"  name="phone" class="form-control" id="inputPassword4">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text"  name="add" class="form-control" id="inputAddress">
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputCity">City</label>
                  <input type="text" name="city" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCity">State</label>
                  <input type="text" name="state" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputZip">Pincode</label>
                  <input type="text" name="pincode" class="form-control" id="inputZip">
                </div>
              </div>
              <button type="submit" class=" text-center btn btn-primary">SUBMIT</button>
            </form>
           
        </div>
       
    </div>


<?php
// include footer.php file
include ('footer.php');
?>

