<?php
require_once './View/template/header.php';

$shipping = $this->getShipping();

?>

<form method="POST" action="<?php echo $this->getUrl()->getUrl('save', 'Shipping') ?>">

<fieldset>
        <legend>
        <?php 
        if (!$shipping->methodId):?>
        <p class="title">Create Shipping</p>
        <?php else:?>
        <p class="title">Edit Shipping</p>
        <?php endif;?>
        </legend>
        
        <?php echo $this->getTabContent();?>
        <?php $this->getDefaultTab(); ?>
 
 </fieldset>

</form>