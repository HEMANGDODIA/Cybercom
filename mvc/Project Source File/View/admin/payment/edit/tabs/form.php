<?php

$payment = $this->getTableRow();
// $tabs=$this->getTabs();

?>
            <!-- <a class="btn btn-primary" href="<?php //echo $this->getUrl()->getUrl(null,null,['tab' =>$key]); ?>"><?php echo $tab['label'] ?></a><br><br> -->
            <div class="form-group row">
            <fieldset>
                        <legend>
                            <?php echo $this->getTitle(); ?>
                        </legend>
                </fieldset>
            </div>
            <div class="row">
                   
                   <div class="col-sm-2">
                       <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'payment', [], true) ?>').resetParams().load(); "
                            > Go Back</a>

                   </div>
               </div><br>
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
                foreach ($payment->getStatusOptions() as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($payment->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div>
        </div><br>
    
    <div class="row">
                <div class="col">
                    <input onclick="object.resetParams().setForm('#paymentForm').load();" type="button" name="send" class="btn btn-success" value="Update" />
                </div>
            </div>