<?php
$shipping = $this->getTableRow();
?>
        <div class="form-group row">
                <fieldset>
                        <legend>
                            <?php echo $this->getTitle(); ?>
                        </legend>
                </fieldset>
        </div>
        <div class="row">
                   
                   <div class="col-sm-2">
                       <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'shipping', [], true) ?>').resetParams().load(); "
                            > Go Back</a>

                   </div>
               </div><br>
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="name">NAME</label>
            <div class="col-md-4">
            <input id="name" name="shipping[name]" placeholder="NAME" class="form-control input-md" required="" type="text" value="<?php echo $shipping->name ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="amount">AMOUNT</label>
            <div class="col-md-4">
            <input id="amount" name="shipping[amount]" placeholder="AMOUNT" class="form-control input-md" required="" type="text" value="<?php echo $shipping->amount ?>">
            </div>
        </div><br> 


        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="code">CODE</label>
            <div class="col-md-4">
            <input id="code" name="shipping[code]" placeholder="SHIPPING CODE" class="form-control input-md" required="" type="text" value="<?php echo $shipping->code ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="description">DESCRIPTION</label>
            <div class="col-md-4">
            <textarea id="description" name="shipping[description]" placeholder="SHIPPING DESCRIPTION" class="form-control input-md" required="" cols="50" rows="10" value="<?php echo $shipping->description ?>"><?php echo $shipping->description ?></textarea>
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="status">STATUS</label>
            <div class="col-md-4">
            <select name="shipping[status]">
            <?php
                foreach ($shipping->getStatusOptions() as $key => $value):?>
                <option value="<?php echo $key ?>" <?php if ($shipping->status == $key):?> selected <?php endif;?>>
                    <?php echo $value ?></option>
                    <?php endforeach; ?>
            </select>
            </div>
        </div><br>
        <div class="row">
                <div class="col">
                    <input onclick="object.resetParams().setForm('#shippingForm').load();" type="button" name="send" class="btn btn-success" value="Update" />
                </div>
        </div>