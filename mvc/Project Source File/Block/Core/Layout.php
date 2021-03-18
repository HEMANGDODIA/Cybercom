<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
use Controller\Core\Admin as Admin;
//echo 11;
class Layout extends Template
{

    protected $children=[];                     

    public function __construct(Admin $controller =null)
    {
        $this->setTemplate('View/Core/layout/threeColumn.php');
        $this->prepareChildren();
        
    }

    public function prepareChildren()
    {

        $this->addChild(\Mage::getBlock('Block\Core\Layout\Header'), 'header'); 
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'), 'content'); 
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'), 'footer'); 
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Left'), 'left'); 


    }
    public function getContent(){
        return $this->getChild('content');
    }

    public function getHeader(){
        return $this->getChild('header');
    }

    public function getLeft(){
        return $this->getChild('left');
    }


    

}


?>