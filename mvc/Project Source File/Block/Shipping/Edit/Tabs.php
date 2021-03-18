<?php
namespace Block\Shipping\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/shipping/edit/tabs.php');
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('shipping',['label'=>'Shipping Information','block'=>'Block\Shipping\Edit\Tabs\Form']);
        $this->addTab('Media',['label'=>'Media','block'=>'Block\Shipping\Edit\Tabs\Media']);
        $this->setDefaultTab('shipping');
        return $this;
    }
    
}



?>