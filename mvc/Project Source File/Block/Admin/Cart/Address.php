<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName('Block\Core\Template');
class Address extends \Block\Core\Template
{
    protected $cart = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/cart/address.php');
    }
    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }
    public function getCart()
    {
        if (!$this->cart) {
            return false;
        }
        return $this->cart;
    }
    public function getBillingAddress()
    {
        $cart = $this->getCart();

        $emptyCartAddress = \Mage::getModel('Model\Admin\Cart\Address');
        if (!$cart) {
            return $emptyCartAddress;
        }
        $billingAddress = $cart->getBillingAddress();
        if ($billingAddress) {
            return $billingAddress;
        }

        $customer = $cart->getCustomer();
        if ($customer) {
            $address = $customer->getBillingAddress();

            if ($address) {
                $emptyCartAddress->zipcode = $address->zipcode;
                $emptyCartAddress->country = $address->country;
                $emptyCartAddress->state = $address->state;
                $emptyCartAddress->address = $address->address;
                $emptyCartAddress->city = $address->city;
                $emptyCartAddress->addressType = $address->type;
                $emptyCartAddress->cartId = $cart->cartId;
                $emptyCartAddress->save();
                return $emptyCartAddress;
            } else {
                return $emptyCartAddress;
            }
        } else {
            return $emptyCartAddress;
        }
    }

    public function getShippingAddress()
    {
        $cart = $this->getCart();

        $emptyCartAddress = \Mage::getModel('Model\Admin\Cart\Address');
        if (!$cart) {
            return $emptyCartAddress;
        }
        $shippingAddress = $cart->getShippingAddress();
        if ($shippingAddress) {
            return $shippingAddress;
        }

        $customer = $cart->getCustomer();
        if ($customer) {
            $address = $customer->getShippingAddress();

            if ($address) {
                $emptyCartAddress->zipcode = $address->zipcode;
                $emptyCartAddress->country = $address->country;
                $emptyCartAddress->state = $address->state;
                $emptyCartAddress->address = $address->address;
                $emptyCartAddress->city = $address->city;
                $emptyCartAddress->addressType = $address->type;
                $emptyCartAddress->cartId = $cart->cartId;
                $emptyCartAddress->save();
                return $emptyCartAddress;
            } else {
                return $emptyCartAddress;
            }
        } else {
            return $emptyCartAddress;
        }
    }

}