<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use  Block\Core\Template as Template;
class Category extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/admin/product/edit/tabs/category.php');
    }
    
}





?>