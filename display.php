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
