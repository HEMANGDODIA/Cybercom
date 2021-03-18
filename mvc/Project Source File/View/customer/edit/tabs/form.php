<?php
require_once './View/template/header.php';

$customer = $this->getCustomer();
$model_customer = \Mage::getCustomer('Model\Customer');

?>

<div class="form-group row">
            <label class="col-md-4 control-label text-center" for="firstname">FIRST NAME</label>
            <div class="col-md-4">
            <input id="firstname" name="customer[firstname]" placeholder="CUSTOMER FIRSTNAME" class="form-control input-md" required="" type="text" value="<?php echo $customer->firstname ?>">
            </div>
        </div><br>
        
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="lastname">LAST NAME</label>
            <div class="col-md-4">
            <input id="lastname" name="customer[lastname]" placeholder="CUSTOMER LASTNAME" class="form-control input-md" required="" type="text" value="<?php echo $customer->lastname ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="email">EMAIL</label>
            <div class="col-md-4">
            <input id="email" name="customer[email]" placeholder="CUSTOMER EMAIL" class="form-control input-md" required="" type="email" value="<?php echo $customer->email ?>">
            </div>
        </div><br>

        <div class="form-group row ">
            <label class="col-md-4 control-label text-center" for="password">PASSWORD</label>
            <div class="col-md-4">
            <input id="password" name="customer[password]" placeholder="CUSTOMER PASSWORD" class="form-control input-md" required="" type="password" value="<?php echo $customer->password ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="status">STATUS</label>
            <div class="col-md-4">
            <select name="customer[status]">
            <?php
                foreach ($model_customer->getStatusOptions() as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($customer->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div>
        </div><br>
        <div class="form-group col-md-12 text-center">
        <input type="submit" name="save">
        </div>
