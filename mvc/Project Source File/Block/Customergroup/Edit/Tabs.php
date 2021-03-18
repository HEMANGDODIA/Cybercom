<?php
namespace Block\Customergroup\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/customergroup/edit/tabs.php');
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('customergroup', ['label' => 'Customergroup Information', 'block' => 'Block\Customergroup\Edit\Tabs\Form']);
        $this->setDefaultTab('customergroup');
        return $this;
    }
    
}