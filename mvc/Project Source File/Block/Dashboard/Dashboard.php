<?php
namespace Block\Dashboard;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Dashboard extends Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/dashboard/dashboard.php');
    }
}