<?php
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');

class GroupPrice extends \Controller\Core\Admin
{
    public function saveAction()
    {
        try {
            $groupData = $this->getRequest()->getPost('groupPrice');
            $productId = $this->getRequest()->getGet('productId');
            foreach ($groupData['exist'] as $groupId => $price) {
                $query = "SELECT * FROM `product_group_price`
			WHERE `productId` = '{$productId}'
			AND `customerGroupId` = '{$groupId}';";
                $groupPrice = \Mage::getModel('Model\Admin\Product\GroupPrice');
                $groupPrice->fetchRow($query);
                $groupPrice->price = $price;
                $groupPrice->save();
            }

            foreach ($groupData['new'] as $groupId => $price) {
                $groupPrice = \Mage::getModel('Model\Admin\Product\GroupPrice');
                $groupPrice->customerGroupId = $groupId;
                $groupPrice->productId = $productId;
                $groupPrice->price = $price;
                $groupPrice->save();

            }
        } catch (\Exception $e) {

        }
        $this->redirect('form', 'Product', ['productId' => $this->getRequest()->getGet('productId'), 'tab' => 'groupPrice']);

    }

}