<?php
namespace Controller;
\Mage::loadFileByClassName('Controller\Core\Admin');
use Controller\Core\Admin as Admin;
class Customergroup extends Admin
{
    protected $Customergroup = null;
    public function __construct()
    {
        parent::__construct();
        $this->setCustomergroup();
    }

    public function setCustomergroup($Customergroup = null)
    {
        if (!$Customergroup) {
            $Customergroup = \Mage::getModel('Model\Customergroup');
            if ($id=$this->getRequest()->getGet('groupId')) {
                $Customergroup=$Customergroup->load($id);
            }
        }
        $this->Customergroup = $Customergroup;
        return $this;
    }
    public function getCustomergroup()
    {
        if (!$this->Customergroup) {
            $this->setCustomergroup();
        }
        return $this->Customergroup;
    }
    public function gridAction()
    {
        try {
            $layout = $this->getLayout();
            $content = $layout->getChild('content'); 
            $layout->setTemplate('View/Core/layout/oneColumn.php');


            $grid = \Mage::getGrid('Block\Customergroup\Grid');
            $grid->setController($this);
            $grid->setTemplate('View/customergroup/grid.php');

            $content->addChild($grid, 'grid');

            $this->renderLayout();

        } catch (\Exception $e) {
            echo $e->getMessage();
            $this->redirect('grid', null, [], true);
        }

    }
    public function formAction()
    { 
        try {

            $layout = $this->getLayout();
            $content = $layout->getChild('content'); 
            $left=$layout->getChild('left');

            $lefttab=\Mage::getEdit('Block\Customergroup\Edit\Tabs');
            $lefttab->setController($this);
            $left->addChild($lefttab); 

   

            $edit = \Mage::getEdit('Block\Customergroup\Edit');
            $edit->setController($this);
            $edit->setTemplate('View/customergroup/form.php');
            // $edit->toHtml();
            $content->addChild($edit, 'edit');
            $this->renderLayout();


        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function saveAction()
    {
        try {

            if ($id = $this->getRequest()->getGet('groupId')) {
                $Customergroup = $this->getCustomergroup()->load($id);
                if (!$Customergroup) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getCustomergroup()->createdDate = date('Y-m-d H-i-s');

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $Customergroup_data = $this->getRequest()->getPost('customergroup');
            
            $this->getCustomergroup()->setData($Customergroup_data);
            
            $this->getCustomergroup()->save();

            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, [], true);
        }

        $this->redirect('grid', null, [], true);
    }

    public function deleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('groupId');
          
            if (!(int) $id) {
                throw new \Exception('Invalid ID');
            }

            if (!$this->getCustomergroup()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, [], true);
    }


}