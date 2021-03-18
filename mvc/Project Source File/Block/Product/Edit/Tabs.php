<?php
namespace Block\Product\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/product/edit/tabs.php');
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('product',['label'=>'Product Information','block'=>'Block\Product\Edit\Tabs\Form']); 
        $this->addTab('Media',['label'=>'Media','block'=>'Block\Product\Edit\Tabs\Media']);
        $this->addTab('Category',['label'=>'Category','block'=>'Block\Product\Edit\Tabs\Category']);
      
        return $this;
    }
    
}



?>