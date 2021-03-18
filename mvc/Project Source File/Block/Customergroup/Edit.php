<?php
namespace Block\Customergroup;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template; 
class Edit extends Template
{
    public $customergroup = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function getTabContent(){
        $tabBlock=\Mage::getBlock('Block\Customergroup\Edit\Tabs');
        $tabs=$tabBlock->getTabs();

        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClasssName=$tabs[$tab]['block'];
        $block=\Mage::getBlock($blockClasssName);
        echo $block->toHtml();

    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save', 'Customergroup');
    }


}