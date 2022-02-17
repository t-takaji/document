<?php
return [
    'search' => [json_decode(file_get_contents(__DIR__ . '/json/search.json'), true)], 
    'getschema' => [json_decode(file_get_contents(__DIR__ . '/json/getschema.json'), true)
    ]
];
