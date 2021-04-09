<?php
namespace Block\Admin\Product\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
        $this->setTemplate('View/admin/product/edit/tabs.php');
 
    }
    public function prepareTab(){
        $this->addTab('product',['label'=>'Product Information','block'=>'Block\Admin\Product\Edit\Tabs\Form']); 
        $this->addTab('Media',['label'=>'Media','block'=>'Block\Admin\Product\Edit\Tabs\Media']);
        $this->addTab('groupPrice', ['label' => 'Product Group Price', 'block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);
        $this->setDefaultTab('product');
        return $this;
    }
    
}



?>