<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Order extends \Controller\Core\Admin
{
    public function gridAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Order\Grid')->setOrder(\Mage::getModel('Model\Admin\order'))->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $gridHtml,
                ],
                [
                    'selector' => '#leftHtml',
                    'html' => null,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    public function saveAction()
    {
        try{
            $session=\Mage::getModel('Model\Admin\Session');
            if($session->customerId){
                $cart=\Mage::getModel('Model\Admin\Cart');
                $query="SELECT * FROM `cart` WHERE `customerId`='{$session->customerId}'";
                $cart=$cart->fetchRow($query);
                $cartId=array_shift($cart->data);
                $order=\Mage::getModel('Model\Admin\Order');
                $order->setData($cart->data);
                $cartItem=\Mage::getModel('Model\Admin\Cart\Item');
                $query="SELECT * FROM `cart_item` WHERE `cartId`='{$cartId}'";
                $cartItem=$cartItem->fetchRow($query);

                $cartItemData=$cartItem->data;
                unset($cartItemData['cartId']);
                unset($cartItemData['cartItemId']);
                $orderItem=\Mage::getModel('Model\Admin\Order\Item');
                
                $orderItem->setData($cartItemData);
                $orderItem->customerId=$session->customerId;
                $orderItem->orderId=$order->orderId;
                
                $cartAddress=\Mage::getModel('Model\Admin\Cart\Address');
                $query="SELECT * FROM `cart_address` WHERE `cartId`='{$cartId}'"; //`addressType`='Billing'
                $cartAddress=$cartItem->fetchRow($query);
                $cartAddressData=$cartAddress->data;
                unset($cartAddressData['cartId']);
                unset($cartAddressData['cartAddressId']);
                $orderAddress=\Mage::getModel('Model\Admin\Order\Address');
                $orderAddress->setData($cartAddressData);
                $orderAddress->customerId=$session->customerId;
                $orderAddress->orderId=$order->orderId;

               // print_r($orderAddress->data);

                $order->save();
               $orderItem->save();
                $orderAddress->save();
               $cart->delete($cartId);
               $this->gridAction();
                
            }

        }
        catch (\Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
        }
    }
}