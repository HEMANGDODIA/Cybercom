<?php
namespace Block\Payment;
\Mage::loadFileByClassName('Block\Core\Template');

use Block\Core\Template as Template;
class Grid extends Template
{
    public $payments = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function setPayments($payments = null)
    {
        if (!$payments) {

            $payments = \Mage::getPayment('Model\Payment');
            $payments = $payments->fetchAll();
        }

        $this->payments = $payments;
        return $this;

    }
    public function getPayments()
    {
        if (!$this->payments) {
            $this->setPayments();
        }

        return $this->payments;
    }

}