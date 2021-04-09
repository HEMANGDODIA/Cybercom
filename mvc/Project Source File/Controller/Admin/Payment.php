<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');
use Controller\Core\Admin as Admin;


class Payment  extends Admin{
    protected $payment=[];
    //protected $model_payment = null;

    public function __construct()
    {
        parent::__construct();
        $this->setPayment();
    }

    

    public function setPayment($payment=null)
    {
        if($payment){
            $this->payment = $payment;
            return $this;
        }
        if(!$payment){
            $payment=\Mage::getPayment('Model\Admin\Payment');
            if ($id=$this->getRequest()->getGet('methodId')) {
                $payment=$payment->load($id);
            }
        } 
        $this->payment = $payment;
        return $this;
    }
    public function getPayment()
    {
        if(!$this->payment){
            $this->setPayment();
        }
        return $this->payment;
    }
   
    public function gridAction(){
        try {
            $gridHtml = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
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
   

            // $grid = \Mage::getGrid('Block\Admin\Payment\Grid');
            // $grid->setController($this);
            // $grid->setTemplate('View/admin/payment/grid.php');

            // $content->addChild($grid, 'grid');
            // $this->renderLayout();

            
         
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            die();
        }
        }
        
        public function formAction(){
            try {
                $payment = \Mage::getModel('Model\Admin\Payment');
            if ($id = (int) $this->getRequest()->getGet('methodId')) {
                $payment = $payment->load($id);
                if (!$payment) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Payment\Edit')->setTableRow($payment)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\Payment\Edit\Tabs')->toHtml();
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

                // $lefttab=\Mage::getEdit('Block\Admin\Payment\Edit\Tabs');
                // $lefttab->setController($this);
                // $left->addChild($lefttab);    
    
                // $edit = \Mage::getEdit('Block\Admin\Payment\Edit');
                // $edit->setController($this);
                // $edit->setTemplate('View/admin/payment/form.php');
                // // $edit->toHtml();
                // $content->addChild($edit, 'edit');
                // $this->renderLayout();


                
            } catch (\Exception $e) {
                $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function saveAction(){
        try {
            //$payment=new Model_Payment();
            if ($id = $this->getRequest()->getGet('methodId')) {
                        $payment = $this->getPayment()->load($id);
                        if (!$payment) {
                            throw new \Exception("Record not Found");
                        }
                        $this->getMessage()->setSuccess('Record Updated Successfully.....');

                        // echo "<pre>";
                        // print_r($payment);
                        // die();
                    } else {
                    date_default_timezone_set("Asia/Kolkata");
                    $this->getPayment()->createdDate = date('Y-m-d H-i-s');
                    $this->getMessage()->setSuccess('Record Added Successfully.....');

                }
                $paymentData = $this->getRequest()->getPost('payment');
                $this->getPayment()->setData($paymentData);
                $this->getPayment()->save();
                //print_r($this->getModel_Payment());
                $this->redirect('grid', null, [], true); 
         } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
        
        
    }

    
  
   public function deleteAction(){

    try {
        
        $id=(int) $this->getRequest()->getGet('methodId');
        if (!$id) {
            throw new \Exception("Id required");  
        }   
        // $this->getPayment()->delete($id);
        // $this->redirect('grid', null, [], true);
        if (!$this->getPayment()->delete($id)) {
            $this->getMessage()->setFailure('Record can not delete');
        }
        $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        $this->redirect('grid', null, [], true);

       

   
   }
}
?>