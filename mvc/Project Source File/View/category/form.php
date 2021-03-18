<?php
require_once './View/template/header.php';

$category = $this->getCategory();
$model_category = \Mage::getCategory('Model\Category');

?>

<form method="post" action="<?php echo $this->getUrl()->getUrl('save','category'); ?>">

<fieldset>
        <legend>
        <?php 
        if (!$category->categoryId) {?>
        <p class="title">Create Category</p>
        <?php } else {?> 
        <p class="title">Edit Category</p>
        <?php }?>
        
        </legend>
        <?php echo $this->getTabContent();?>

        
 </fieldset>

</form>