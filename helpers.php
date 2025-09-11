<?php

declare(strict_types=1);

// accesses values using pass by reference then converts each product prices from the given array into integers 
function convertPrice(array &$products): void
{
    foreach ($products as &$description) {
        $description['productPrice'] = (int) $description['productPrice'];
    }
}

// adds a new product to the products array
function addNewProduct(string $productName, int|float $productPrice, string $category, int $stock, array &$products): void
{
    $products[] = [
        'productName' => $productName,
        'productPrice' => $productPrice,
        'category' => $category,
        'stock' => $stock
    ];
}

// removes an item from the array using unset() and tthen re-indexes it 
function removeProduct(string $productName, array &$products): void
{
    $arrayLength = count($products);

    // loop through the products array to find the index of the picked item to be removed
    for ($i = 0; $i < $arrayLength; $i++) {
        if ($products[$i]['productName'] === $productName) {
            unset($products[$i]);
            $products = array_values($products);
            break;
        }
    }
}

// get the total stock of all available through the use of loop, , and in which will be used later as a callback function for stockHealthRate()
function getTotalStock(array $products): int
{
    $totalStock = 0;

    foreach ($products as $product) {
        $totalStock += $product['stock'];
    }

    return $totalStock;
}

// uses the return of the function getTotalStock() as the callback and uses that to check the total stock condition
function stockHealthRate(callable $callback, array $products): void
{
    $totalStock = $callback($products);

    if ($totalStock >= 100) echo 'Stock is excellent!';
    elseif ($totalStock >= 50) echo 'Stock is sufficient.';
    elseif ($totalStock >= 1) echo 'Stock is low!';
    else echo 'Out of stock!';
}

function calculateTotalValue(array $products): void
{
    $totalStoreValue = 0;

    foreach ($products as $product) {
        $totalStoreValue += ($product['productPrice'] * $product['stock']);
    }

    echo "The total store value is $totalStoreValue";
}

// used the arrow function to create a callback function that will update the price of a given product from the function displayDiscountedItem()
$applyDiscount = fn(int|float $price, float $discount = 0.10) => $price - ($price * $discount);

// used an arrow function to create a callback function to increase the price of products
$increasePrice = fn(array $product, float $increase = 0.20) => $product['productPrice'] + ($product['productPrice'] * $increase);