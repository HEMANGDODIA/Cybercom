<?php
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Core\Table');
use Model\Core\Table as Table;
class Order extends Table
{
    
    public function __construct()
    {

        $this->setPrimaryKey("orderId");
        $this->setTableName("order");
    }
   
}