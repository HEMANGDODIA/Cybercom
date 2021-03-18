<?php
namespace Controller;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');
use  Controller\Core\Admin as Admin;


class Product  extends Admin {
    protected $product=[];
    //protected $model_product = null;

    public function __construct()
    {
        parent::__construct();
        $this->setProduct();
    }

    

    public function setProduct($product=null)
    {
        if($product){
            $this->product = $product;
            return $this;
        }
        if(!$product){
            $product=\Mage::getProduct('Model\Product');
            if ($id=$this->getRequest()->getGet('productId')) {
                $product=$product->load($id);
            }
        }
        $this->product = $product;
        return $this;
    }
    public function getProduct()
    {
        if(!$this->product){
            $this->setProduct();
        }
        return $this->product;
    }
   
    public function gridAction(){
        try {
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $layout->setTemplate('View/Core/layout/oneColumn.php');
    

            $grid = \Mage::getGrid('Block\Product\Grid');
            $grid->setController($this);
            $grid->setTemplate('View/product/grid.php');

            $content->addChild($grid, 'grid');
            //$layout->toHtml();
            $this->renderLayout();
           
         
        
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

                $lefttab=\Mage::getEdit('Block\Product\Edit\Tabs');
                $lefttab->setController($this);
                $left->addChild($lefttab); 
    
                $edit = \Mage::getEdit('Block\Product\Edit');
                $edit->setController($this);
                $edit->setTemplate('View/product/form.php');

                // $edit->toHtml();
                

                $content->addChild($edit, 'edit');
                // $layout->toHtml();
                $this->renderLayout();

                
            } catch (\Exception $e) {
                $this->getMessage()->setFailure($e->getMessage());
            }
    }
    public function saveAction(){
        try {
            //$product=new Model_Product();
            if ($id = $this->getRequest()->getGet('productId')) {
                        $product = $this->getProduct()->load($id);
                        if (!$product) {
                            throw new \Exception("Record not Found");
                        }
                        // echo "<pre>";
                        // print_r($product);
                        // die();
                        date_default_timezone_set("Asia/Kolkata");
                        $product->updatedDate = date('Y-m-d H-i-s');
                        $this->getMessage()->setSuccess('Record Updated Successfully.....');

                    } else {
                    date_default_timezone_set("Asia/Kolkata");
                    $this->getProduct()->createdDate = date('Y-m-d H-i-s');
                    $this->getProduct()->updatedDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Added Successfully.....');

                }
                $productData = $this->getRequest()->getPost('product');
                print_r($productData);
                die();
                $this->getProduct()->setData($productData);
                $this->getProduct()->save();
                //print_r($this->getModel_Product());
                $this->redirect('grid', null, [], true); 
         } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        
        
    }

    
  
   public function deleteAction(){

    try {
        
        $id=(int) $this->getRequest()->getGet('productId');
        if (!$id) {
            throw new \Exception("Id required");    
        } 
       
        if (!$this->getProduct()->delete($id)) {
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