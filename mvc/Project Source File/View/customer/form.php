<?php
require_once './View/template/header.php';

$customer = $this->getCustomer();
$customerId=$this->getRequest()->getGet('customerId');
$model_customer = \Mage::getCustomer('Model\Customer');
?>

<form method="POST" action="<?php echo $this->getUrl()->getUrl('save', 'Customer') ?>">

<fieldset>
        <legend>
        <?php 
        if (!$customerId) {?>
        <p class="title">Create Customer</p>
        <?php } else {?>
        <p class="title">Edit Customer</p>
        <?php }?>
        </legend>
        <?php echo $this->getTabContent();?>
        <?php ?>
 
        
 </fieldset>

</form>