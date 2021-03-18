<?php
namespace Block\Product;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Edit extends Template
{
    public $product = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function getTabContent(){
        $tabBlock=\Mage::getBlock('Block\Product\Edit\Tabs');
        $tabs=$tabBlock->getTabs();

        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClasssName=$tabs[$tab]['block'];
        $block=\Mage::getBlock($blockClasssName);
        echo $block->toHtml();

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