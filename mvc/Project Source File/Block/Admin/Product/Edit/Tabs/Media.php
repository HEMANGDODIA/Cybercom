<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
use Block\Core\Template as Template;
class Media extends Template
{
    protected $imageData = null;
    public function __construct()
    {
        $this->setTemplate('View/admin/product/edit/tabs/media.php');
    }
    public function setProductMedia()
    {

        $media = \Mage::getModel('Model\Admin\Product\Media');
        $id = $this->getRequest()->getGet('productId');
        $query = "SELECT * FROM `productmedia` WHERE `productId`= {$id}";
        // print_r($query);
        // die();
        $this->imageData = $media->fetchAll($query);
        return $this->imageData;
    }
    public function getProductMedia()
    {
        if (!$this->imageData) {
            $this->setProductMedia();
        }
        return $this->imageData;
    }
  
}





?>