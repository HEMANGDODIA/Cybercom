<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Media extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/admin/category/edit/tabs/media.php');
    }
    
}





?>