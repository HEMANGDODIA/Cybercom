<?php
namespace Controller\Core;
use Mage;
use Exception;


\Mage::loadFileByClassName('Controller\Core\Abstracts');
\Mage::loadFileByClassName('Block\Core\Layout');
class Admin extends Abstracts
{
    public function __construct()
    {
        parent::__construct();
    }
    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if(!$layout)
        {
            $layout = \Mage::getBlock('Block\Core\Layout');
        }
        if (!($layout instanceof \Block\Core\Layout)) {
            throw new \Exception('Must be instance of Block\Admin\Layout');
        }
        $this->layout = $layout;
        return $this;
    }
    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
    public function responseJson($status, $msg, $element)
    {
        $response = [
            'status' => $status,
            'message' => $msg,
            'element' => $element
        ];
        header("Content-type:application/json; charset=UTF-8");
        echo json_encode($response);
    }
    public function setSession()
    {
        $this->session = \Mage::getModel('Model\Admin\Session');
        return $this;
    }
    public function getSession()
    {
        if (!$this->session) {
            $this->setSession();
        }
        return $this->session;
    }
   
}

?>