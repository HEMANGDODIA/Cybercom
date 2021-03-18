<?php
namespace Block\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Form extends Template
{
    public $category = null;
    public $categoryOptions = null;


    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/category/edit/tabs/form.php');

    }
    public function setCategory($category = null)
    {

        if ($category) {
            $this->category=$category;
            return $this;
        }
            $category = \Mage::getCategory('Model\Category');
             if ($id = $this->getController()->getRequest()->getGet('categoryId')) {
                $category = $category->load($id);

             }

            $this->category = $category;
            return $this;
        

        

    }
    public function getCategory()
    {
        if (!$this->category) {
            $this->setCategory();
        }
        return $this->category;
    }

    public function getOption(){
        $p=new \Model\Category();
        return $p->getStatusOptions();
    }

    public function getCategoryOptions()
    {
        if (!$this->categoryOptions) {
            $query = "SELECT `categoryId`,`name` FROM `{$this->getCategory()->getTableName()}`;";
            // print_r($query);
            // die();
            $Options = $this->getCategory()->getAdapter()->fetchPairs($query);
            $query = "SELECT `categoryId`,`pathId` FROM `{$this->getCategory()->getTableName()}`;";
            $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);
            foreach ($this->categoryOptions as $id => &$pathid) {
                $pathids = explode("=>", $pathid);
                foreach ($pathids as $key => &$id) {
                    if (array_key_exists($id, $Options)) {
                        $id = $Options[$id];
                    }
                }
                $pathid = implode("=>", $pathids);
            }
            $this->categoryOptions = ['0' => 'select'] + $this->categoryOptions;
        }
        return $this->categoryOptions;
    }
    
}





?>