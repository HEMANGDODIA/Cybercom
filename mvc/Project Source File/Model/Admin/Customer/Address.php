<?php
namespace Model\Admin\Customer;
\Mage::loadFileByClassName('Model\Core\Table');
use Model\Core\Table as Table;
class Address extends Table
{

    public function __construct()
    {

        $this->setPrimaryKey("id");
        $this->setTableName("customer_address");
    }

}