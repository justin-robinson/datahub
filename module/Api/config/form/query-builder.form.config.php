<?php
return array(
    'elements' => array(
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Hidden',
                'name' => 'market',
            ),
        ),
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'term',
                'attributes' => array(
                    'class' => 'span12',
                ),
                'options' => array(
                    'label' => 'Search Term',
                    'label_attributes' => array(
                        'class' => 'filters-label',
                    ),
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'CMS\Form\Element\IndustrySelect',
                'name' => 'industry',
                'attributes' => array(
                    'class' => 'select2 span12',
                ),
                'options' => array(
                    'label' => 'Industries',
                    'label_attributes' => array(
                        'class' => 'filters-label',
                    ),
                    'empty_option' => '',
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'CMS\Form\Element\TopicSelect',
                'name' => 'topic',
                'attributes' => array(
                    'class' => 'select2 span12',
                ),
                'options' => array(
                    'label' => 'Topics',
                    'label_attributes' => array(
                        'class' => 'filters-label',
                    ),
                    'empty_option' => '',
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'CMS\Form\Element\AuthorSelect',
                'name' => 'author',
                'attributes' => array(
                    'class' => 'select2 span12',
                ),
                'options' => array(
                    'label' => 'Author',
                    'label_attributes' => array(
                        'class' => 'filters-label',
                    ),
                    'empty_option' => '',
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'CMS\Form\Element\PathSelect',
                'name' => 'path',
                'attributes' => array(
                    'class' => 'select2 span12',
                ),
                'options' => array(
                    'label' => 'Path',
                    'label_attributes' => array(
                        'class' => 'filters-label',
                    ),
                    'empty_option' => '',
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'CMS\Form\Element\SpecialCategorySelect',
                'name' => 'page_category_id',
                'attributes' => array(
                    'class' => 'select2 span12',
                    'data-placeholder' => 'Type to filter categories…',
                ),
                'options' => array(
                    'label' => 'Special Category',
                    'label_attributes' => array(
                        'class' => 'filters-label',
                    ),
                    'empty_option' => '',
                    'page_type' => 'page',
                    'index_column' => 'special_cat_id',
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Checkbox',
                'name' => 'is_national',
                'options' => array(
                    'label' => 'Is National',
                    'label_attributes' => array(
                        'class' => 'control-label',
                    ),
                    'unchecked_value' => 0,
                    'checked_value'   => 1,
                ),
            ),
        ),
    ),
    'input_filter' => array(
        'type' => 'CMS\InputFilter\InputFilter',
        'term' => array(
            'filters' => array(
                array('name' => 'StringTrim'),
            ),
            'required' => false,
        ),
        'industry' => array(
            'required' => false,
        ),
        'topic' => array(
            'required' => false,
        ),
        'author' => array(
            'required' => false,
        ),
        'path' => array(
            'required' => false,
        ),
        'page_category_id' => array(
            'required' => false,
        ),
        'is_national' => array(
            'required' => false,
        ),
    ),
);
