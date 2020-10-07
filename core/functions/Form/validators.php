<?php

/**
 * empty input error message
 *
 * @param $field_value
 * @param $field
 * @return bool or null
 */
function validate_field_not_empty(string $field_value, array &$field)
{
    if ($field_value === '') {
        $field['error'] = 'Field is empty';
        return false;
    } else {
        return true;
    }
}

/**
 *  validate password match
 *
 * @param array $form_values
 * @param array $form
 * @param array $params
 * @return bool
 */
function validate_fields_match(array $form_values, array &$form, array $params): bool
{
    $values = [];
    foreach ($params as $param) {
        $values[] = $form_values[$param];
    }
    if (count(array_unique($values)) === 1) {
        return true;
    } else {
        $form['error'] = 'Password does not mach';
        return false;
    }
}


/**
 * is numeric input error message
 *
 * @param $field_value
 * @param $field
 * @return bool or null
 */
function validate_field_is_not_number(string $field_value, array &$field)
{
    if (!is_numeric($field_value)) {
        return true;
    } else {
        $field['error'] = 'The numbers are not accepted';
        return false;
    }
}

/**
 * validate field symbols length
 *
 * @param string $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_length(string $field_value, array &$field, array $params): bool
{
    if ((strlen($field_value) > $params['max'])) {
        $field['error'] = strtr('Field length is max @to symbols!', [
            '@to' => $params['max']
        ]);
        return false;
    } else {
        return true;
    }
}

/**
 * is email input
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_field_email(string $field_value, array &$field)
{
    if (filter_var($field_value, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        $field['error'] = "Email address is incorrect!";
    }
}

