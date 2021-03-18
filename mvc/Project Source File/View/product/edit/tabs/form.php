
<?php
require_once './View/template/header.php';

$product = $this->getProduct();
$model_product = \Mage::getProduct('Model\Product');

?>

<div class="form-group row">
            <label class="col-md-4 control-label text-center" for="sku">SKU</label>
            <div class="col-md-4">
            <input id="sku" name="product[sku]" placeholder="PRODUCT SKU" class="form-control input-md" required="" type="text" value="<?php echo $product->sku ?>">
            </div>
        </div><br>
        
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="name">PRODUCT NAME</label>
            <div class="col-md-4">
            <input id="name" name="product[name]" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text" value="<?php echo $product->name ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="price">PRICE</label>
            <div class="col-md-4">
            <input id="price" name="product[price]" placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="text" value="<?php echo $product->price ?>">
            </div>
        </div><br>

        <div class="form-group row ">
            <label class="col-md-4 control-label text-center" for="discount">DISCOUNT</label>
            <div class="col-md-4">
            <input id="discount" name="product[discount]" placeholder="PRODUCT DISCOUNT" class="form-control input-md" required="" type="text" value="<?php echo $product->discount ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="quantity">QUANTITY</label>
            <div class="col-md-4">
            <input id="quantity" name="product[quantity]" placeholder="PRODUCT QUANTITY" class="form-control input-md" required="" type="number" value="<?php echo $product->quantity ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="description">DESCRIPTION</label>
            <div class="col-md-4">
            <textarea id="description" name="product[description]" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required="" cols="50" rows="10" value="<?php echo $product->description ?>"><?php echo $product->description ?></textarea>
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="status">STATUS</label>
            <div class="col-md-4">
            <select name="product[status]">
            <?php
                foreach ($model_product->getStatusOptions() as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($product->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div>
        </div><br>
        <div class="form-group col-md-12 text-center">
        <input type="submit" name="save">
        </div>
       