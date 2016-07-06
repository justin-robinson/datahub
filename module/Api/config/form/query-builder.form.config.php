<?php
return [
    'elements'     => [
        [
            'spec' => [
                'type' => 'Zend\Form\Element\Hidden',
                'name' => 'market',
            ],
        ],
        [
            'spec' => [
                'type'       => 'Zend\Form\Element\Text',
                'name'       => 'term',
                'attributes' => [
                    'class' => 'span12',
                ],
                'options'    => [
                    'label'            => 'Search Term',
                    'label_attributes' => [
                        'class' => 'filters-label',
                    ],
                ],
            ],
        ],
        [
            'spec' => [
                'type'       => 'CMS\Form\Element\IndustrySelect',
                'name'       => 'industry',
                'attributes' => [
                    'class' => 'select2 span12',
                ],
                'options'    => [
                    'label'            => 'Industries',
                    'label_attributes' => [
                        'class' => 'filters-label',
                    ],
                    'empty_option'     => '',
                ],
            ],
        ],
        [
            'spec' => [
                'type'       => 'CMS\Form\Element\TopicSelect',
                'name'       => 'topic',
                'attributes' => [
                    'class' => 'select2 span12',
                ],
                'options'    => [
                    'label'            => 'Topics',
                    'label_attributes' => [
                        'class' => 'filters-label',
                    ],
                    'empty_option'     => '',
                ],
            ],
        ],
        [
            'spec' => [
                'type'       => 'CMS\Form\Element\AuthorSelect',
                'name'       => 'author',
                'attributes' => [
                    'class' => 'select2 span12',
                ],
                'options'    => [
                    'label'            => 'Author',
                    'label_attributes' => [
                        'class' => 'filters-label',
                    ],
                    'empty_option'     => '',
                ],
            ],
        ],
        [
            'spec' => [
                'type'       => 'CMS\Form\Element\PathSelect',
                'name'       => 'path',
                'attributes' => [
                    'class' => 'select2 span12',
                ],
                'options'    => [
                    'label'            => 'Path',
                    'label_attributes' => [
                        'class' => 'filters-label',
                    ],
                    'empty_option'     => '',
                ],
            ],
        ],
        [
            'spec' => [
                'type'       => 'CMS\Form\Element\SpecialCategorySelect',
                'name'       => 'page_category_id',
                'attributes' => [
                    'class'            => 'select2 span12',
                    'data-placeholder' => 'Type to filter categories…',
                ],
                'options'    => [
                    'label'            => 'Special Category',
                    'label_attributes' => [
                        'class' => 'filters-label',
                    ],
                    'empty_option'     => '',
                    'page_type'        => 'page',
                    'index_column'     => 'special_cat_id',
                ],
            ],
        ],
        [
            'spec' => [
                'type'    => 'Zend\Form\Element\Checkbox',
                'name'    => 'is_national',
                'options' => [
                    'label'            => 'Is National',
                    'label_attributes' => [
                        'class' => 'control-label',
                    ],
                    'unchecked_value'  => 0,
                    'checked_value'    => 1,
                ],
            ],
        ],
    ],
    'input_filter' => [
        'type'             => 'CMS\InputFilter\InputFilter',
        'term'             => [
            'filters'  => [
                ['name' => 'StringTrim'],
            ],
            'required' => false,
        ],
        'industry'         => [
            'required' => false,
        ],
        'topic'            => [
            'required' => false,
        ],
        'author'           => [
            'required' => false,
        ],
        'path'             => [
            'required' => false,
        ],
        'page_category_id' => [
            'required' => false,
        ],
        'is_national'      => [
            'required' => false,
        ],
    ],
];
