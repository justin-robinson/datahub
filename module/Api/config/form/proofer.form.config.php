<?php
return [
    'type'      => 'Api\Form\ProoferForm',
    'elements'  => [
        [
            'spec' => [
                'type'       => 'CMS\Form\Element\PathSelect',
                'name'       => 'paths',
                'attributes' => [
                    'class'    => 'select2-sortable span12',
                    'multiple' => 'multiple',
                ],
                'options'    => [
                    'content_type' => 'story',
                    'required'     => true,
                ],
            ],
        ],
        [
            'spec' => [
                'type'    => 'Zend\Form\Element\Checkbox',
                'name'    => 'redirect_secondary_path',
                'options' => [
                    'label'            => 'Redirect Secondary Paths',
                    'label_attributes' => [
                        'class' => 'control-label',
                    ],
                    'unchecked_value'  => 0,
                    'checked_value'    => 1,
                ],
            ],
        ],
    ],
    'fieldsets' => [
        [
            'spec' => [
                'name'     => 'buckets',
                'type'     => 'CMS\Form\Fieldset',
                'elements' => [
                    [
                        'spec' => [
                            'type'    => 'Zend\Form\Element\Checkbox',
                            'name'    => 'make_national',
                            'options' => [
                                'label'            => 'Make National',
                                'label_attributes' => [
                                    'class' => 'control-label',
                                ],
                                'unchecked_value'  => 0,
                                'checked_value'    => 1,
                            ],
                        ],
                    ],
                    [
                        'spec' => [
                            'type'    => 'Zend\Form\Element\Checkbox',
                            'name'    => 'make_standout',
                            'options' => [
                                'label'            => 'Make Standout',
                                'label_attributes' => [
                                    'class' => 'control-label',
                                ],
                                'unchecked_value'  => 0,
                                'checked_value'    => 1,
                            ],
                        ],
                    ],
                    [
                        'spec' => [
                            'type'    => 'Zend\Form\Element\Checkbox',
                            'name'    => 'main-street',
                            'options' => [
                                'label'            => 'Main Street',
                                'label_attributes' => [
                                    'class' => 'control-label',
                                ],
                                'unchecked_value'  => 0,
                                'checked_value'    => 1,
                            ],
                        ],
                    ],
                    [
                        'spec' => [
                            'type'    => 'Zend\Form\Element\Checkbox',
                            'name'    => 'on-numbers',
                            'options' => [
                                'label'            => 'On Numbers',
                                'label_attributes' => [
                                    'class' => 'control-label',
                                ],
                                'unchecked_value'  => 0,
                                'checked_value'    => 1,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
