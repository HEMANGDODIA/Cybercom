<?php
namespace Block\Admin;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $admins = null;
    public function __construct()
    {
        parent::__construct();
    }
    public function setAdmins($admins = null)
    {
        if (!$admins) {

            $admins = \Mage::getAdmin('Model\Admin');
            $admins = $admins->fetchAll();
        }

        $this->admins = $admins;
        return $this;

    }
    public function getAdmins()
    {
        if (!$this->admins) {
            $this->setAdmins();
        }

        return $this->admins;
    }

}