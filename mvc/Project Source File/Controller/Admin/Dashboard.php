<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
use Controller\Core\Admin as Admin;
class Dashboard extends Admin
{
    public function indexAction()
    {
        try {
            // $grid = \Mage::getBlock('Block\Admin\Dashboard\Dashboard')->toHtml();
        // $response=[
        //     'element'=>[
        //         [
        //             'selector'=>'#contentHtml',
        //             'html'=>$grid,
        //         ],
                
        //     ],
        // ];
        // header("Content-type:appliction/json; charset=utf-8");
        // echo json_encode($response);

            

        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $grid = \Mage::getBlock('Block\Admin\Dashboard\Dashboard');
        $content->addChild($grid, 'dashboard');
        $this->renderLayout();
    } catch (\Exception $e) {
        echo $e->getMessage();
        $this->redirect('grid', null, [], true);
    }
    }
}