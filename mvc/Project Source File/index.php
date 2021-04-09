<?php
class Mage{
    public static function init(){
        self::loadFileByClassName("Controller\Core\Front");
        \Controller\Core\Front::init();

      }

      public static function getAddress($className){
        self::loadFileByClassName($className);

        $className=str_replace('//',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','//',$className);
        return new $className();
    }


      
      public static function getAdmin($className){
        self::loadFileByClassName($className);

        $className=str_replace('_',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','_',$className);
        return new $className();
    }

      public static function getShipping($className){
        self::loadFileByClassName($className);

        $className=str_replace('//',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','//',$className);
        return new $className();
    }

    public static function getPayment($className){
        self::loadFileByClassName($className);

        $className=str_replace('//',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','//',$className);
        return new $className();
    }


    public static function getCategory($className){
        self::loadFileByClassName($className);

        $className=str_replace('\\',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','\\',$className);
        return new $className();
    }

    public static function getCustomer($className){
        self::loadFileByClassName($className);

        $className=str_replace('//',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','//',$className);
        return new $className();
    }



      public static function getProduct($className){
        self::loadFileByClassName($className);

        $className=str_replace('//',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','//',$className);
        return new $className();
    }
  
    
    public static function getController($className){
        self::loadFileByClassName($className);

        $className=str_replace('\\',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','\\',$className);
        return new $className();
    }

    public static function getBlock($className){
        self::loadFileByClassName($className);

        $className=str_replace('\\',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','\\',$className);
        return new $className();
    }
    public static function getModel($className)
    {
        self::loadFileByClassName($className);
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return new $className();

    }

    public static function getGrid($className){
        self::loadFileByClassName($className);

        $className=str_replace('\\',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','\\',$className);
        return new $className();
    }

    public static function getEdit($className){
        self::loadFileByClassName($className);

        $className=str_replace('\\',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','\\',$className);
        return new $className();
    }



    public static function getRequest($className){
        self::loadFileByClassName($className);

        $className=str_replace('\\',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','\\',$className);
        return new $className();
    }


    public static function loadFileByClassName($className){
        

        $className=str_replace('\\',' ',$className);
        $className=ucwords($className);
        $className=str_replace(' ','\\',$className);
        $className=$className.'.php';
    
        // print_r($className);

        require_once($className);
        

    }
 }
//Mage::init();
Mage::init();
?>