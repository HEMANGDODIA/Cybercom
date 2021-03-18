<?php
namespace Controller;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');
use Controller\Core\Admin as Admin;


class Shipping  extends Admin{
    protected $shipping=[];
    //protected $model_shipping = null;

    public function __construct()
    {
        parent::__construct();
        $this->setShipping();
    }

    

    public function setShipping($shipping=null)
    {
        if($shipping){
            $this->shipping = $shipping;
            return $this;
        }
        if(!$shipping){
            $shipping=\Mage::getShipping('Model\Shipping');
            if ($id=$this->getRequest()->getGet('methodId')) {
                $shipping=$shipping->load($id);
            }
        } 
        $this->shipping = $shipping;
        return $this;
    }
    public function getShipping()
    {
        if(!$this->shipping){
            $this->setShipping();
        }
        return $this->shipping;
    }
   
    public function gridAction(){
        try {
            $layout = $this->getLayout();
            $content = $layout->getChild('content'); 
            $layout->setTemplate('View/Core/layout/oneColumn.php');
   

            $grid = \Mage::getGrid('Block\Shipping\Grid');
            $grid->setController($this);
            $grid->setTemplate('View/shipping/grid.php');

            $content->addChild($grid, 'grid');
            $this->renderLayout();


         
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            die();
        }
        }
        
        public function formAction(){
            try {
                $layout = $this->getLayout();
                $content = $layout->getChild('content');   
                $left=$layout->getChild('left');

                $lefttab=\Mage::getEdit('Block\Shipping\Edit\Tabs');
                $lefttab->setController($this);
                $left->addChild($lefttab);  

                $edit = \Mage::getEdit('Block\Shipping\Edit');
                $edit->setController($this);
                $edit->setTemplate('View/shipping/form.php');
                // $edit->toHtml();

                $content->addChild($edit, 'edit');
                $this->renderLayout();


                
            } catch (\Exception $e) {
                $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function saveAction(){
        try {
            //$shipping=new Model_Shipping();
            if ($id = $this->getRequest()->getGet('methodId')) {
                        $shipping = $this->getShipping()->load($id);
                        if (!$shipping) {
                            throw new \Exception("Record not Found");
                        }
                        $this->getMessage()->setSuccess('Record Updated Successfully.....');

                        // echo "<pre>";
                        // print_r($shipping);
                        // die();
                    } else {
                    date_default_timezone_set("Asia/Kolkata");
                    $this->getShipping()->createdDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Added Successfully.....');

                }
                $shippingData = $this->getRequest()->getPost('shipping');
                $this->getShipping()->setData($shippingData);
                $this->getShipping()->save();
                //print_r($this->getModel_Shipping());
                $this->redirect('grid', null, [], true); 
         } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            die();
        }
        
        
    }

    
  
   public function deleteAction(){

    try {
        
        $id=(int) $this->getRequest()->getGet('methodId');
        if (!$id) {
            throw new \Exception("Id required");  
        }   
        // $this->getShipping()->delete($id);
        // $this->redirect('grid', null, [], true);
         
        if (!$this->getShipping()->delete($id)) {
            $this->getMessage()->setFailure('Record can not delete');
        }
        $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            die();
        }
        $this->redirect('grid', null, null, true); 

       

   
   }
}
?>