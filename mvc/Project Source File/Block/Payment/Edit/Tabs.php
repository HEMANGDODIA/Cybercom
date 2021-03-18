<?php 
namespace Block\Payment\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    protected $tabs=[];
    protected $defaultTab=null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/payment/edit/tabs.php');
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('payment',['label'=>'Payment Information','block'=>'Block\Payment\Edit\Tabs\Form']);
        $this->addTab('Media',['label'=>'Media','block'=>'Block\Payment\Edit\Tabs\Media']);
        $this->setDefaultTab('payment');
        return $this;
    }
    
}



?>