<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'File list',
    'description' => 'Show folder files list.',
    'category' => 'plugin',
    'author' => 'Andriy Oprysko',
    'author_email' => 'andriy.oprysko@resultify.se',
    'author_company' => 'Pixelant',
    'state' => 'alpha',
    'clearCacheOnLoad' => false,
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.5.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ]
];
