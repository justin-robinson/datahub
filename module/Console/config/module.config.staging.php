<?php
return array(
    'logger' => array(
        'default' => array(
            'priority' => \Zend\Log\Logger::WARN,
        )
    ),
    'log'=> array (
        'console' => array(
            'writers' => array(
                'stderr' => array(
                    'options' => array(
                        'filters' => new \Zend\Log\Filter\Priority(\Zend\Log\Logger::WARN),
                    ),
                ),
            ),
        ),
    ),
);
