<?php
namespace Block\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Form extends Template
{
    public $product = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/product/edit/tabs/form.php');

    }
    public function setProduct($product = null)
    {

        if ($product) {
            $this->product=$product;
            return $this;
        }
            $product = \Mage::getProduct('Model\Product');
             if ($id = $this->getController()->getRequest()->getGet('productId')) {
                $product = $product->load($id);

             }

            $this->product = $product;
            return $this;
        

        

    }
    public function getProduct()
    {
        if (!$this->product) {
            $this->setProduct();
        }
        return $this->product;
    }

    
}





?>