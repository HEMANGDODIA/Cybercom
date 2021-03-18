<?php
require_once './View/template/header.php';

$admin = $this->getAdmin();
$model_admin = \Mage::getAdmin('Model\Admin');
?>



<div class="form-group row">
            <label class="col-md-4 control-label text-center" for="username">USERNAME</label>
            <div class="col-md-4">
            <input id="username" name="admin[username]" placeholder="ADMIN USERNAME" class="form-control input-md" required="" type="text" value="<?php echo $admin->username ?>">
            </div>
        </div><br>

        <div class="form-group row ">
            <label class="col-md-4 control-label text-center" for="password">PASSWORD</label>
            <div class="col-md-4">
            <input id="password" name="admin[password]" placeholder="ADMIN PASSWORD" class="form-control input-md" required="" type="password" value="<?php echo $admin->password ?>">
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="status">STATUS</label>
            <div class="col-md-4">
            <select name="admin[status]">
            <?php
                foreach ($model_admin->getStatusOptions() as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($admin->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                    <?php } ?>
            </select>
            </div>
        </div><br>
        <div class="form-group col-md-12 text-center">
        <input type="submit" name="save">
        </div>
