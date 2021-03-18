<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
// echo 77;
class Left extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/core/layout/left.php');
    }
}