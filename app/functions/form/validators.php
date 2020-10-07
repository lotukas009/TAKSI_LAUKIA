<?php

use App\App;

/**
 * * Validates unique users
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_email_unique(string $field_value, &$field)
{

    if (App::$db->getRowsWhere('users', ['email' => $field_value])) {
        $field['error'] = "Email $field_value already exists!";
        return false;
    }
    return true;
}

/**
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_email_registered(string $field_value, array &$field): bool
{
    $user = App::$db->getRowWhere('users', ['email' => $field_value]);

    if ($user) {
        return true;
    } else {
        $field['error'] = 'User does not exist!';
        return false;
    }
}

/**
 * Validates login
 *
 * @param array $form_values
 * @param array $form
 * @return bool
 */

function validate_login(array $form_values, array &$form): bool
{
    $user = App::$db->getRowsWhere('users', ['email' => $form_values['email']]);
    if ($user){
        if (!App::$db->getRowsWhere('users', [
            'password' => $form_values['password']
        ])) {
            $form['error'] = 'Password is incorrect!';
            return false;
        }
        return true;
    }
}





