<?php
    include_once 'Model/Products.php';

    class ProductModel{

        function getAllTopping(){
            include 'data/data.php';
            $list = [];
            $productList = $productSet->products;
            foreach ($productList as $product){
                $topping = explode( "," , strtolower($product->toppings));
                foreach ($topping as $item){
                    if ($item[0] == ' '){
                        $item = substr($item, 1, strlen($item) - 1);
                    }
                    $list[] = $item;
                }
            }
            return array_unique($list);
        }     

        function getProductByName($name){
            include 'data/data.php';
            $productList = $productSet->products;
            $list = [];
            foreach ($productList as $product){
                $item = new Products($product->id, $product->name, $product->price, $product->toppings);
                $list[] = $item;
            }
            foreach ($list as $product){
                if ($product->name == $name){
                    return $product;
                }
            }
            return null;
        }

        function getProductById($id){
            include 'data/data.php';
            $productList = $productSet->products;
            $list = [];
            foreach ($productList as $product){
                $item = new Products($product->id, $product->name, $product->price, $product->toppings);
                $list[] = $item;
            }
            foreach ($list as $product){
                if ($product->id == $id){
                    return $product;
                }
            }
            return null;
        }

        function getProductByPrice($price){
            include 'data/data.php';
            $productList = $productSet->products;
            $list = [];
            foreach ($productList as $product){
                $item = new Products($product->id, $product->name, $product->price, $product->toppings);
                $list[] = $item;
            }
            foreach ($list as $product){
                if ($product->price == $price){
                    return $product;
                }
            }
            return null;
        }

    }
?>