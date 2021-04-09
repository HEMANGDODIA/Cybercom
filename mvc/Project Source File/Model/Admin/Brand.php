<?php

namespace Model\Admin; 

\Mage::loadFileByClassName('Model\Core\Table');

class Brand extends \Model\Core\Table
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('brand');
        $this->setPrimaryKey('brandId');
    }

    
}

?>