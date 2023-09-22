<?php

class User extends AppModel
{
    public $name = 'User';
    public $hasMany = [
        'Product' => [
            'className' => 'Product',
            'dependent' => true
        ]
    ];
}