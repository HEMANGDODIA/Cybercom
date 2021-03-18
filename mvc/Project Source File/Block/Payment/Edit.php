<?php
namespace Block\Payment;
\Mage::loadFileByClassName('Block\Core\Template');
use  Block\Core\Template as Template;
class Edit extends Template
{
    public $payment = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function getTabContent(){
        $tabBlock=\Mage::getBlock('Block\Payment\Edit\Tabs');
        $tabs=$tabBlock->getTabs();

        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClasssName=$tabs[$tab]['block'];
        $block=\Mage::getBlock($blockClasssName);
        echo $block->toHtml();

    }
    public function setPayment($payment = null)
    {

        if ($payment) {
            $this->payment=$payment;
            return $this;
        }
            $payment = \Mage::getPayment('Model\Payment');
             if ($id = $this->getController()->getRequest()->getGet('methodId')) {
                $payment = $payment->load($id);

             }

            $this->payment = $payment;
            return $this;
        

        

    }
    public function getPayment()
    {
        if (!$this->payment) {
            $this->setPayment();
        }
        return $this->payment;
    }

}