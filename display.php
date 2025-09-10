<?php

declare(strict_types=1);

function displayCatalog(array $products): void
{
    foreach ($products as $description) {
        echo 'Product: ' . $description['productName'] . ' | Price: ' . $description['productPrice'] . ' | Category: ' . $description['category'] . ' | Stock: ' . $description['stock'] . '<br/>';
    }
}

