<?php
$attribute = $this->getTableRow();
print_r($attribute->backendType);
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
                        <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'attribute', [], true) ?>').resetParams().load(); "
                             > Go Back</a>

                    </div>
                </div><br>

                <div class="form-group row">
                            <label class="col-md-4 control-label text-center" for="entityType">Entity Type</label>
                            <div class="col-md-4">
                            <select id="entityType" name="attribute[entityTypeId]"  class="form-control ">
                            <option value="----" selected disabled></option>
                                <?php foreach ($attribute->getEntityTypes() as $key => $value): ?>

                                <option value="<?php echo $key ?>" <?php if ($key == $attribute->entityTypeId): ?> selected <?php endif;?>>
                                    <?php echo $value ?>
                                </option>

                                <?php endforeach?>
                            </select>
                            </div>
                </div><br>


                <div class="form-group row">
                            <label class="col-md-4 control-label text-center" for="name">Name</label>
                            <div class="col-md-4">
                            <input id="name" name="attribute[name]" placeholder="NAME" class="form-control input-md" required="" type="text" value="<?php echo $attribute->name ?>">
                            </div>
                </div><br>
                <div class="form-group row">
                            <label class="col-md-4 control-label text-center" for="code">Code</label>
                            <div class="col-md-4">
                            <input id="code" name="attribute[code]" placeholder="Code" class="form-control input-md" required="" type="text" value="<?php echo $attribute->code ?>">
                            </div>
                </div><br>

                <div class="form-group row">
                            <label class="col-md-4 control-label text-center" for="inputType">InputType</label>
                            <div class="col-md-4">
                            <select id="inputType" name="attribute[inputType]"  class="form-control input-md" >
                            <option value="----" selected disabled></option>

                                <?php foreach ($attribute->getInputTypes() as $key => $value): ?>

                                <option value="<?php echo $key ?>" <?php if ($key == $attribute->inputType): ?> selected <?php endif;?>>
                                    <?php echo $value ?>
                                </option>

                                <?php endforeach?>
                            </select>
                            </div>
                </div><br>

                <div class="form-group row">
                            <label class="col-md-4 control-label text-center" for="backendType">BackendType</label>
                            <div class="col-md-4">
                            <select id="backendType" name="attribute[backendType]" class="form-control input-md">
                            <option value="---" selected disabled></option>
                                <?php foreach ($attribute->getBackendTypes() as $key => $value): ?>

                                <option value="<?php echo $key ?>" <?php if ($key == $attribute->backendType): ?> selected <?php endif;?>>
                                    <?php echo $value ?>
                                </option>

                                <?php endforeach?>
                            </select>
                            </div>
                </div><br>

                <div class="form-group row">
                            <label class="col-md-4 control-label text-center" for="sortOrder">SortOrder</label>
                            <div class="col-md-4">
                            <input id="sortOrder" name="attribute[sortOrder]" placeholder="SortOrder" class="form-control input-md" required="" type="text" value="<?php echo $attribute->sortOrder ?>">
                            </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <input class="btn btn-success" type="button" value="Submit"
                        onclick="object.resetParams().setForm('#attributeForm').load();">
                    </div>
                </div>