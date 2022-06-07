<?php
    include_once 'Model/Products.php';
    include_once 'Model/Stores.php';
    include_once 'Model/ProductModel.php';
    class StoresModel{

        public function getAllStores()
        {
            include 'data/data.php';
            $list=[];
            $storeList = $storeSet->stores;
            foreach ($storeList as $store){
                $item = new Store($store->id, $store->name);
                $list[] = $item;
            }
            return $list;
        }

        public function getProductList($id){
            include 'data/data.php';
            $list=[];
            $storeProductList = $storeProductSet->shopProducts;
            $productList = $productSet->products;
            foreach ($storeProductList as $store){
                if ($store->shop == $id){
                    foreach ($productList as $product){
                        if ($product->id == $store->product){
                            $item = new Products($product->id, $product->name, $product->price, $product->toppings);
                            $list[] = $item;
                        }
                    }
                }
            }
            return $list;
        }    
        
        public function sortByName($id){
            $productModel = new ProductModel();
            $productList = $this->getProductList($id);
            $sortList = [];
            $list = [];
            foreach ($productList as $product){
                $sortList[$product->id] = $product->name;
            }
            asort($sortList);
            foreach ($sortList as $key=>$item){
                $list[] = $productModel->getProductById($key);
            }
            return $list;
        }

        public function sortByNameReverse($id){
            $productModel = new ProductModel();
            $productList = $this->getProductList($id);
            $sortList = [];
            $list = [];
            foreach ($productList as $product){
                $sortList[$product->id] = $product->name;
            }
            arsort($sortList);
            foreach ($sortList as $key=>$item){
                $list[] = $productModel->getProductById($key);
            }
            return $list;
        }

        public function sortByPrice($idStore){
            $productModel = new ProductModel();
            $productList = $this->getProductList($idStore);
            $sortList = [];
            $list = [];
            foreach ($productList as $product){
                $sortList[$product->id] = $product->price;
            }
            asort($sortList);
            foreach ($sortList as $key=>$item){
                $list[] = $productModel->getProductById($key);
            }
            return $list;
        }

        public function sortByPriceReverse($id){
            $productModel = new ProductModel();
            $productList = $this->getProductList($id);
            $sortList = [];
            $list = [];
            foreach ($productList as $product){
                $sortList[$product->id] = $product->price;
            }
            arsort($sortList);
            foreach ($sortList as $key=>$item){
                $list[] = $productModel->getProductById($key);
            }
            return $list;
        }

        public function sortById($id){
            $productModel = new ProductModel();
            $productList = $this->getProductList($id);
            $sortList = [];
            $list = [];
            foreach ($productList as $product){
                $sortList[] = $product->id;
            }
            sort($sortList);
            foreach ($sortList as $item){
                $list[] = $productModel->getProductById($item);
            }
            return $list;
        }
    }
?>