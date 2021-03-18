<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
use Model\Core\Table as Table;
class Customergroup extends Table
{
    const STATUS_DEFAULT = null;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {

        $this->setPrimaryKey("groupId");
        $this->setTableName("customer_group");
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