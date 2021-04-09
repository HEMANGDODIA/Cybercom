<?php

namespace Model\Admin\Order;
\Mage::loadFileByClassName('Model\Core\Table');
class Item extends \Model\Core\Table
{

    public function __construct()
    {
        $this->setPrimaryKey("orderItemId");
        $this->setTableName("order_item");
    }

    public function getProduct()
    {
        if (!$this->orderItemId) {
            return false;
        }

        if (!$this->productId) {
            return false;
        }

        return \Mage::getModel('Model\Admin\Product')->load($this->productId);
    }
}