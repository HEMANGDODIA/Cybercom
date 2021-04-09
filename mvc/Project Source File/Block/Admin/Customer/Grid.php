<?php
namespace Block\Admin\Customer;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $customers = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/customer/grid.php');

    }
    public function setCustomers($customers = null)
    {
        if (!$customers) { 

            $customers = \Mage::getCustomer('Model\Admin\Customer');
            $customers = $customers->fetchAll();
        }

        $this->customers = $customers;
        return $this;

    }
    public function getCustomers()
    {
        if (!$this->customers) {
            $this->setCustomers();
        }

        return $this->customers;
    }

}