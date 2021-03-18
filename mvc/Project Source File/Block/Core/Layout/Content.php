<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
//echo 111;
class Content extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/core/layout/content.php');
    }
}