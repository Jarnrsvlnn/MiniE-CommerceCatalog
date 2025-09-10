<?php

require_once "display.php";

const APP_NAME = 'Mini E-Commerce Catalog';
echo "Hi welcome, I'm John and this is my mini project called " . APP_NAME . '!<br/><br/>';

// stores all catalog products with their respective informmation
$products = [
    [
        'productName' => "IPhone 14",
        'productPrice' => 39_000.00,
        'category' => 'Electronics',
        'stock' => 24
    ],
    [
        'productName' => "Apple Watch",
        'productPrice' => 17_999.00,
        'category' => 'Electronics',
        'stock' => 36
    ],
    [
        'productName' => "IPhone 14",
        'productPrice' => 39_000.00,
        'category' => 'Electronics',
        'stock' => 24
    ],
    [
        'productName' => "Gucci Jeans",
        'productPrice' => 12_999.00,
        'category' => 'Clothing',
        'stock' => 7
    ],
    [
        'productName' => "Ipad Mini 11",
        'productPrice' => 25_999.00,
        'category' => 'Electronics',
        'stock' => 17
    ]
];

// accepts an array of product and displays its information using a foreach loop
displayCatalog($products);

