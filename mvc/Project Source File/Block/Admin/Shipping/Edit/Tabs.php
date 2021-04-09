<?php
namespace Block\Admin\Shipping\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
use Block\Core\Edit\Tabs as coreTabs;
class Tabs extends coreTabs
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('shipping',['label'=>'Shipping Information','block'=>'Block\Admin\Shipping\Edit\Tabs\Form']);
        $this->addTab('Media',['label'=>'Media','block'=>'Block\Admin\Shipping\Edit\Tabs\Media']);
        $this->setDefaultTab('shipping');
        return $this;
    }
    
}



?>