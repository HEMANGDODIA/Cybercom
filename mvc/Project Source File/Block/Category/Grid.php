<?php
namespace Block\Category;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Grid extends Template
{
    public $categorys = null;
    public $categoryOptions = null;

    public function __construct()
    {
        parent::__construct();
    }
    public function setCategorys($categorys = null)
    {
        if (!$categorys) {

            $categorys = \Mage::getCategory('Model\Category');
            $categorys = $categorys->fetchAll();
        }

        $this->categorys = $categorys;
        return $this;

    }
    public function getCategorys()
    {
        if (!$this->categorys) {
            $this->setCategorys();
        }

        return $this->categorys;
    }

    public function getName($category)
    {
        $categoryModel = \Mage::getModel('Model\Category');
        if (!$this->categoryOptions) {
            $query = "SELECT `categoryId`,`name` FROM `{$categoryModel->getTableName()}`;";
            $this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($query);
        }
        $pathIds = explode("=>", $category->pathId);
        foreach ($pathIds as $key => &$categoryId) {
            if (array_key_exists($categoryId, $this->categoryOptions)) {
                $categoryId = $this->categoryOptions[$categoryId];
            }
        }
        $name = implode("=>", $pathIds);
        return $name;
    }

}