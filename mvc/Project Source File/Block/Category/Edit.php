<?php
namespace Block\Category;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Edit extends Template
{
    public $category = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function getTabContent(){
        $tabBlock=\Mage::getBlock('Block\Category\Edit\Tabs');
        $tabs=$tabBlock->getTabs();

        $tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClasssName=$tabs[$tab]['block'];
        $block=\Mage::getBlock($blockClasssName);
        echo $block->toHtml();

    }
    public function setCategory($category = null)
    {

        if ($category) {
            $this->category=$category;
            return $this;
        }
            $category = \Mage::getCategory('Model\Category');
             if ($id = $this->getController()->getRequest()->getGet('categoryId')) {
                $category = $category->load($id);

             }

            $this->category = $category;
            return $this;
        

        

    }
    public function getCategory()
    {
        if (!$this->category) {
            $this->setCategory();
        }
        return $this->category;
    }
    
    
}