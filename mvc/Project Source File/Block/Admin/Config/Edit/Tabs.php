<?php
namespace Block\Admin\Config\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/config/edit/tabs.php');
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('ConfigGroup', ['label' => 'Information', 'block' => 'Block\Admin\Config\Edit\Tabs\Form']);
        $this->addTab('config', ['label' => 'Configuration', 'block' => 'Block\Admin\Config\Edit\Tabs\Config']);       
         $this->setDefaultTab('ConfigGroup');
        return $this;
    }

}