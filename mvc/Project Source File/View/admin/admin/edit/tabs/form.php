<?php
$admin = $this->getTableRow();
?>
<div class="container">
        <div class="form-group row">
            <fieldset>
                    <legend>
                        <?php echo $this->getTitle(); ?>
                    </legend>
            </fieldset> 
        </div>
        <div class="row">
                   
                    <div class="col-sm-2">
                        <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'admin', [], true) ?>').resetParams().load(); "
                             > Go Back</a>

                    </div>
                </div><br>
        
                <div class="form-group row">
                            <label class="col-md-4 control-label text-center" for="username">UserName</label>
                            <div class="col-md-4">
                            <input id="name" name="admin[username]" placeholder="NAME" class="form-control input-md" required="" type="text" value="<?php echo $admin->username ?>">
                            </div>
                </div><br>

                <div class="form-group row">
                            <label class="col-md-4 control-label text-center" for="password">Password</label>
                            <div class="col-md-4">
                            <input id="password" name="admin[password]" placeholder="Password" class="form-control input-md" required="" type="password" value="<?php echo $admin->password ?>">
                            </div>
                </div><br>




        <div class="form-group row">
                <label class="col-md-4 control-label text-center" for="status">STATUS</label>
                <div class="col-md-4">
                        <select name="admin[status]" id="status" required>
                            <?php
                            foreach ($admin->getStatusOptions() as $key => $value) {
                            ?>
                                <option value="<?php echo $key ?>" <?php if ($key == $admin->status) echo ' selected="selected"'; ?>><?php echo $value ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <input onclick="object.resetParams().setForm('#adminForm').load();" type="button" name="send" class="btn btn-success" value="Update" />
                </div>
            </div>
        </div>

    </div>
</div>