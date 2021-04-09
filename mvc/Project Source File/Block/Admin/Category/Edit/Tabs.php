<?php
namespace Block\Admin\Category\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
use Block\Core\Edit as Edit;
class Tabs extends Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();

    }
    public function prepareTab(){
        $this->addTab('category',['label'=>'Category Information','block'=>'Block\Admin\Category\Edit\Tabs\Form']);
        $this->addTab('Media',['label'=>'Media','block'=>'Block\Admin\Category\Edit\Tabs\Media']);
        $this->setDefaultTab('category');
        return $this;
    }
    
}



?>