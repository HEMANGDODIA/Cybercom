<?php
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Core\Table');

use Model\Core\Table as Table;
class Shipping extends Table
{
    const STATUS_DEFAULT = null;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {

        $this->setPrimaryKey("methodId");
        $this->setTableName("shipping");
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