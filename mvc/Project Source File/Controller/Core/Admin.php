<?php
namespace Controller\Core;
use Block\Core\Layout as Layout;
class Admin
{
    protected $request=null;
    protected $layout=null;
    protected $message=null;
    public function __construct()
    {
        $this->setRequest();
    }
    public function setRequest(){
        $this->request=\Mage::getRequest('Model\Core\Request');
        return $this;
    }
    public function getRequest(){
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }

    public function setLayout(Layout $layout = null)
    {
        if (!$layout) {

            $layout = \Mage::getBlock('Block\Core\Layout');
            // print_r($layout);
            // die();
        }
        $this->layout = $layout;
        return $this;
    }
    public function getLayout()
    {
        if (!$this->layout) {
            $this->setLayout();
        }
        return $this->layout;
    }
    public function renderLayout()
    {
        echo $this->getLayout()->toHtml();
    }

    public function redirect($actionName=Null,$controllerName=Null,$params=[],$resetParams=false){
        
        
        header("location:{$this->getUrl($actionName,$controllerName,$params,$resetParams)}");
        exit;
    }

    public function getUrl($actionName=Null,$controllerName=Null,$params=[],$resetParams=false){

        $final=$this->getRequest()->getGet();
        if ($resetParams) {

            $final=[];
        }
        /*$final=[
            'c' =>null,
            'a' =>null,

        ];*/
        if($actionName==null){
            $actionName=$this->getRequest()->getGet('a'); 
        }
        if ($controllerName==null) {
            $controllerName=$this->getRequest()->getGet('c');
        }
        if ($params == null) {
            $params = [];
        }
        
        $final['c']=$controllerName;
        $final['a']=$actionName;

        if(is_array($params)){
        $final=array_merge($final,$params);
        }
        $queryString=http_build_query($final);
        unset($final);
        return "http://localhost/cybercom/index.php?{$queryString}";
        exit(0);
    }
    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
    public function getMessage()
    {
        if (!$this->message) {
            $this->setMessage();
        }
        return $this->message;
    }
}

?>