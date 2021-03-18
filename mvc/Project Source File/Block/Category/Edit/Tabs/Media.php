<?php
namespace Block\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Media extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/category/edit/tabs/media.php');
    }
    
}





?>