<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
use Model\Core\Table as Table;
class CustomerAddress extends Table
{

    public function __construct()
    {

        $this->setPrimaryKey("id");
        $this->setTableName("customer_address");
    }

}