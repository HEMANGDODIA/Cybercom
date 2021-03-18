<?php
Mage::loadFileByClassName('Block_Core_Template');
class Block_Payment_Edit_Tabs_Media extends Block_Core_Template
{
    public function __construct()
    {
        $this->setTemplate('View/payment/edit/tabs/media.php');
    }
    
}





?>