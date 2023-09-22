<?php

class Product extends AppModel
{
    public $name = 'Product';
    public $belongsTo = [
        'User' => [
            'className' => 'User',
            'foreignKey' => 'user_id'
        ]
    ];
}