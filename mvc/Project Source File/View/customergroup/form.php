<?php
require_once './View/template/header.php';

$groupId=$this->getRequest()->getGet('groupId');
?>

<form method="POST" action="<?php echo $this->getUrl()->getUrl('save', 'Customergroup') ?>">

<fieldset>
        <legend>
        <?php 
        if (!$groupId) {?>
        <p class="title">Create Customer Group</p>
        <?php } else {?>
        <p class="title">Edit Customer Group</p>
        <?php }?>
        </legend>
        <?php echo $this->getTabContent();?>
        <?php ?>
 
        
 </fieldset>

</form>