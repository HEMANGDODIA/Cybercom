<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');
class Attribute extends \Controller\Core\Admin
{
    protected $attribute = null;
    public function __construct()
    {
        parent::__construct();
        $this->setattribute();
    }
    public function setattribute($attribute = null)
    {
        if (!$attribute) {
            $attribute = \Mage::getModel('Model\Admin\Attribute');
        }
        $this->attribute = $attribute;
        return $this;
    }
    public function getattribute()
    {
        if (!$this->attribute) {
            $this->setattribute();
        }
        return $this->attribute;
    }
    public function gridAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Attribute\Grid')->setAttributes(\Mage::getModel('Model\Admin\Attribute'))->toHtml();
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
    }
    public function formAction()
    {
        try {
            $attribute = \Mage::getModel('Model\Admin\Attribute');
            if ($id = (int) $this->getRequest()->getGet('attributeId')) {
                $attribute = $attribute->load($id);
                if (!$attribute) {
                    throw new \Exception("no record found");
                }
            }
            $edit = \Mage::getBlock('Block\Admin\Attribute\Edit')->setTableRow($attribute)->toHtml();
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $edit,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }
    public function saveAction()
    {
        try {
            if ($id = $this->getRequest()->getGet('attributeId')) {
                $product = $this->getattribute()->load($id);
                if (!$product) {
                    throw new \Exception('Please Enter Valid ID');
                }
                $this->getMessage()->setSuccess('Record Updated Successfully.....');

            } else {
                $this->getMessage()->setSuccess('Record Inserted Successfully.....');
            }
            $attributeData = $this->getRequest()->getPost('attribute');
            $this->getattribute()->setData($attributeData);
            $this->getattribute()->save();
            if ($this->getattribute()->backendType == 'varchar') {
                $backendType = $this->getattribute()->backendType . '(255)';
            } else {
                $backendType = $this->getattribute()->backendType;
            }
            $query = "ALTER TABLE `{$this->getattribute()->entityTypeId}` ADD {$this->getattribute()->code} {$backendType}";
            $this->getattribute()->getAdapter()->getConnect()->query($query);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction()
    {
        try {

            $id = $this->getRequest()->getGet('attributeId');
            if (!(int) $id) {
                throw new \Exception('Invalid ID');
            }
            if (!$this->getattribute()->delete($id)) {
                $this->getMessage()->setFailure('Record can not delete');
            }
            $this->getMessage()->setSuccess('Record Deleted Successfully.....');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}