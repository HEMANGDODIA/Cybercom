<?php
namespace Block\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use  Block\Core\Template as Template;
class Category extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/product/edit/tabs/category.php');
    }
    
}





?>