<?php
namespace Controller;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');
use Controller\Core\Admin as Admin;


class ProductMedia  extends Admin{
  
    
    

   
    public function gridAction(){
        try {
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $layout->setTemplate('View/Core/layout/oneColumn.php');
    

            $Media = \Mage::getGrid('Block\Product\Edit\Tabs\Media');
            $Media->setController($this);
            $Media->setTemplate('View/product/edit/tabs/media.php');

            $content->addChild($Media, 'Media');
            //$layout->toHtml();
            $this->renderLayout();
           
         
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        }
        
      
    public function saveAction(){
        try {
            //$product=new Model_Product();
            $productMedia = \Mage::getModel('Model\ProductMedia');
            //echo 111;
            if (!$_FILES['image']['error']) {
                $path = "View/template/image/product/";
                $imageFileName = $_FILES['image']['name'];
                $tmpName = $_FILES['image']['tmp_name'];
                move_uploaded_file($tmpName, $path . $imageFileName);
                $productMedia->productid = $this->getRequest()->getGet('productId');
                $productMedia->image = $imageFileName;
                $productMedia->save();
            } else {
                $default = ['small' => 0, 'thumb' => 0, 'base' => 0, 'gallery' => 0];
                foreach ($this->getRequest()->getPost('data') as $key => $value) {
                    if (is_array($value)) {
                        $x = $productMedia->load($key);
                        
                        $x->setData($default);
                        $x->setData($value);
                        $x->save();
                    } else {
                       
                        $x = $productMedia->load($value);
                        $x->$key = $value;
                        $x->save();
                    }
    
                }
     }
    
    }
     catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        
        $this->redirect('form', 'Product', ['productId' => $this->getRequest()->getGet('productId'), 'tab' => 'Media']);
 
    }

    
  
    public function deleteAction()
    {
        $path = "View/template/image/product/";
        $productMedia = \Mage::getModel('Model\ProductMedia');
        
        $mediaIds = $this->getRequest()->getPost('imageId');
        // print_r($mediaIds);
        // die();
        foreach ($mediaIds as $id => $value) {
            $query = "SELECT `image` FROM `productmedia` WHERE  `productId`={$id}";
         
            $image = $productMedia->fetchRow($query);
            unlink($path . $image->image);
            $productMedia->delete($id);
        }
        $this->redirect('form', 'Product', ['productId' => $this->getRequest()->getGet('productId'), 'tab' => 'Media']);

    }
}
?>