<?php
namespace Controller;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');

use Controller\Core\Admin as CoreAdmin;

class Admin  extends CoreAdmin {
    protected $admin=[];
    //protected $model_admin = null;

    public function __construct()
    {
        parent::__construct();
        $this->setAdmin();
    }

    

    public function setAdmin($admin=null)
    {
        if($admin){
            $this->admin = $admin;
            return $this;
        }
        if(!$admin){
            $admin=\Mage::getAdmin('Model\Admin');
            if ($id=$this->getRequest()->getGet('adminId')) {
                $admin=$admin->load($id);
            }
        }
        $this->admin = $admin;
        return $this;
    }
    public function getAdmin()
    {
        if(!$this->admin){
            $this->setAdmin();
        }
        return $this->admin;
    }
   
    public function gridAction(){
        try {
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $layout->setTemplate('View/Core/layout/oneColumn.php');
    

            $grid = \Mage::getGrid('Block\Admin\Grid');
            $grid->setController($this);
            $grid->setTemplate('View/admin/grid.php');

            $content->addChild($grid, 'grid');
            $this->renderLayout();
            
           
;
         
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        }
        
        public function formAction(){
            try {
                $layout = $this->getLayout();
                $content = $layout->getChild('content');    
                $left=$layout->getChild('left');

                $lefttab=\Mage::getEdit('Block\Admin\Edit\Tabs');
                $lefttab->setController($this);
                $left->addChild($lefttab);
    
                $edit = \Mage::getEdit('Block\Admin\Edit');
                $edit->setController($this);
                $edit->setTemplate('View/admin/form.php');

                // $edit->toHtml();
                

                $content->addChild($edit, 'edit');
                $this->renderLayout();

                
            } catch (\Exception $e) {
                $this->getMessage()->setFailure($e->getMessage());
            }
    }
    public function saveAction(){
        try {
            //$admin=new Model_Admin();
            if ($id = $this->getRequest()->getGet('adminId')) {
                        $admin = $this->getAdmin()->load($id);
                        if (!$admin) {
                            throw new \Exception("Record not Found");
                        }
                        // echo "<pre>";
                        // print_r($admin);
                        // die();
                        $this->getMessage()->setSuccess('Record Updated Successfully.....');

                    } else {
                    date_default_timezone_set("Asia/Kolkata");
                    $this->getAdmin()->createdDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Added Successfully.....');

                }
                $adminData = $this->getRequest()->getPost('admin');
                
                $this->getAdmin()->setData($adminData);
                $this->getAdmin()->save();
                //print_r($this->getModel_Admin());
                $this->redirect('grid', null, [], true); 
         } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        
        
    }

    
  
   public function deleteAction(){

    try {
        
        $id=(int) $this->getRequest()->getGet('adminId');
        if (!$id) {
            throw new \Exception("Id required");    
        } 
       
        if (!$this->getAdmin()->delete($id)) {
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