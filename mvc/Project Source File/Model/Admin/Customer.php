<?php
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Core\Table');
use Model\Core\Table as Table;
class Customer extends Table
{
    const STATUS_DEFAULT = null;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {

        $this->setPrimaryKey("customerId");
        $this->setTableName("customer");
    }
    public function getStatusOptions()
    {
        return [

            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_DEFAULT => '---',

        ];
    }
    public function getBillingAddress()
    {
        $query = "SELECT * FROM `customer_address` WHERE `addressType`='billing' AND `customerId`='{$this->customerId}'";
        $address = \Mage::getModel('Model\Admin\Customer\Address')->fetchRow($query);
        if(!$address){
            return \Mage::getModel('Model\Admin\Customer\Address');
        }
        return $address;
    }
    public function getShippingAddress()
    {
        $query = "SELECT * FROM `customer_address` WHERE `addressType`='shipping' AND `customerId`='{$this->customerId}'";
        $address = \Mage::getModel('Model\Admin\Customer\Address')->fetchRow($query);
        if(!$address){
            return \Mage::getModel('Model\Admin\Customer\Address');
        }
        return $address;
    }
}