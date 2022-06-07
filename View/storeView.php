<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/design.css">
    <script language="javascript" src="public/filter.js"></script>
</head>
<body>
    <div class="left">
        <h5>Milk Tea Style</h5>
        <div class="store-list">
            <?php
                foreach ($storeList as $store){
                    echo '<div class="store" id="'.$store->id.'"><a href="index.php?id='.$store->id.'" >Store '.$store->id.'</a></div><br>';
                }
            ?>
        </div>
    </div>
    <div class="right">
        <div id="menu"><h3>Store <?php echo $id ?> Menu</h3></div>
        <div class="info">
            <span>
                <input type="button" class="filter-button" value="Filter" onclick="enableFilter()">
            </span>
            <span class="sort">
                <span>Sort by: </span>
                <span>
                    <form action="index.php" method="post">
                        <select name="sort-item">
                        <option value="Name">Name</option>
                        <option value="Name reverse">Name reverse</option>
                        <option value="Price">Price</option>
                        <option value="Price reverse">Price reverse</option>
                        </select>
                        <input type="submit" value="Sort">
                    </form>
                </span>
            </span>
        </div>
        <div class="filter">
            <h2 class="filter-header">Toppings: </h2>
            <div class="filter-block">
                <?php
                    foreach ($toppingList as $item){
                        echo '<div class="filter-detail"><input type="checkbox" name="topping" onclick="checkTopping();" id="filter-'.$item.'" value="'.$item.'">'.$item.'
                            </div>';
                    }
                ?>
            </div>
        </div>
        <div class="product-container">
            <?php

                foreach ($productList as $key => $item){
                    echo '<div class="product-item"><div class="id-tiem">MT-'.$item->id.'</div>';
                    echo '<div class="name-item">'.$item->name.'</div><hr>';
                    echo '<div class="topping-item">Topping: </div>';
                    echo '<div class="topping-detail">'.$item->topping.'</div>';
                    echo '<div class="price"><div class="trending">';
                    if ($item->id == 1){
                        echo '<p class="trend-item">Trending<p>';
                    }
                    echo '</div><div class="price-item">'.$item->price.'$</div></div></div>';
                }
            ?>
        </div>
    </div>
</body>
</html>
<?php

?>