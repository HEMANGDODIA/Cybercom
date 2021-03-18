<?php
namespace Block\Customergroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Form extends Template
{
    public $customergroup = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/customergroup/edit/tabs/form.php');
    }
    public function setCustomerGroup($customergroup = null)
    {
 
        if (!$customergroup) {
            $customergroup = \Mage::getModel('Model\Customergroup');

            if (!$id = (int) $this->getController()->getRequest()->getGet('groupId')) {
                return $this->customergroup = $customergroup;
            }

            $customergroup= $customergroup->load($id);
            if (!$customergroup) {
                return null;
            }
            $this->customergroup = $customergroup;
            return $this;
        }

    }
    public function getCustomerGroup()
    {
        if (!$this->customergroup) {
            $this->setCustomerGroup();
        }
        return $this->customergroup;
    }
    public function getOptions()
    {
        $customergroup = \Mage::getModel('Model\Customergroup');
        return $customergroup->getStatusOptions();
    }

}