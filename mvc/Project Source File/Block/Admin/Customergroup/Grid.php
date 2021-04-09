<?php
namespace Block\Admin\Customergroup;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $customergroups = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/customergroup/grid.php');

    }
    public function setCustomergroups($customergroups = null)
    {
        if (!$customergroups) { 

            $customergroups = \Mage::getCustomer('Model\Admin\Customergroup');
            $customergroups = $customergroups->fetchAll();
        }

        $this->customergroups = $customergroups;
        return $this;

    }
    public function getCustomergroups()
    {
        if (!$this->customergroups) {
            $this->setCustomergroups();
        }

        return $this->customergroups;
    }

}