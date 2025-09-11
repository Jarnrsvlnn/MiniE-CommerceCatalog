<?php 

declare(strict_types=1);

// accesses values using pass by reference then converts each product prices from the given array into integers 
function convertPrice(array &$products): void {
    foreach($products as &$description) {
        $description['productPrice'] = (int) $description['productPrice'];
    }
}

// adds a new product to the products array
function addNewProduct(string $productName, int|float $productPrice, string $category, int $stock, array &$products): void{
    $products[] = [
        'productName' => $productName,
        'productPrice' => $productPrice,
        'category' => $category,
        'stock' => $stock
    ];
}

// removes an item from the array using unset() and tthen re-indexes it 
function removeProduct(string $productName, array &$products): void {
    $arrayLength = count($products);

    // loop through the products array to find the index of the picked item to be removed
    for($i = 0; $i < $arrayLength; $i++) {
        if($products[$i]['productName'] === $productName) {
            unset($products[$i]);
            $products = array_values($products);
            break;
        }
    }
}
