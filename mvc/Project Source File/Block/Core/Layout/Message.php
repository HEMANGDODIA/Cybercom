<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Message extends Template
{
    public function __construct()
    {
        $this->setTemplate('View/core/layout/message.php');
    }
}