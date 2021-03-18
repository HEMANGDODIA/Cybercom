<?php
require_once './View/template/header.php';

$product = $this->getProduct();
$model_product = \Mage::getProduct('Model\Product');
?>

<form method="POST" action="<?php echo $this->getUrl()->getUrl('save', 'Product') ?>" enctype="multipart/form-data">

<fieldset>
        <legend>
        <?php 
        if (!$product->productId) {?>
        <p class="title">Create Product</p>
        <?php } else {?>
        <p class="title">Edit Product</p>
        <?php }?>
        </legend> 
        <?php echo $this->getTabContent(); 
        
        ?>

 </fieldset>

</form>