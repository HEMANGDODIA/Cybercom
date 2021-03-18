<?php 
namespace Block\Core;
use Controller\Core\Admin as Admin;
class Template
{
    protected $template = null;
    protected $children = [];
    protected $controller = null;
    protected $url=null;
    protected $request=null;
    protected $tabs=[];
    protected $defaultTab=null;


    public function __construct()
    {
        $this->setUrl();
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
    public function setController(Admin $controller)
    {
        $this->controller = $controller;
        return $this;

    }
    public function getController()
    {
        if (!$this->controller) {
            $this->setController(\Mage::getController('Controller\Core\Admin'));
        }
        return $this->controller;
    }
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;

    }
    public function getTemplate()
    {
        return $this->template;
    }
    public function toHtml()
    {
        ob_start();
        require_once $this->getTemplate();
        $content=ob_get_contents();
        ob_end_clean();
        //echo $content;
        return $content;
    }
    public function setUrl($url=null)
    {
        if(!$url){
            $url=\Mage::getModel('Model\Core\Url');
        }
        $this->url=$url;
        return $this;
        
    }
    public function getUrl()
    {
        if (!$this->url) {
            $this->setUrl();
        }
        return $this->url;
    }
    /*public function getUrl($actionName = null, $controllerName = null, $params = [], $reset = false)
    {
        return $this->getController()->getUrl($actionName, $controllerName, $params, $reset);
    }*/

    public function setChildren(array $children=[]){
        $this->$children=$children;
        return $this;
    }
    public function getChildren(){
        return $this->children;
    }

    public function addChild(Template $child,$key= null){
        if(!$key){
            $key=get_class($child);
        }
        $this->children[$key]=$child;
        return $this;

    }
    public function getChild($key){
        if(!array_key_exists($key,$this->children)){
            return null;
        }
        return $this->children[$key];
    }

    public function removeChild($key){
        if(array_key_exists($key,$this->children)){
            unset($this->children[$key]);
        }
        return $this;
    }
    public function createBlock($className)
    {
        return \Mage::getBlock($className);
    }
    public function getMessage()
    {
        return $this->getController()->getMessage();

    }
    public function setDefaultTab($defaultTab){
        $this->defaultTab=$defaultTab;
        return $this;
    }
    
    public function getDefaultTab(){
        return $this->defaultTab;
        
    }
    public function setTabs(array $tabs=[]){
        $this->tabs=$tabs;
        return $this;
    }
    public function getTabs(){
        return $this->tabs;
    }
    public function addTab($key,$tab=[]){
        $this->tabs[$key]=$tab;
    }
    public function getTab($key){
        if(!array_key_exists($key,$this->tabs)){
            return null;
        }
        return $this->tabs[$key];
    }
    public function removeTab($key){
        if(!array_key_exists($key,$this->tabs)){
            unset($this->trabs[$key]);
        }

    }
    public function subUrl($subUrl = null)
    {
        
        return $this->getUrl()->baseUrl($subUrl);
    }
}