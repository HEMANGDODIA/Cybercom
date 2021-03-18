<?php
namespace Model\Core;
class Url{
    protected $request=null;
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
    public function baseUrl($subUrl = null)
    {
        
        $url = "http://localhost/cybercom/";
        if ($subUrl) {
            $url .= $subUrl;
        }
        return $url;
    }

}


?>