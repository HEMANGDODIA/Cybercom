<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');

use Controller\Core\Admin as Admin;

class Cmspage  extends Admin {
    protected $cms=null;
    public function __construct()
    {
        parent::__construct();
        $this->setCmspage();
    }

    

    public function setCmspage(\Model\Admin\Cmspage $cms = null)
    {
        if ($cms) {
            $this->cms=$cms;
            return $this;
        }
            $cms = \Mage::getModel('Model\Admin\Cmspage');
            $this->cms = $cms;
            return $this;
        

        

    }
    public function getCmspage()
    {
        if (!$this->cms) {
            $this->setCmspage();
        }
        return $this->cms;
    }

   
    public function gridAction(){
        try {
            $gridHtml = \Mage::getBlock('Block\Admin\CmsPage\Grid')->toHtml();
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
    

            // $grid = \Mage::getGrid('Block\Admin\Cmspage\Grid');
            // $grid->setController($this);
            // $grid->setTemplate('View/admin/cmspage/grid.php');

            // $content->addChild($grid, 'grid');
            // $this->renderLayout();
         
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        }
        
        public function formAction(){
            try {
            $cmsPage = \Mage::getModel('Model\Admin\CmsPage');
            if ($id = (int) $this->getRequest()->getGet('id')) {
                $cmsPage = $cmsPage->load($id);
                if (!$cmsPage) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\CmsPage\Edit')->setTableRow($cmsPage)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\CmsPage\Edit\Tabs')->toHtml();
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

                // $lefttab=\Mage::getEdit('Block\Admin\Cmspage\Edit\Tabs');
                // $lefttab->setController($this);
                // $left->addChild($lefttab);
    
                // $edit = \Mage::getEdit('Block\Admin\Cmspage\Edit');
                // $edit->setController($this);
                // $edit->setTemplate('View/admin/cmspage/form.php');

                // // $edit->toHtml();
                

                // $content->addChild($edit, 'edit');
                // $this->renderLayout();

                
            } catch (\Exception $e) {
                $this->getMessage()->setFailure($e->getMessage());
            }
    }
    public function saveAction(){
        try {
            //$admin=new Model_Admin();
            if ($id = $this->getRequest()->getGet('id')) {
                        $cms = $this->getCmspage()->load($id);
                        if (!$cms) {
                            throw new \Exception("Record not Found");
                        }
                    
                        $this->getMessage()->setSuccess('Record Updated Successfully.....');

                    } else {
                    date_default_timezone_set("Asia/Kolkata");
                    $this->getCmspage()->createdDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Added Successfully.....');

                }
                $cmspageData = $this->getRequest()->getPost('cmsPage');
                print_r($cmspageData);
    
                $this->getCmspage()->setData($cmspageData);
                $this->getCmspage()->save();
                $this->redirect('grid', null, [], true); 
         } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        
        
    }

    
  
   public function deleteAction(){

    try {
        
        $id=(int) $this->getRequest()->getGet('id');
        if (!$id) {
            throw new \Exception("Id required");    
        } 
       
        if (!$this->getCmspage()->delete($id)) {
            $this->getMessage()->setFailure('Record can not delete');
        }
        $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        

    } catch (\Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
        // die();
    }
    $this->redirect('grid', null, null, true); 
       

   
   }
}
?>