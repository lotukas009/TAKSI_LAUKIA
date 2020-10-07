<?php

namespace App\Views\Forms;

use Core\Views\Form;

class RegisterForm extends Form
{

    public function __construct()
    {
        $form = [
            'attr' => [
                'method' => 'POST',
                'class' => 'form-body',
            ],
            'fields' => [
                'name' => [
                    'label' => 'First Name *',
                    'type' => 'text',
                    'value' => '',
                    'validators' =>
                        [
                            'validate_field_not_empty',
                            'validate_field_is_not_number',
                            'validate_field_length' =>
                                [
                                    'max' => 40
                                ],
                        ],
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Enter First Name'
                        ]
                    ]
                ],
                'lastname' => [
                    'label' => 'Last Name *',
                    'type' => 'text',
                    'value' => '',
                    'validators' =>
                        [
                            'validate_field_not_empty',
                            'validate_field_is_not_number',
                            'validate_field_length' =>
                                [
                                    'max' => 40
                                ],
                        ],
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Enter Last Name'
                        ]
                    ]
                ],
                'email' => [
                    'label' => 'Email *',
                    'type' => 'text',
                    'value' => '',
                    'validators' =>
                        [
                            'validate_field_not_empty',
                            'validate_field_email',
                            'validate_email_unique',
                        ],
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Enter Email'
                        ]
                    ]
                ],
                'password' => [
                    'label' => 'Password *',
                    'type' => 'password',
                    'validators' =>
                        [
                            'validate_field_not_empty',
                        ],
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Enter Password',
                        ],
                    ],
                ],
                'tel' => [
                    'label' => 'Tel Number *',
                    'type' => 'tel',
                    'validators' => [
                        ],
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Enter Tel. Number',
                        ],
                    ],
                ],
                'address' => [
                    'label' => 'Home Address *',
                    'type' => 'text',
                    'validators' => [
                    ],
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Enter Home Address',
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'register' => [
                    'title' => 'Register',
                    'extra' => [
                        'attr' => [
                            'class' => 'button',
                        ],
                    ],
                ],
            ],

        ];

        parent::__construct($form);
    }
}