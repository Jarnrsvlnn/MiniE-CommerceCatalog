<?php

require_once "display.php";
require_once "helpers.php";

const APP_NAME = 'Mini E-Commerce Catalog';
echo "Hi welcome, I'm John and this is my mini project called " . APP_NAME . '!<br/><br/>';

// stores all catalog products with their respective informmation
$products = [
    [
        'productName' => "IPhone 14",
        'productPrice' => 39_000.43,
        'category' => 'Electronics',
        'stock' => 24
    ],
    [
        'productName' => "Apple Watch",
        'productPrice' => 17_999.45,
        'category' => 'Electronics',
        'stock' => 36
    ],
    [
        'productName' => "IPhone X",
        'productPrice' => 19_999.99,
        'category' => 'Electronics',
        'stock' => 24
    ],
    [
        'productName' => "Gucci Jeans",
        'productPrice' => 12_999.24,
        'category' => 'Clothing',
        'stock' => 7
    ],
    [
        'productName' => "Ipad Mini 11",
        'productPrice' => 25_999.56,
        'category' => 'Electronics',
        'stock' => 17
    ]
];

displayCatalog($products);
echo '<br/>';
convertPrice($products);
displayCatalog($products);

addNewProduct('Lenovo Legion', 69_999.00, 'Electronics', 83, $products);
echo '<br/>';
displayCatalog($products);
removeProduct('IPhone 14', $products);
echo '<br/>';
displayCatalog($products);
echo '<br/>';
productCount($products);
echo '<br/><br/>';

stockHealthRate('getTotalStock', $products);
