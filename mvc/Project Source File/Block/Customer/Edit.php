<?php
namespace Block\Customer;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Edit extends Template
{
    public $customer = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function getTabContent(){
        $tabBlock=\Mage::getBlock('Block\Customer\Edit\Tabs');
        $tabs=$tabBlock->getTabs();

        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClasssName=$tabs[$tab]['block'];
        $block=\Mage::getBlock($blockClasssName);
        echo $block->toHtml();

    }
    public function setCustomer($customer = null)
    {

        if ($customer) {
            $this->customer=$customer;
            return $this;
        }
            $customer = \Mage::getCustomer('Model\Customer');
             if ($id = $this->getController()->getRequest()->getGet('customerId')) {
                $customer = $customer->load($id);

             }

            $this->customer = $customer;
            return $this;
        

        

    }
    public function getCustomer()
    {
        if (!$this->customer) {
            $this->setCustomer();
        }
        return $this->customer;
    }

}