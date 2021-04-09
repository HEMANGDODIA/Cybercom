<?php
namespace Block\Admin\Config;
\Mage::getBlock('Block\Core\Template');


class Grid extends \Block\Core\Template
{
    protected $configGroup=null;
    public function __construct() {
        parent::__construct();
        $this->setTemplate('View/admin/config/grid.php');
    }
    public function setConfigGroup($configGroup = null)
   {
       if (!$configGroup) {
           $configGroup = \Mage::getModel('Model\Admin\ConfigGroup');
       }
       $this->configGroup = $configGroup->fetchAll();
       return $this;
   }
   public function getConfigGroup()
   {
       if (!$this->configGroup) {
           $this->setConfigGroup();
       }
       return $this->configGroup;
   }
}



?>