<?php

namespace Block\Admin\Cart;


trait CartTrait
{

    protected $cart = null;

    public function getCart()
    {
        return $this->cart;
    }

    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }
}
