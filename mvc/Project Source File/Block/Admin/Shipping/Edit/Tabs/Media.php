<?php
namespace Block\Admin\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Media extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/admin/shipping/edit/tabs/media.php');
    }
    
}





?>