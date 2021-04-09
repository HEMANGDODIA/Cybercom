<?php

namespace Model\Admin\Cart;

use Model\Core\Table;

class Address extends Table
{
    public function __construct()
    {
        $this->setPrimaryKey("cart_addressId");
        $this->setTableName("cart_address");
    }
}