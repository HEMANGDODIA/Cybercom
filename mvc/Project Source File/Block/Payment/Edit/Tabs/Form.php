<?php
namespace Block\Payment\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Form extends Template
{
    public $payment = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/payment/edit/tabs/form.php');

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





?>