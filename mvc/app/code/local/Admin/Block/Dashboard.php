<?php
class Admin_Block_Dashboard extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("admin/dashboard.phtml");
    }

    public function getProductCount()
    {
        $productModel=Mage::getModel('catalog/product')->getCollection();
        $count=0;
        foreach($productModel->getData() as $p)
        {
            $count++;
        }
        return $count;
    }
    public function getCustomerCount()
    {
        $customerModel=Mage::getModel('customer/customer')->getCollection();
        $count=0;
        foreach($customerModel->getData() as $c)
        {
            $count++;
        }
        return $count;
    }

    public function getOrderCount()
    {
        $orderModel=Mage::getModel('sales/order')->getCollection();
        $count=0;
        foreach($orderModel->getData() as $c)
        {
            $count++;
        }
        return $count;
    }

    public function getRecentOrders()
    {
        $orderModel=Mage::getModel('sales/order')->getCollection()
        ->getOrderByToFilter('order_id DESC')
        ->getLimitToFilter(5);
                                                // ->addFieldToOrderBy(["order_id"],["DESC"])
                                                // ->getLimitToFilter(5);
        return $orderModel;                                        
    }

    public function getRecentCustomers()
    {
        $customerModel=Mage::getModel('customer/customer')->getCollection()
        ->getOrderByToFilter('customer_id DESC')
        ->getLimitToFilter(5);
                                                        // ->addFieldToOrderBy(["customer_id"],["DESC"])
                                                        // ->limit(5);
        return $customerModel;                                                
    }

    public function getCategoryCount()
    {
        $productModels=Mage::getModel('catalog/category')->getCollection();
        $count=0;
        foreach($productModels->getData() as $p)
        {
            $count++;
        }
        return $count;
    }
} 
?>