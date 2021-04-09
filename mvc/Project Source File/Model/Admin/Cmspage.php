<?php
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Core\Table');

class Cmspage extends \Model\Core\Table
 {
    const STATUS_DEFAULT = null;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {

        $this->setPrimaryKey("id");
        $this->setTableName("cms");
    }
    public function getStatusOptions()
    {
        return [

            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_DEFAULT => '---',

        ];
    }
}
 
?>