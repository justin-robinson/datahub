<?php
return array(
    'type' => 'Api\Form\ProoferForm',
    'elements' => array(
        array(
            'spec' => array(
                'type' => 'CMS\Form\Element\PathSelect',
                'name' => 'paths',
                'attributes' => array(
                    'class' => 'select2-sortable span12',
                    'multiple' => 'multiple',
                ),
                'options' => array(
                    'content_type' => 'story',
                    'required' => true,
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Checkbox',
                'name' => 'redirect_secondary_path',
                'options' => array(
                    'label' => 'Redirect Secondary Paths',
                    'label_attributes' => array(
                        'class' => 'control-label',
                    ),
                    'unchecked_value' => 0,
                    'checked_value'   => 1,
                ),
            ),
        ),
    ),
    'fieldsets' => array(
        array(
            'spec' => array(
                'name' => 'buckets',
                'type' => 'CMS\Form\Fieldset',
                'elements' => array(
                    array(
                        'spec' => array(
                            'type' => 'Zend\Form\Element\Checkbox',
                            'name' => 'make_national',
                            'options' => array(
                                'label' => 'Make National',
                                'label_attributes' => array(
                                    'class' => 'control-label',
                                ),
                                'unchecked_value' => 0,
                                'checked_value'   => 1,
                            ),
                        ),
                    ),
                    array(
                        'spec' => array(
                            'type' => 'Zend\Form\Element\Checkbox',
                            'name' => 'make_standout',
                            'options' => array(
                                'label' => 'Make Standout',
                                'label_attributes' => array(
                                    'class' => 'control-label',
                                ),
                                'unchecked_value' => 0,
                                'checked_value'   => 1,
                            ),
                        ),
                    ),
                    array(
                        'spec' => array(
                            'type' => 'Zend\Form\Element\Checkbox',
                            'name' => 'main-street',
                            'options' => array(
                                'label' => 'Main Street',
                                'label_attributes' => array(
                                    'class' => 'control-label',
                                ),
                                'unchecked_value' => 0,
                                'checked_value'   => 1,
                            ),
                        ),
                    ),
                    array(
                        'spec' => array(
                            'type' => 'Zend\Form\Element\Checkbox',
                            'name' => 'on-numbers',
                            'options' => array(
                                'label' => 'On Numbers',
                                'label_attributes' => array(
                                    'class' => 'control-label',
                                ),
                                'unchecked_value' => 0,
                                'checked_value'   => 1,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
