<?php

return [
    'name' => 'Core',

    'validations' => [
        'time' => [
            'regex' => '/^(?:[01]\d|2[0-3]):[0-5]\d(?::[0-5]\d)?$/',
        ]
    ]
];
