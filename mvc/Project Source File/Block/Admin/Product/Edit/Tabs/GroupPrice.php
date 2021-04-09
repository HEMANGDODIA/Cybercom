<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class GroupPrice extends \Block\Core\Template
{
    protected $product = null;
    protected $customerGroup=null;
    public function __construct()
    {
        $this->setTemplate('View/admin/product/edit/tabs/groupprice.php');
    }
    public function setProduct($product = null)
    {

        if ($product) {
            $this->product=$product;
            return $this;
        }
            $product = \Mage::getProduct('Model\Admin\Product');
             if ($id = $this->getController()->getRequest()->getGet('productId')) {
                $product = $product->load($id);

             }

            $this->product = $product;
            return $this;
        

        

    }
    public function getProduct()
    {
        if (!$this->product) {
            $this->setProduct();
        }
        return $this->product;
    }


    public function getCustomerGroups()
    {
        // $productId = $this->getRequest()->getGet('productId');
        $Groupprice = \Mage::getModel('Model\Admin\Product\GroupPrice');

        $customerGroup = \Mage::getModel('Model\Admin\Customergroup');

        $query = "SELECT cg.*, pgp.productId,pgp.entityId,pgp.price as groupPrice,
		if(pgp.price IS NULL , '{$this->getProduct()->price}' , p.price) price
		FROM `{$customerGroup->getTableName()}` cg
		LEFT JOIN `product_group_price` pgp
			ON pgp.customerGroupid = cg.groupId
				AND pgp.productId = '{$this->getProduct()->productId}'
		LEFT JOIN product p
				ON pgp.productId = p.productId
		";
        // $query = "SELECT cg.*, pgp.productId,pgp.entityId,pgp.price as groupPrice,
		// if(p.price IS NULL,'{$this->getProduct()->price}', p.price) price
		// FROM {$customerGroup->getTableName()} cg
		// LEFT JOIN {$Groupprice->getTableName()} pgp
		// 	ON pgp.customerGroupId = cg.groupId
		// 		AND pgp.productId = '{$this->getProduct()->productId}'
		// LEFT JOIN product p
		// 		ON pgp.productId = p.productId
		// ";
        // echo $query;
        $this->customerGroup= $customerGroup->fetchAll($query);
        return $this->customerGroup;

    }

}