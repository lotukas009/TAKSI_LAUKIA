<?php

namespace App\Views\Forms;

use Core\Views\Form;

    class LoginForm extends Form
    {

        public function __construct()
        {

            $form = [
                'attr' => [
                    'method' => 'POST',
                    'class' => 'form-body',
                ],
                'fields' => [
                    'email' => [
                        'label' => 'Email',
                        'type' => 'text',
                        'value' => '',
                        'validators' =>
                            [
                                'validate_field_not_empty',
                                'validate_field_email',
                                'validate_email_registered',
                            ],
                        'extra' => [
                            'attr' => [
                                'class' => 'input-field',
                                'placeholder' => 'Enter Email'
                            ],
                        ],
                    ],
                    'password' => [
                        'label' => 'Password',
                        'type' => 'password',
                        'value' => '',
                        'validators' =>
                            [
                                'validate_field_not_empty',
                            ],
                        'extra' => [
                            'attr' => [
                                'class' => 'input-field',
                                'placeholder' => 'Enter password',
                            ],
                        ],
                    ],
                ],
                'buttons' => [
                    'login' => [
                        'title' => 'Login',
                        'extra' => [
                            'attr' => [
                                'class' => 'button',
                            ],
                        ],
                    ],
                ],
                'validators' => [
                    'validate_login' ,
                ],
            ];

            parent::__construct($form);
        }

    }