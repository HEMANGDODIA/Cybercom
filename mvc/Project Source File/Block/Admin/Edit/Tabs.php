<?php
namespace Block\Admin\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/edit/tabs.php');
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('admin',['label'=>'Admin Information','block'=>'Block\Admin\Edit\Tabs\Form']);
        $this->setDefaultTab('admin');
        return $this;
    }
    
}



?>