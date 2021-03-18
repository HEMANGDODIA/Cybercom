<?php
namespace Block\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Form extends Template
{
    public $shipping = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/shipping/edit/tabs/form.php');

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





?>