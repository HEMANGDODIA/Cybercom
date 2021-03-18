<?php
namespace Block\Customer;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $customers = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function setCustomers($customers = null)
    {
        if (!$customers) { 

            $customers = \Mage::getCustomer('Model\Customer');
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