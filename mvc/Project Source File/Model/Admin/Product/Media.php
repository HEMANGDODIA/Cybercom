<?php
namespace Model\Admin\Product;
\Mage::loadFileByClassName('Model\Core\Table');
use Model\Core\Table as Table;
class Media extends Table
{
    

    public function __construct()
    {

        $this->setPrimaryKey("imageId");
        $this->setTableName("productmedia");
    }
   
}