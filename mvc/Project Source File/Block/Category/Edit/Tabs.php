<?php
namespace Block\Category\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Tabs extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/category/edit/tabs.php');
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('category',['label'=>'Category Information','block'=>'Block\Category\Edit\Tabs\Form']);
        $this->addTab('Media',['label'=>'Media','block'=>'Block\Category\Edit\Tabs\Media']);
        $this->setDefaultTab('category');
        return $this;
    }
    
}



?>