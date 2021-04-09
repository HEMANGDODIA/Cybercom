<?php
namespace Controller\Admin;
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
            $Customergroup = \Mage::getModel('Model\Admin\Customergroup');
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

            $gridHtml = \Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
            $response = [
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $gridHtml,
                    ],
                    [
                        'selector' => '#leftHtml',
                        'html' => null,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
    
            // $layout = $this->getLayout();
            // $content = $layout->getChild('content'); 
            // $layout->setTemplate('View/Core/layout/oneColumn.php');


            // $grid = \Mage::getGrid('Block\Admin\Customergroup\Grid');
            // $grid->setController($this);
            // $grid->setTemplate('View/admin/customergroup/grid.php');

            // $content->addChild($grid, 'grid');

            // $this->renderLayout();

        } catch (\Exception $e) {
            echo $e->getMessage();
            $this->redirect('grid', null, [], true);
        }

    }
    public function formAction()
    { 
        try {

            $customerGroup = \Mage::getModel('Model\Admin\CustomerGroup');
            if ($id = (int) $this->getRequest()->getGet('groupId')) {
                $customerGroup = $customerGroup->load($id);
                if (!$customerGroup) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\CustomerGroup\Edit')->setTableRow($customerGroup)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs')->toHtml();
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $edit,
                    ],
                    [
                        'selector' => '#leftHtml',
                        'html' => $leftcontent,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
            // $layout = $this->getLayout();
            // $content = $layout->getChild('content'); 
            // $left=$layout->getChild('left');

            // $lefttab=\Mage::getEdit('Block\Admin\Customergroup\Edit\Tabs');
            // $lefttab->setController($this);
            // $left->addChild($lefttab); 

   

            // $edit = \Mage::getEdit('Block\Admin\Customergroup\Edit');
            // $edit->setController($this);
            // $edit->setTemplate('View/admin/customergroup/form.php');
            // // $edit->toHtml();
            // $content->addChild($edit, 'edit');
            // $this->renderLayout();


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