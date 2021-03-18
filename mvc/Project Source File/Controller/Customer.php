<?php
namespace Controller;
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
            $customer=\Mage::getCustomer('Model\Customer');
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
            $layout = $this->getLayout();
            $content = $layout->getChild('content'); 
            $layout->setTemplate('View/Core/layout/oneColumn.php');


            $grid = \Mage::getGrid('Block\Customer\Grid');
            $grid->setController($this);
            $grid->setTemplate('View/customer/grid.php');

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

            $lefttab=\Mage::getEdit('Block\Customer\Edit\Tabs');
            $lefttab->setController($this);
            $left->addChild($lefttab); 

   

            $edit = \Mage::getEdit('Block\Customer\Edit');
            $edit->setController($this);
            $edit->setTemplate('View/customer/form.php');
            // $edit->toHtml();
            $content->addChild($edit, 'edit');
            $this->renderLayout();


        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function saveAction(){
        try {
            if ((!$this->getRequest()->getGet('tab')) or $this->getRequest()->getGet('tab') == 'customer') {
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
                $this->getCustomer()->setData($customer_data);
                $this->getCustomer()->save();
            } else {
                $billing = \Mage::getModel('Model\CustomerAddress');
                $shipping = \Mage::getModel('Model\CustomerAddress');
                if ($id = $this->getRequest()->getGet('customerId')) {
                    $billingData = "SELECT * FROM `customer_address` WHERE  `customerId`= '{$id}' AND `addressType`= 'Billing';";
                    
                    if (!$billing->fetchRow($billingData)) {
                        $billing->addressType = 'Billing';
                        $billing->customerId = $id;
                        $billing_data = $this->getRequest()->getPost('billing');
                        $billing->setData($billing_data);
                        // print_r($billing);
                        // die();
                        $billing->save();
                    } else {
                        $billing_data = $this->getRequest()->getPost('billing');
                        $billing->setData($billing_data);
                        $billing->save();
                    }
                    $shippingData = "SELECT * FROM `customer_address` WHERE  `customerId`= '{$id}' AND `addressType`= 'Shipping';";
                    if (!$shipping->fetchRow($shippingData)) {
                        $shipping->customerId = $id;
                        $shipping->addressType = 'Shipping';
                        $shipping_data = $this->getRequest()->getPost('shipping');
                        $shipping->setData($shipping_data);
                        $shipping->save();

                    } else {
                        $shipping_data = $this->getRequest()->getPost('shipping');
                        $shipping->setData($shipping_data);
                        $shipping->save();
                    }

                    // $billing->customerId = $id;
                    // $billing->addressType = 'Billing';
                    // $shipping->customerId = $id;
                    // $shipping->addressType = 'Shipping';
                    // $billing_data = $this->getRequest()->getPost('billing');
                    // $shipping_data = $this->getRequest()->getPost('shipping');
                    // $billing->setData($billing_data);
                    // $shipping->setData($shipping_data);
                    // $keys = "`" . implode('`,`', array_keys($billing->getData())) . "`";

                    // $values = "'" . implode("','", $billing->getData()) . "')";

                    // $query = "INSERT INTO `" . $billing->getTableName() . "` (" . $keys . ") VALUES (" . $values;
                    // $billing->save($query);
                    // $keys = "`" . implode('`,`', array_keys($shipping->getData())) . "`";

                    // $values = "'" . implode("','", $shipping->getData()) . "')";

                    // $query = "INSERT INTO `" . $shipping->getTableName() . "` (" . $keys . ") VALUES (" . $values;
                    // $shipping->save($query);

                }

            }





            //$customer=new Model_Customer();
                    /*if ($id = $this->getRequest()->getGet('customerId')) {
                        $customer = $this->getCustomer()->load($id);
                        if (!$customer) {
                            throw new Exception("Record not Found");
                        }
                        date_default_timezone_set("Asia/Kolkata");
                        $customer->updatedDate = date('Y-m-d H-i-s');
                        $this->getMessage()->setSuccess('Record Updated Successfully.....');

                        // echo "<pre>";
                        // print_r($customer);
                        // die();
                    } else {
                    date_default_timezone_set("Asia/Kolkata");
                    $this->getCustomer()->createdDate = date('Y-m-d H-i-s');
                    $this->getCustomer()->updatedDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Added Successfully.....');

                }
                $customerData = $this->getRequest()->getPost('customer');
                $this->getCustomer()->setData($customerData);
                $this->getCustomer()->save();
                //print_r($this->getModel_Customer());
                $this->redirect('grid', null, [], true); */



         } catch (\Exception $e) {
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





// if(!$this->getRequest()->isPost()){
//                 throw new Exception("Invalid Request");
                
//             }
//             $customer=$this->getCustomer();
//             $shipping=Mage::getModel('Model_CustomerAddress');
//             $biling=Mage::getModel('Model_CustomerAddress');
//             if(!$this->getRequest()->getGet('tab')=='Addresses'){
//                 $customer=$this->getCustomer();
//                 if ($id = $this->getRequest()->getGet('customerId')) {
//                     $customer = $this->getCustomer()->load($id);
//                     if (!$customer) {
//                         throw new Exception("Record not Found");
//                     }
//                     date_default_timezone_set("Asia/Kolkata");
//                     $customer->updatedDate = date('Y-m-d H-i-s');
//                     $this->getMessage()->setSuccess('Record Updated Successfully.....');

//                     // echo "<pre>";
//                     // print_r($customer);
//                     // die();
//                 } else {
//                 date_default_timezone_set("Asia/Kolkata");
//                 $this->getCustomer()->createdDate = date('Y-m-d H-i-s');
//                 $this->getCustomer()->updatedDate = date('Y-m-d H-i-s');
//                 $this->getMessage()->setSuccess('Record Added Successfully.....');

//                 }
//                 $customerData = $this->getRequest()->getPost('customer');
              
//                 $this->getCustomer()->setData($customerData);
//                 if($this->getCustomer()->save()){
//                     if(!$id = $this->getRequest()->getGet('customerId')){
//                         $shipping->customerId=$customer->customerId;
//                         $shipping->addressType=2;
//                         $biling->customerId=$customer->customerId;
//                         $biling->addressType=1;
//                         if($biling->save()){
//                             if(!$shipping->save()){
//                                 echo "Record not inserted";
//                             }
//                         }
//                     }


//                 }
//                 else{
//                     echo "Record not inserted";
//                 }
//                 //print_r($this->getModel_Customer());
//                 // $this->redirect('grid', null, [], true);
//             }else{
//                 if($id = $this->getRequest()->getGet('customerId')){
//                     $sqlShipping="select * from `customer_address` where `customerId`={$id} and `addressType`=2";
//                     $shipping=$shipping->fetchRow($sqlShipping);
//                     if(!$shipping){
//                         $shipping=Mage::getModel('Model_CustomerAddress');
//                     }
//                     $sqlBiling="select * from `customer_address` where `customerId`={$id} and `addressType`=1";
//                     $biling=$shipping->fetchRow($sqlBiling);
//                     if(!$biling){
//                         $biling=Mage::getModel('Model_CustomerAddress');
//                     }
                    
//                     $this->getMessage()->setSuccess('Record Updated Successfully.....');


//                 }

//                 $shippingData=$this->getRequest()->getPost('shipping');
//                 $shipping->setData($shippingData);
//                 $shipping->addressType=2;
//                 $shipping->customerId=$this->getRequest()->getGet('customerId');

                
//                 $bilingData=$this->getRequest()->getPost('biling');
//                 $biling->setData($bilingData);
//                 $biling->addressType=2;
//                 $biling->customerId=$this->getRequest()->getGet('customerId');

//                 if($biling->save()){
//                     if(!$shipping->save()){
//                         echo "Record not inserted";
//                     }
//                 } 
//             }
            
?>


