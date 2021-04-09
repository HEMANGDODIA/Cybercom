
<?php

$product = $this->getTableRow();

?>
        <div class="row">
                   
                   <div class="col-sm-1">
                       <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Product', [], true) ?>').resetParams().load(); "
                            > Go Back</a>

                   </div>
         </div>
        <div class="form-group row">
    `           <fieldset>
                        <legend>
                            <?php echo $this->getTitle(); ?>
                        </legend>
                </fieldset>
        </div>
        
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
                foreach ($product->getStatusOptions() as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($product->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div><br>
        
        <div class="row">
                <div class="col">
                    <input onclick="object.resetParams().setForm('#productForm').load();" type="button" name="send" class="btn btn-success" value="Update" />
                </div>
            </div>
        
       