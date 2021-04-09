<?php
namespace Controller\Admin;
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
            $this->product=$product;
            return $this;
        }
        if(!$product){
            $product=\Mage::getModel('Model\Admin\Product');
            if($id=$this->getRequest()->getGet('productId')){
                $product=$product->load($id);
            }
        }
        $this->product=$product;
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
            $grid=\Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
            $response=[
                'element'=>[
                    [
                        'selector'=>'#contentHtml',
                        'html'=>$grid,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);



            // $layout = $this->getLayout();
            // $content = $layout->getChild('content');
            // $layout->setTemplate('View/Core/layout/oneColumn.php');
    

            // $grid = \Mage::getGrid('Block\Admin\Product\Grid');
            // $grid->setController($this);
            // $grid->setTemplate('View/admin/product/grid.php');

            // $content->addChild($grid, 'grid');
            // //$layout->toHtml();
            // $this->renderLayout();
           
         
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        }
        
        public function formAction(){
            try {
                // $layout = $this->getLayout();
                // $content = $layout->getChild('content');     
                // $left=$layout->getChild('left');

                // $lefttab=\Mage::getEdit('Block\Admin\Product\Edit\Tabs');
                // $lefttab->setController($this);
                // $left->addChild($lefttab); 
    
                // $edit = \Mage::getEdit('Block\Admin\Product\Edit');
                // $edit->setController($this);
                // $edit->setTemplate('View/admin/product/form.php');

                // // $edit->toHtml();
                

                // $content->addChild($edit, 'edit');
                // // $layout->toHtml();
                // $this->renderLayout();
            // $product = \Mage::getModel('Model\Admin\Product');
            // if ($id = (int) $this->getRequest()->getGet('productId')) {
            //     $product = $product->load($id);
            //     if (!$product) {
            //         throw new \Exception("no record found");
            //     }
            // }
            $product=\Mage::getModel('Model\Admin\Product');
            if ($id=(int)$this->getRequest()->getGet('productId')) {
                $product=$product->load($id);
                if(!$product){
                    throw new \Exception("Product not available");
                    
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($product)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();

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
                    // print_r($productData);
                    // die();
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