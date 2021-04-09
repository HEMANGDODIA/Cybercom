<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Address extends Template
{
    public $billingAddress = null;
    public $shippingAddress = null;
    public function __construct()
    {
        $this->setTemplate('View/admin/customer/edit/tabs/address.php');
    }
    public function setBillingAddress()
    {

        $this->billingAddress = \Mage::getModel('Model\Admin\Customer\Address');
        $id = (int) $this->getRequest()->getGet('customerId');
        $billing = "SELECT * FROM `customer_address` WHERE  `customerId`= '{$id}' AND `addressType`= 'Billing';";
        $this->billingData = $this->billingAddress->fetchRow($billing);

        if (!$this->billingData) {
            return $this->billingAddress;
        }
        $this->billingAddress = $this->billingData; 
        // print_r($this->billingAddress);

        return $this;

    }
    public function getBillingAddress()
    {
        if (!$this->billingAddress) {
            $this->setBillingAddress();
        }

        return $this->billingAddress;
    }

    public function setShippingAddress($shippingaddress = null)
    {

        $this->shippingAddress = \Mage::getModel('Model\Admin\Customer\Address');
        $id = (int) $this->getRequest()->getGet('customerId');
        $shipping = "SELECT * FROM `customer_address` WHERE  `customerId`= '{$id}' AND `addressType`= 'Shipping';";
        $this->shippingData = $this->shippingAddress->fetchRow($shipping);
        if (!$this->shippingData) {
            return $this->shippingAddress;
        }
        $this->shippingAddress = $this->shippingData;
        return $this;

    }
    public function getShippingAddress()
    {
        if (!$this->shippingAddress) {
            $this->setShippingAddress();
        }
        return $this->shippingAddress;
    }
    
}




?>