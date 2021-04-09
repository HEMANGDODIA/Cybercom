<?php
namespace Block\Admin\Order;
\Mage::loadFileByClassName('Block\Core\Template');

use Block\Core\Template as Template;
class Grid extends Template
{
    public $order = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/order/grid.php');

    }
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }
    public function getOrder()
    {
        return $this->order;
    }
}