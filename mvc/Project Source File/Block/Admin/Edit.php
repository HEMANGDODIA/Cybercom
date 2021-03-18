<?php
namespace Block\Admin;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Edit extends Template
{
    public $admin = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function getTabContent(){
        $tabBlock=\Mage::getBlock('Block\Admin\Edit\Tabs');
        $tabs=$tabBlock->getTabs();

        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClasssName=$tabs[$tab]['block'];
        $block=\Mage::getBlock($blockClasssName);
        echo $block->toHtml();

    }
    public function setAdmin($admin = null)
    {

        if ($admin) {
            $this->admin=$admin;
            return $this;
        }
            $admin = \Mage::getAdmin('Model\Admin');
             if ($id = $this->getController()->getRequest()->getGet('adminId')) {
                $admin = $admin->load($id);

             }

            $this->admin = $admin;
            return $this;
        

        

    }
    public function getAdmin()
    {
        if (!$this->admin) {
            $this->setAdmin();
        }
        return $this->admin;
    }

}