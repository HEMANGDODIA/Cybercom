<?php

namespace Controller\Admin\Customer;
\Mage::loadFileByClassName('Controller\Core\Admin');
use Controller\Core\Admin as Admin;

class Address extends Admin
{
    public function saveAction()
    {
    try {
        echo 111;
        $billing = \Mage::getModel('Model\Admin\Customer\Address');
        $shipping = \Mage::getModel('Model\Admin\Customer\Address');
        if ($id = $this->getRequest()->getGet('customerId')) {
            $billingData = "SELECT * FROM `customer_address` WHERE  `customerId`= '{$id}' AND `addressType`= 'Billing';";
            
            if (!$billing->fetchRow($billingData)) {
                $billing->addressType = 'Billing';
                $billing->customerId = $id;
                $billing_data = $this->getRequest()->getPost('billing');
                $billing->setData($billing_data);
                // print_r($billing);
                // die();
                $billing->save();
            } else {
                $billing_data = $this->getRequest()->getPost('billing');
                $billing->setData($billing_data);
                $billing->save();
            }
            $shippingData = "SELECT * FROM `customer_address` WHERE  `customerId`= '{$id}' AND `addressType`= 'Shipping';";
            if (!$shipping->fetchRow($shippingData)) {
                $shipping->customerId = $id;
                $shipping->addressType = 'Shipping';
                $shipping_data = $this->getRequest()->getPost('shipping');
                $shipping->setData($shipping_data);
                $shipping->save();

            } else {
                $shipping_data = $this->getRequest()->getPost('shipping');
                $shipping->setData($shipping_data);
                $shipping->save();
            }


        }

    }
 
    catch (\Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
        // die();
    }
    $this->redirect('grid','Customer');
    
}
}

?>
