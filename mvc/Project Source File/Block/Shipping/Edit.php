<?php
namespace Block\Shipping;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Edit extends Template
{
    public $shipping = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function getTabContent(){
        $tabBlock=\Mage::getBlock('Block\Shipping\Edit\Tabs');
        $tabs=$tabBlock->getTabs();

        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClasssName=$tabs[$tab]['block'];
        $block=\Mage::getBlock($blockClasssName);
        echo $block->toHtml();

    }
    public function setShipping($shipping = null)
    {

        if ($shipping) {
            $this->shipping=$shipping;
            return $this;
        }
            $shipping = \Mage::getShipping('Model\Shipping');
             if ($id = $this->getController()->getRequest()->getGet('methodId')) {
                $shipping = $shipping->load($id);

             }

            $this->shipping = $shipping;
            return $this;
        

        

    }
    public function getShipping()
    {
        if (!$this->shipping) {
            $this->setShipping();
        }
        return $this->shipping;
    }

}