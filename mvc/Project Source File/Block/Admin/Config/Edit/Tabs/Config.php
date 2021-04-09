<?php
namespace Block\Admin\Config\Edit\Tabs;

\Mage::loadFileBYClassName('Block\Core\Template');
class Config extends \Block\Core\Template
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/config/edit/tabs/config.php');
    }

}