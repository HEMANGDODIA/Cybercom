<?php
namespace Block\Admin\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Form extends Template
{
    public $admin = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/admin/edit/tabs/form.php');

    }
    public function setAdmin($admin = null)
    {

        if ($admin) {
            $this->admin=$admin;
            return $this;
        }
            $admin = \Mage::getAdmin('Model\Admin');
             if ($id = $this->getController()->getRequest()->getGet('adminId')) {
                $admin = $admin->load($id);

             }

            $this->admin = $admin;
            return $this;
        

        

    }
    public function getAdmin()
    {
        if (!$this->admin) {
            $this->setAdmin();
        }
        return $this->admin;
    }

    
}





?>