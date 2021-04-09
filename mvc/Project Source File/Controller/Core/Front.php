<?php

//\Mage::loadFileByClassName('Model\Core\Request');
namespace Controller\Core; 

class Front{
    public static function init(){

        $request=\Mage::getModel("Model\Core\Request");
        $controllerName=ucfirst($request->getControllerName());
        $actionName=$request->getActionName()."Action";

        $controllerName=self::prepareClassName( "Controller",$controllerName);
        $controller=\Mage::getController($controllerName);
        $controller->$actionName();
    //     //echo __METHOD__; 
    //     $controllerName=$_GET['c'];
    //     $className='Controller\\'.$controllerName;

    //     $actionName=$_GET['a'];
    //     $method=$actionName.'Action';
        
    //    // Mage::loadFileByClassName($className);
    //     $controller=\Mage::getController($className);
    //     $controller->$method();
    }

    public static function prepareClassName($key, $nameSpace)
    {

        $className = $key . "\Admin\\" . $nameSpace;
        $className = str_replace('_', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return $className;

    }
}


?>