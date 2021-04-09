<?php

$customer = $this->getTableRow();
$customerGroup = $this->getCustomerGroup();

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
                        <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'customer', [], true) ?>').resetParams().load(); "
                             > Go Back</a>

                    </div>
         </div><br>
<div class="form-group row">
<label class="col-md-4 control-label text-center" >CUSTOMER GROUP</label>

    <div class="col-md-4">
    <select id="status"  name="customer[groupId]">
        <option value="---" disabled selected></option>
        <?php foreach ($customerGroup->getData() as $key => $customerGroup): ?>

        <option value="<?php echo $customerGroup->groupId ?>" <?php if ($customer->groupId == $customerGroup->groupId): ?>
            selected <?php endif;?>>
            <?php echo $customerGroup->name ?></option>
        <?php endforeach?>
    </select>
    </div>
</div><br>


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
                foreach ($customer->getStatusOptions()  as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($customer->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div>
        </div><br>
        <div class="row">
                <div class="col">
                    <input onclick="object.resetParams().setForm('#customerForm').load();" type="button" name="send" class="btn btn-success" value="Update" />
                </div>
            </div>
        
     