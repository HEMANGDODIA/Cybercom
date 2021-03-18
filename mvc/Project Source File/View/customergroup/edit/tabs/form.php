
<?php
require_once './View/template/header.php';

$customergroup = $this->getCustomergroup();
$model_customer = \Mage::getCustomer('Model\Customergroup');

?>

<div class="form-group row">
            <label class="col-md-4 control-label text-center" for="name">NAME</label>
            <div class="col-md-4">
            <input id="name" name="customergroup[name]" placeholder="CUSTOMER NAME" class="form-control input-md" required="" type="text" value="<?php echo $customergroup->name ?>">
            </div>
        </div><br>
        
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="status">STATUS</label>
            <div class="col-md-4">
            <select name="customergroup[status]">
            <?php
                foreach ($model_customer->getStatusOptions() as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($customergroup->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div>
        </div><br>
        <div class="form-group col-md-12 text-center">
        <input type="submit" name="save">
        </div>
