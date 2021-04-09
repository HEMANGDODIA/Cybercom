<?php
namespace Controller\Admin;
// echo 111;
// die();
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Model\Core\Request');
\Mage::loadFileByClassName('Block\Admin\Category\Grid');
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Block\Core\Layout\Content');
use Controller\Core\Admin as Admin;


class Category  extends Admin{

   
    protected $category=[];
    //protected $model_category = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setCategory();
       
    }
    public function testAction(){
        // $layout = $this->getLayout();
        // $content = $layout->getChild('content');
        // $grid = new \Block\Category\Grid();
        // $grid->setController($this);
        // $grid->setTemplate('View/category/grid.php');
        // $content->addChild($grid, 'grid');
        
        // //$header=$layout->getChild('header');
        // //$header->addChild($header,'header')

        // // echo "<pre>";
        // // print_r($grid);
        // // die();
        // $this->renderLayout();

    

    }



    

    public function setCategory($category=null)
    {
        if($category){
            $this->category = $category;
            return $this;
        }
        if(!$category){
            $category=\Mage::getCategory('Model\Admin\Category');
            if ($id=$this->getRequest()->getGet('categoryId')) {
                $category=$category->load($id);
            }
        }
        $this->category = $category;
        //  print_r($id);
        // die();
        return $this;
    }
    public function getCategory()
    {
        
        if(!$this->category){
            $this->setCategory();
        }
       
        return $this->category;
    }
   
    public function gridAction(){
        //echo 222;
        try{ 
        $gridHtml = \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $gridHtml,
                ],
                [
                    'selector' => '#leftHtml',
                    'html' => null,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
            
        // $layout = $this->getLayout();
        // $content = $layout->getChild('content');
        // $layout->setTemplate('View/Core/layout/oneColumn.php');
        // $grid = \Mage::getGrid('Block\Admin\Category\Grid');
        //     // print_r($grid);
        //     // die();
        // $grid->setController($this);
        // $grid->setTemplate('View/admin/category/grid.php');
            
        // $content->addChild($grid, 'grid');
            
        // $this->renderLayout();
            
            
            // $grid->toHtml();
            
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            die();
        }
        }
        
        public function formAction(){
        
            try {
                
                // if (!($id=$this->getRequest()->getGet('categoryId'))) {
                //     throw new Exception("Id is not valid");
                // }
            $category = \Mage::getModel('Model\Admin\Category');
            if ($id = (int) $this->getRequest()->getGet('categoryId')) {
                $category = $category->load($id);
                if (!$category) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($category)->toHtml();
            $leftcontent = \Mage::getBlock('Block\Admin\Category\Edit\Tabs')->toHtml();
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $edit,
                    ],
                    [
                        'selector' => '#leftHtml',
                        'html' => $leftcontent,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);

                // $layout = $this->getLayout();
                // $content = $layout->getChild('content');  
                // $left=$layout->getChild('left');

                // $lefttab=\Mage::getEdit('Block\Admin\Category\Edit\Tabs');
                // $lefttab->setController($this);
                // $left->addChild($lefttab);   
    
                // $edit = \Mage::getEdit('Block\Admin\Category\Edit');
                // $edit->setController($this);
                // $edit->setTemplate('View/admin/category/form.php');


                // // $edit->toHtml();
                // $content->addChild($edit, 'edit');
                // $this->renderLayout();
    
                
            }catch (\Exception $e) {
                $this->getMessage()->setFailure($e->getMessage());
            }
    }
    public function saveAction()
    {
        try {
            $cat = \Mage::getModel('Model\Admin\Category');
            if ($id = $this->getRequest()->getGet('id')) {
                $cat = $cat->load($id);
                if (!$cat) {
                    throw new \Exception('Please Enter Valid ID');
                }

                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {

                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $categoryPathId = $cat->pathId . "=>";
            $category_data = $this->getRequest()->getPost('category');
            $cat->setData($category_data);
            $x=$cat->save();
            $cat->updatePathId();
            $cat->updateChildrenPathIds($categoryPathId);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', null, [], true);
        }
        $this->redirect('grid', null, [], true);
    }
    // public function saveAction(){
    //     try {
            

    //      $category=Mage::getModel('Model_Category');
    //        if ($categoryId = $this->getRequest()->getGet('categoryId')) {
    //                     $category = $category->load($categoryId);
    //                     if (!$category) {
    //                         throw new Exception("Record not Found");
    //                     }
    //                     $this->getMessage()->setSuccess('Record Updated Successfully.....');

    //                 } else {
    //                     $this->getMessage()->setSuccess('Record Added Successfully.....');
                        
    //                 }
    //             //   $categoryData = $this->getRequest()->getPost('category');
    //             //     // echo "<pre>";
    //             //     // print_r($categoryData);
    //             //     //  die();
    //             // $this->getCategory()->setData($categoryData);
    //             // $this->getCategory()->save();
    //             $categoryPathId = $category->pathId . "=>";
    //             echo $categoryPathId . "<br>";
    //             $categoryData = $this->getRequest()->getPost('category');
    //             $this->getCategory()->setData($categoryData);
    //             $this->getCategory()->save();
    //             $category->updatePathId();
    //             $category->updateChildrenPathIds($categoryPathId);
              
    //             //print_r($this->getModel_Category());
    //             $this->redirect('grid', null, [], true); 
    //      } catch (Exception $e) {
    //         $this->getMessage()->setFailure($e->getMessage());
    //         //die();
    //     }
        
        
    // }

    
  
   public function deleteAction(){

    try {
        
        $id=(int) $this->getRequest()->getGet('categoryId');
        if (!$id) {
            throw new \Exception("Id required");  
        }   
        // $this->getCategory()->delete($id);
        // $this->redirect('grid', null, [], true);
        if (!$this->getCategory()->delete($id)) {
            $this->getMessage()->setFailure('Record can not delete');
        }
        $this->getMessage()->setSuccess('Record Deleted Successfully.....');

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            // die();
        }
        $this->redirect('grid', null, [], true);
 

   
   }
}
?>