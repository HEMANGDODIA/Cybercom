<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
use Model\Core\Table as Table;
class ProductMedia extends Table
{
    

    public function __construct()
    {

        $this->setPrimaryKey("imageId");
        $this->setTableName("productmedia");
    }
   
}