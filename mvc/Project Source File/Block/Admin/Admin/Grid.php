<?php
namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $Admins = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/Admin/grid.php');

    }
    public function setAdmins($Admins = null)
    {
        if (!$Admins) {

            $Admins = \Mage::getAdmin('Model\Admin\Admin');
            $Admins = $Admins->fetchAll();
        }

        $this->Admins = $Admins;
        return $this;

    }
    public function getAdmins()
    {
        if (!$this->Admins) {
            $this->setAdmins();
        }

        return $this->Admins;
    }

}