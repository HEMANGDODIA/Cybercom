<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');
use Controller\Core\Admin as Admin;


class Customer  extends Admin {
    protected $customer=[];
    //protected $model_customer = null;

    public function __construct()
    {
        parent::__construct();
        $this->setCustomer();
    }

    

    public function setCustomer($customer=null)
    {
        if($customer){
            $this->customer = $customer;
            return $this;
        }
        if(!$customer){
            $customer=\Mage::getCustomer('Model\Admin\Customer');
            if ($id=$this->getRequest()->getGet('customerId')) {
                $customer=$customer->load($id);
            }
        }
        $this->customer = $customer;
        return $this;
    }
    public function getCustomer()
    {
        if(!$this->customer){
            $this->setCustomer();
        }
        return $this->customer;
    }
   
    public function gridAction(){
        try {

            $gridHtml = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
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
            // $layout->setTemplate('View/core/layout/oneColumn.php');


            // $grid = \Mage::getGrid('Block\Admin\Customer\Grid');
            // $grid->setController($this);
            // $grid->setTemplate('View/admin/customer/grid.php');

            // $content->addChild($grid, 'grid');

            // $this->renderLayout();

         
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            die();
        }
        }
    
    public function formAction(){
        try {
            $customer = \Mage::getModel('Model\Admin\Customer');
            if ($id = (int) $this->getRequest()->getGet('customerId')) {
                $customer = $customer->load($id);
                if (!$customer) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Customer\Edit')->setTableRow($customer)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs')->toHtml();
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

            // $lefttab=\Mage::getEdit('Block\Admin\Customer\Edit\Tabs');
            // $lefttab->setController($this);
            // $left->addChild($lefttab); 

   

            // $edit = \Mage::getEdit('Block\Admin\Customer\Edit');
            // $edit->setController($this);
            // $edit->setTemplate('View/admin/customer/form.php');
            // // $edit->toHtml();
            // $content->addChild($edit, 'edit');
            // $this->renderLayout();


        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function saveAction(){
        try {
           // if ((!$this->getRequest()->getGet('tab')) or $this->getRequest()->getGet('tab') == 'customer') {
                if ($id = $this->getRequest()->getGet('customerId')) {
                    $customer = $this->getCustomer()->load($id);
                    //print_r($customer);
                    if (!$customer) {
                        throw new \Exception('Please Enter Valid ID');
                    }
                    $this->getCustomer()->updatedDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Updated Successfully.....');

                } else {
                    $this->getCustomer()->createdDate = date('Y-m-d H-i-s');
                    $this->getCustomer()->updatedDate = date('Y-m-d H-i-s');

                    $this->getMessage()->setSuccess('Record Inserted Successfully.....');
                }
                $customer_data = $this->getRequest()->getPost('customer');
                // print_r($customer_data);
                // die();
                $this->getCustomer()->setData($customer_data);
                $this->getCustomer()->save();
            } 
               catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        $this->redirect('grid', null, null, true);
        
    }

  
   public function deleteAction(){

    try {
        
        $id=(int) $this->getRequest()->getGet('customerId');
        if (!$id) {
            throw new \Exception("Id required");  
        }   
        // $this->getCustomer()->delete($id);
        // $this->redirect('grid', null, [], true);
        if (!$this->getCustomer()->delete($id)) {
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


