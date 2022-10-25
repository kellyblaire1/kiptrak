<?php

$res =  [
    [
        'image' => 'product-1.jpg',
        'name' => 'Nike Canvas',
        'minPrice' => 15000,
        'quantity' => 1,
    ],
    [
        'image' => 'product-2.jpg',
        'name' => 'Wrist Watch',
        'minPrice' => 5000,
        'quantity' => 5,
    ],
    [
        'image' => 'product-3.jpg',
        'name' => 'Green Tea Face Serum',
        'minPrice' => 12500,
        'quantity' => 3,
    ],
    [
        'image' => 'product-4.jpg',
        'name' => 'Gucci Sunglasses',
        'minPrice' => 7000,
        'quantity' => 6,
    ],
];

echo json_encode($res);