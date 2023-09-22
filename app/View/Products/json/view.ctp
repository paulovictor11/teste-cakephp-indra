<?php

$date = date_create($data['Product']['createdat']);

$product = [
    'id' => $data['Product']['id'],
    'name' => $data['Product']['name'],
    'description' => $data['Product']['description'],
    'price' => $data['Product']['price'],
    'createdat' => date_format($date, 'd-m-Y H:i:s'),
    'user_id' => $data['Product']['user_id'],
    'user_name' => $data['User']['name'],
];

echo json_encode($product, JSON_PRETTY_PRINT);