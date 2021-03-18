<?php
require_once './View/template/header.php';

$category = $this->getCategory();
// $tree=$this->categories();
$categoryOptions=$this->getCategoryOptions();

$model_category =\Mage::getCategory('Model\Category');

?>

           <div class="form-group row">
                        <label class="col-md-4 control-label text-center" for="parentId">PARENT ID</label>
                        <div class="col-md-4">
                        <select name="category[parentId]">
                        <?php if ($categoryOptions): ?>
                        <?php foreach ($categoryOptions as $categoryId => $name): ?>
                        <option value="<?php echo $categoryId; ?>" <?php if ($categoryId == $category->parentId): ?>selected <?php endif;?>>
                            <?php echo $name; ?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                        </select>
                        </div>
            </div><br>

            <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="name">CATEGORY NAME</label>
            <div class="col-md-4">
            <input id="name" name="category[name]" placeholder="CATEGORY NAME" class="form-control input-md" required="" type="text" value="<?php echo $category->name ?>">
         
            </div>
        </div><br>

            <div class="form-group row">
                <label class="col-md-4 control-label text-center" for="description">DISCRIPTION</label>
                <div class="col-md-4">
                <textarea id="description" name="category[description]" placeholder="DISCRIPTION" class="form-control input-md" required="" rows="10" cols="50" value="<?php echo $category->description ?>"><?php echo $category->description ?></textarea>
                </div>
            </div><br>
        
        
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="status">STATUS</label>
            <div class="col-md-4">
            <select name="category[status]">
            <?php
                foreach ($model_category->getStatusOptions() as $key => $value):?>
                <option value="<?php echo $key ?>" <?php if ($category->status == $key):?> selected <?php endif;?>>
                    <?php echo $value ?></option>
                    <?php endforeach; ?>
            </select>
            </div>
        </div><br>



        
        
        <div class="form-group col-md-12 text-center">
        <input type="submit" name="save">
        </div>
