<?php 
namespace Block\Admin\Payment\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
use Block\Core\Edit\Tabs as coreTabs;
class Tabs extends coreTabs
{
    protected $tabs=[];
    protected $defaultTab=null;
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('payment',['label'=>'Payment Information','block'=>'Block\Admin\Payment\Edit\Tabs\Form']);
        $this->setDefaultTab('payment');
        return $this;
    }
    
}



?>