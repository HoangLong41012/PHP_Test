<?php
    include_once 'Model/StoreModel.php';
    include_once 'Model/ProductModel.php';
    class Controller{
        public $storeModel;
        public $productModel;

        public function __construct()
        {
            $this->storeModel = new StoresModel(); 
            $this->productModel = new ProductModel();
        }

        public function invoke()
        {
            $toppingList = $this->productModel->getAllTopping();

            $storeList = $this->storeModel->getAllStores();
            if (isset($_GET['id'])){
                $id = $_GET['id'];
            } else{
                $id = 1;
            }
            $productList = $this->storeModel->getProductList($id);

            if (!isset($_POST['sort-item'])){
                $sortAttr = 'Name';
            }else{
                $sortAttr = $_POST['sort-item'];
            }           

            if ($sortAttr == "Name"){
                $productList = $this->storeModel->sortByName($id);
            }
            if ($sortAttr == "Name reverse"){
                $productList = $this->storeModel->sortByNameReverse($id);
            }
            if ($sortAttr == "Price"){
                $productList = $this->storeModel->sortByPrice($id);
            }

            if ($sortAttr == "Price reverse"){
                $productList = $this->storeModel->sortByPriceReverse($id);
            }

            include 'View/storeView.php';
            
        }
    }
?>