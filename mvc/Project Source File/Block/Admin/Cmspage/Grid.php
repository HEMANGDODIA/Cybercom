<?php
namespace Block\Admin\Cmspage;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $cms = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/cmspage/grid.php');

    }
    public function setCmspage(\Model\Admin\Cmspage $cms=null)
    {
        $cms = \Mage::getModel('Model\Admin\Cmspage');
        
        $this->cms = $cms->fetchAll();
        return $this; 
    }
    public function getCmspage()
    {
        if (!$this->cms) {
            $this->setCmspage();
        }
        return $this->cms;
        
    }
}