<?php
namespace Block\Customer\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/customer/edit/tabs.php');
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('customer',['label'=>'Customer Information','block'=>'Block\Customer\Edit\Tabs\Form']);
        $this->addTab('Addresses',['label'=>'Addresses','block'=>'Block\Customer\Edit\Tabs\Addresses']);
        $this->setDefaultTab('customer');
        return $this;
    }
    
}



?>