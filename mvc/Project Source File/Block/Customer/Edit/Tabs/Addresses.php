<?php
namespace Block\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Addresses extends Template
{
    public $billingAddress = null;
    public $shippingAddress = null;
    public function __construct()
    {
        $this->setTemplate('View/customer/edit/tabs/addresses.php');
    }
    public function setBillingAddress()
    {

        $this->billingAddress = \Mage::getModel('Model\CustomerAddress');
        $id = (int) $this->getRequest()->getGet('customerId');
        $billing = "SELECT * FROM `customer_address` WHERE  `customerId`= '{$id}' AND `addressType`= 'Billing';";
        $this->billingData = $this->billingAddress->fetchRow($billing);
        if (!$this->billingData) {
            return $this->billingAddress;
        }
        $this->billingAddress = $this->billingData;
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

        $this->shippingAddress = \Mage::getModel('Model\CustomerAddress');
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