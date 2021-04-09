<?php

$config = $this->getTableRow();
// print_r($config);

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
                       <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'config', [], true) ?>').resetParams().load(); "
                            > Go Back</a>

                   </div>
               </div><br>

            <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="name">NAME</label>
            <div class="col-md-4">
            <input id="name" name="config[name]" placeholder="NAME" class="form-control input-md" required="" type="text" value="<?php echo $config->name ?>">
         
            </div>
        </div><br>

    
        
        <div class="row">
                <div class="col">
                    <input onclick="object.resetParams().setForm('#configGroupFrom').load();" type="button" name="send" class="btn btn-success" value="Update" />
                </div>
            </div>
        
