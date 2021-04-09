
<?php

$customergroup = $this->getTableRow();
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
                       <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'customergroup', [], true) ?>').resetParams().load(); "
                            > Go Back</a>

                   </div>
               </div><br>

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
                foreach ($customergroup->getStatusOptions() as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($customergroup->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div>
        </div><br>
        <div class="row">
                <div class="col">
                    <input onclick="object.resetParams().setForm('#customergroupForm').load();" type="button" name="send" class="btn btn-success" value="Update" />
                </div>
            </div>
        