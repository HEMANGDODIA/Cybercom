<?php
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Core\Table');
use Model\Core\Table as Table;
class Category extends Table
{
    const STATUS_DEFAULT = null;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    

    public function __construct()
    {

        $this->setPrimaryKey("categoryId");
        $this->setTableName("category");
    }
    public function getStatusOptions()
    {
        return [

            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_DEFAULT => '---',

        ];
    }
    public function updatePathId()
    {
        if (!$this->parentId) {
            $pathid = $this->categoryId;
            // echo "<pre>";
            // echo $pathid;
            // die();
        } else {
            $parent = \Mage::getModel('Model\Admin\Category')->load($this->parentId);
            $pathid = $parent->pathId . "=>" . $this->categoryId;
        }
        $this->pathId = $pathid;
        return $this->save();
    }
    public function updateChildrenPathIds($categoryPathId, $parentId = null)
    {
        $query = "SELECT * FROM `category` WHERE `pathId` LIKE '{$categoryPathId}%'";
        $categories = $this->getAdapter()->fetchAll($query);
        foreach ($categories as $key => $row) {
            $row = \Mage::getModel('Model\Admin\Category')->load($row['categoryId']);
            if ($parentId) {
                $row->parentId = $parentId;
            }
            $row->updatePathId();
        }

    }


}