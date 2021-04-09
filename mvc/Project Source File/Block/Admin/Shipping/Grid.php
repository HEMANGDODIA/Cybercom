<?php
namespace Block\Admin\Shipping;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $shippings = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/shipping/grid.php');

    }
    public function setShippings($shippings = null)
    {
        if (!$shippings) {

            $shippings = \Mage::getShipping('Model\Admin\Shipping');
            $shippings = $shippings->fetchAll();
        }

        $this->shippings = $shippings;
        return $this;

    }
    public function getShippings()
    {
        if (!$this->shippings) {
            $this->setShippings();
        }

        return $this->shippings;
    }

}