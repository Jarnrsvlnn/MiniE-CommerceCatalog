<?php 

declare(strict_types=1);

// accesses values using pass by reference then converts each product prices from the given array into integers 
function convertPrice(array &$products): void {
    foreach($products as &$description) {
        $description['productPrice'] = (int) $description['productPrice'];
    }
}