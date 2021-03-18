<?php
namespace Model\Core;
require_once "Adapter.php";
\Mage::loadFileByClassName('Model\Core\Adapter');

class Table{
    public $data=[];
    protected $adapter = null;

    protected $tableName=null;
    protected $primaryKey=null;

    public function __construct()
    {
        
    }

    public function setPrimaryKey($primaryKey){
        $this->primaryKey=$primaryKey;
        return $this;
    }
    public function getPrimaryKey(){
        return $this->primaryKey;
    }

    public function setTableName($tableName){
        $this->tableName=$tableName;
        return $this;
    }

    public function getTableName(){
        return $this->tableName;
    }

    public function getPrimaryKeyValue()
    {
        if (!array_key_exists($this->getPrimaryKey(), $this->data)) {
            return null;
        }
        return $this->data[$this->getprimaryKey()];
    }

    public function __set($key, $value)
    {
        $this->data[$key]=$value;
        return $this;
    }
    public function __get($key)
    {
        if(!array_key_exists($key,$this->data)){
            return null;
        }
        return $this->data[$key];
    }
    
    public function setData(array $data){
    
            // print_r($data);
            // die();

        $this->data=array_merge($this->data,$data);
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setAdapter(){
        $this->adapter=new \Model\Core\Adapter();
        return $this;
    }
    public function getAdapter(){
        if(!$this->adapter){
            $this->setAdapter();
        }
        return $this->adapter;
    }
    public function save($query = null)
    {
        if ($query) {
            $id = $this->getAdapter()->insert($query);
        } else{

        if (!array_key_exists($this->getPrimaryKey(), $this->data)) {
            $keys = "`" . implode('`,`', array_keys($this->data)) . "`";

            $values = "'" . implode("','", $this->data) . "')";

            $query = "INSERT INTO `" . $this->getTableName() . "` (" . $keys . ") VALUES (" . $values;
          
            $id = $this->getAdapter()->insert($query);
            // echo "save";
            // die();
           
        } else {
            $id = array_shift($this->data);
           
            // echo "update";
            // die();
            $args = [];
            $sets = "";
            
            foreach ($this->getData() as $k => $v) {
                $sets = $sets . $k . "='" . $v . "',";
            }
            $sets = rtrim($sets, ",");
            $query = "UPDATE `{$this->getTableName()}` SET {$sets} WHERE `{$this->getPrimaryKey()}`='{$id}'";
            // print_r($query);
            // die();
            $this->getAdapter()->update($query);
            
        }
        $this->load($id);
        return $this;    
    }
   }

    public function load($id)
    {
        $value = (int) $id;
        // echo '<pre>';
        // print_r($id);
        // die();
        $query = "SELECT * FROM `{$this->getTableName()}`WHERE `{$this->getPrimaryKey()}`={$value}";
        return $this->fetchRow($query);
    }
    public function fetchRow($query)
    {
        $row = $this->getAdapter()->fetchRow($query);
        if (!$row) {
            return null;
        }
        $this->data = $row;
        return $this;
    }
    public function fetchAll($query=null)
    {
        if(!$query){
        $query = "SELECT * FROM  `{$this->getTableName()}`";
        }
        $rows = $this->getAdapter()->fetchAll($query);
        if (!$rows) {
            return null;
        }
        foreach ($rows as $key => &$value) {
            $row = new $this();
            $value = $row->setData($value);
        }
        // echo "<pre>";
        // print_r($rows);
        // die();
        $collecttionClassName = get_class($this) . '\\Collection';
        $collection = \Mage::getModel($collecttionClassName);
        $collection->setData($rows);
        unset($rows);
        return $collection;
    }
    public function delete($id = null)
    {
      
        $query = "DELETE FROM `{$this->getTableName()}` where `{$this->getPrimaryKey()}`={$id}";
            //   echo $query;
            //   die();
        return $this->getAdapter()->delete($query);

    }
}




?>