<?php
namespace Block\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Media extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/shipping/edit/tabs/media.php');
    }
    
}





?>