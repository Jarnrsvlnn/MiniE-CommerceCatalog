<?php

declare(strict_types=1);
require_once "helpers.php";

// accepts an array of product and displays its information using a foreach loop
function displayCatalog(array $products): void
{
    foreach ($products as $product) {
        if ($product['stock'] <= 0) {
            continue;
        } else {
            echo 'Product: ' . $product['productName'] . ' | Price: ' . $product['productPrice'] . ' | Category: ' . $product['category'] . ' | Stock: ' . $product['stock'] . '<br/>';
        }
    }
}

// displays the current total count of products available
function productCount(array &$products): void
{
    $itemCount = count($products);

    echo "There are currently a total of $itemCount items.";
}


// applies a discount to the passed item
function displayDiscountedItem(callable $applyDiscount, array &$products, string $productName): void
{
    $formerPrice = 0;
    $discountedPrice = 0;

    // search through the array to find the product entered
    foreach ($products as $product) {
        if ($product['productName'] === $productName) {
            $formerPrice = $product['productPrice'];
            $discountedPrice = $applyDiscount($formerPrice, 0.10);

            // change the original price to the discounted price
            $product['productPrice'] = $discountedPrice;
        }
    }

    echo "The item $productName which has a base price of $formerPrice has been applied a discount which brings it down to the discounted price of $discountedPrice!";
}

function displayPriceIncrease(callable $increasePrice, array &$products, float $increasePercent): void
{
    /**
     * What happens here is that each element of the passed array "$products" 
     * is passed to the arrow function fn($product) as its parameter so fn($product) == each element of $products array
     * and in which the fn($product) parameter is also passed to the callback function $increasePrice
     * as its first parameter and then performs and modifies the original array "$products"
     */
    $products = array_map(fn($product) => $increasePrice($product, $increasePercent), $products);

    echo 'A 20% Increase has been applied to all products!<br/>';
    foreach ($products as $product) {
        echo 'Product: ' . $product['productName'] . ' | Price: ' . $product['productPrice'] . ' | Category: ' . $product['category'] . ' | Stock: ' . $product['stock'] . '<br/>';
    }
}
