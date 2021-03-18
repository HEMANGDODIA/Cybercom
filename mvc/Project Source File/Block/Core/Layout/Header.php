<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
//echo 444;
class Header extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/core/layout/header.php');
    }
}
?>