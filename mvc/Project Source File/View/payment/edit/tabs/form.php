<?php
require_once './View/template/header.php';

$payment = $this->getPayment();
$model_payment = \Mage::getPayment('Model\Payment');
?>
        
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="name">NAME</label>
            <div class="col-md-4">
            <input id="name" name="payment[name]" placeholder="NAME" class="form-control input-md" required="" type="text" value="<?php echo $payment->name ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="code">CODE</label>
            <div class="col-md-4">
            <input id="code" name="payment[code]" placeholder="PAYMENT CODE" class="form-control input-md" required="" type="text" value="<?php echo $payment->code ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="description">DESCRIPTION</label>
            <div class="col-md-4">
            <textarea id="description" name="payment[description]" placeholder="PAYMENT DESCRIPTION" class="form-control input-md" required="" cols="50" rows="10" value="<?php echo $payment->description ?>"><?php echo $payment->description ?></textarea>
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="status">STATUS</label>
            <div class="col-md-4">
            <select name="payment[status]">
            <?php
                foreach ($model_payment->getStatusOptions() as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($payment->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div>
        </div><br>
        <div class="form-group col-md-12 text-center">
        <input type="submit" name="save">
        </div>
