<?php

declare(strict_types=1);

// accepts an array of product and displays its information using a foreach loop
function displayCatalog(array $products): void
{
    foreach ($products as $product) {
        if ($product['stock'] <= 0) {
            continue;
        }
        else {
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
