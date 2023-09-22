<?php

$arrProducts = [];

foreach ($data as $item) {
    $date = date_create($item['Product']['createdat']);

    $arrProducts[] = [
        'id' => $item['Product']['id'],
        'name' => $item['Product']['name'],
        'description' => $item['Product']['description'],
        'price' => $item['Product']['price'],
        'createdat' => date_format($date, 'd-m-Y H:i:s'),
        'user_id' => $item['Product']['user_id'],
        'user_name' => $item['User']['name'],
    ];
}

echo json_encode($arrProducts, JSON_PRETTY_PRINT);