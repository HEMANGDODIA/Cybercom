<?php
namespace Block\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Form extends Template
{
    public $customer = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/customer/edit/tabs/form.php');

    }
    public function setCustomer($customer = null)
    {

        if ($customer) {
            $this->customer=$customer;
            return $this;
        }
            $customer = \Mage::getCustomer('Model\Customer');
             if ($id = $this->getController()->getRequest()->getGet('customerId')) {
                $customer = $customer->load($id);

             }

            $this->customer = $customer;
            return $this;
        

        

    }
    public function getCustomer()
    {
        if (!$this->customer) {
            $this->setCustomer();
        }
        return $this->customer;
    }


    
}





?>