<?php
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Core\Session');
use Model\Core\Session as CoreSession;
class Session extends CoreSession
{
    public function __construct()
    {
        parent::__construct();
        $this->setNamespace('admin');
    }

}