<?php

namespace Model\Admin\Order;

use Model\Core\Table;

class Address extends Table
{
    public function __construct()
    {
        $this->setPrimaryKey("orderAddressId");
        $this->setTableName("order_address");
    }
}