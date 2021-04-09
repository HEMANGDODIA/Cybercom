<?php

$cmsPage = $this->getTableRow();


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
                        <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'cmspage', [], true) ?>').resetParams().load(); "
                             > Go Back</a>

                    </div>
                </div><br>
            <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="title">TITLE</label>
            <div class="col-md-4">
            <input id="title" name="cmsPage[title]" placeholder="TITLE" class="form-control input-md" required="" type="text" value="<?php echo $cmsPage->title ?>">
         
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="identifier">IDENTIFIER</label>
            <div class="col-md-4">
            <input id="identifier" name="cmsPage[identifier]" placeholder="IDENTIFIER" class="form-control input-md" required="" type="text" value="<?php echo $cmsPage->identifier ?>">
         
            </div>
        </div><br>

            <div class="form-group row">
                <label class="col-md-4 control-label text-center" for="content">CONTENT</label>
                <div class="col-md-4">
                <textarea id="content" name="cmsPage[content]" placeholder="CONTENT" class="form-control input-md" required="" rows="10" cols="50" value="<?php echo $cmsPage->content ?>"><?php echo $cmsPage->content ?></textarea>
                </div>
            </div><br>
        

        
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="status">STATUS</label>
            <div class="col-md-4">
            <select name="cmsPage[status]">
            <?php
                foreach ($cmsPage->getStatusOptions() as $key => $value):?>
                <option value="<?php echo $key ?>" <?php if ($cmsPage->status == $key):?> selected <?php endif;?>>
                    <?php echo $value ?></option>
                    <?php endforeach; ?>
            </select>
            </div>
        </div><br>



        
        <div class="row">
                <div class="col">
                    <input onclick="object.resetParams().setForm('#cmspageForm').load();" type="button" name="send" class="btn btn-success" value="Update" />
                </div>
            </div>
        
