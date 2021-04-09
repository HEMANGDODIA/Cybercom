<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $products = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/product/grid.php');

    }
    public function setProducts($products = null)
    {
        if (!$products) {

            $products = \Mage::getProduct('Model\Admin\Product');
            $products = $products->fetchAll();
            
        }

        $this->products = $products;
        return $this;

    }
    public function getProducts()
    {
        if (!$this->products) {
            $this->setProducts();
        }

        return $this->products;
    }

}