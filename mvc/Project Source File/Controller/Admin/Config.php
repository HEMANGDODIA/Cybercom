<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');

use Controller\Core\Admin as Admin;

class Config extends Admin 
{
    protected $configGroup=null;
   public function __construct() {
     parent::__construct();

   } 
   public function setConfigGroup($configGroup = null)
   {
       if (!$configGroup) {
           $configGroup = \Mage::getModel('Model\Admin\ConfigGroup');
       }
       $this->configGroup = $configGroup;
       return $this;
   }
// public function setConfigGroup($configGroup=null)
//     {
//         if($configGroup){
//             $this->configGroup = $configGroup;
//             return $this;
//         }
//         if(!$configGroup){
//             $configGroup=\Mage::getModel('Model\Admin\ConfigGroup');
//             if ($id=$this->getRequest()->getGet('groupId')) {
//                 $configGroup=$configGroup->load($id);
//             }
//         }
//         $this->configGroup = $configGroup;
//         return $this;
//     }
   public function getConfigGroup()
   {
       if (!$this->configGroup) {
           $this->setConfigGroup();
       }
       return $this->configGroup;
   }
public function gridAction()
{
    try {

        $gridHtml = \Mage::getBlock('Block\Admin\Config\Grid')->toHtml();
       
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
    }
    catch (\Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
        // die();
    }
}



 public function formAction(){
        try {
        $config = \Mage::getModel('Model\Admin\ConfigGroup');
        if ($id = (int) $this->getRequest()->getGet('groupId')) {
            $config = $config->load($id);
            if (!$config) {
                throw new \Exception("no record found");
            }
        }
        $edit = \Mage::getBlock('Block\Admin\Config\Edit')->setTableRow($config)->toHtml();
        $leftcontent = \Mage::getBlock('Block\Admin\Config\Edit\Tabs')->toHtml();
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
        if ($id = $this->getRequest()->getGet('groupId')) {
                    
                    $config = $this->getConfigGroup()->load($id);
                    if (!$config) {
                        throw new \Exception("Record not Found");
                    }
                
                    $this->getMessage()->setSuccess('Record Updated Successfully.....');

                } else {
                date_default_timezone_set("Asia/Kolkata");
                $this->getConfigGroup()->createdDate = date('Y-m-d H-i-s');
                $this->getMessage()->setSuccess('Record Added Successfully.....');

            }
            $configData = $this->getRequest()->getPost('config');

            $this->getConfigGroup()->setData($configData);
            // print_r($this->getConfigGroup());
            // die;
            $this->getConfigGroup()->save();
            $this->redirect('grid', null, [], true); 
     } catch (\Exception $e) {
        $this->getMessage()->setFailure($e->getMessage());
    }
    
    
}



public function deleteAction(){

try {
    
    $id=(int) $this->getRequest()->getGet('groupId');
    if (!$id) {
        throw new \Exception("Id required");    
    } 
   
    if (!$this->getConfigGroup()->delete($id)) {
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