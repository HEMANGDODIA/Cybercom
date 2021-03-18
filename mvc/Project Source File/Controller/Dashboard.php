<?php
namespace Controller;
\Mage::loadFileByClassName('Controller\Core\Admin');
use Controller\Core\Admin as Admin;
class Dashboard extends Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $grid = \Mage::getBlock('Block\Dashboard\Dashboard');
        $content->addChild($grid, 'dashboard');
        $this->renderLayout();
    }
}