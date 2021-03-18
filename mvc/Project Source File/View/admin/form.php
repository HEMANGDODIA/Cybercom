<?php
require_once './View/template/header.php';

$admin = $this->getAdmin();
$model_admin = \Mage::getAdmin('Model\Admin');
?>

<form method="POST" action="<?php echo $this->getUrl()->getUrl('save', 'Admin') ?>">

<fieldset>
        <legend>
        <?php 
        if (!$admin->adminId) {?>
        <p class="title">Create Admin</p>
        <?php } else {?>
        <p class="title">Edit Admin</p>
        <?php }?>
        </legend>
         
        <?php echo $this->getTabContent();?>
        
        
 </fieldset>

</form>