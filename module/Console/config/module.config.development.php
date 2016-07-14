<?php
return [
    'logger' => [
        'default' => [
            'priority' => \Zend\Log\Logger::DEBUG,
        ],
    ],
    'log'    => [
        'console' => [
            'writers' => [
                'stderr' => [
                    'options' => [
                        'filters' => new \Zend\Log\Filter\Priority(\Zend\Log\Logger::ERR),
                    ],
                ],
            ],
        ],
    ],

];
