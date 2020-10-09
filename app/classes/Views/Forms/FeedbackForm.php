<?php

namespace App\Views\Forms;

use Core\Views\Form;

class FeedbackForm extends Form
{
    public function __construct()
    {

        $form = [
            'attr' => [
                'method' => 'POST',
                'class' => 'form-body2',
            ],
            'fields' => [
                'feedback' => [
                    'label' => 'This is a comment',
                    'type' => 'textarea',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_length' =>
                            [
                                'max' => 500,
                            ],
                    ],
                    'extra' => [
                        'attr' => [
                            'rows' => 6,
                            'cols' => 50,
                            'class' => 'feedbackinput-field',
                            'placeholder' => 'Thank you for commenting'
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'sumbit' => [
                    'title' => 'Sumbit',
                    'extra' => [
                        'attr' => [
                            'class' => 'button',
                        ],
                    ],
                ],
            ],
            'validators' => [
            ],
        ];

        parent::__construct($form);
    }
}