<?php
require_once './View/template/header.php';

$payment = $this->getPayment();
$model_payment = \Mage::getPayment('Model\Payment');
?>

<form method="POST" action="<?php echo $this->getUrl()->getUrl('save', 'Payment') ?>">

<fieldset>
        <legend>
        <?php 
        if (!$payment->methodId) {?>
        <p class="title">Create Payment</p>
        <?php } else {?>
        <p class="title">Edit Payment</p>
        <?php }?>
        </legend>
        <?php echo $this->getTabContent();?>

        

 </fieldset>

</form>