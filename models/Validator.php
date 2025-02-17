<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Rakit\Validation\Validator;

/**
 * Validate all fields in the form.
 *
 * This function validates client data using the Rakit\Validation library.
 * It checks if the data meets the specified rules and returns an array of errors
 * or a success message.
 *
 * @param array $data All client's data to validate.
 * @return array An array containing either validation errors or a success message.
 */
function validateData(array $data): array
{
    $validator = new Validator();
    $rules = [
        'firstName' => 'required|min:2|max:256',
        'lastName' => 'required|min:2|max:256',
        'firstSurname' => 'required|min:2|max:256',
        'secondSurname' => 'required|min:2|max:256',
        'companyName' => 'required|min:1|max:256',
        'rol' => 'required|min:2|max:100',
        'email' => 'required|email',
        'phone' => 'required|numeric',
    ];

    $validation = $validator->validate($data, $rules);

    if ($validation->fails()) {
        return ['errors' => $validation->errors()->toArray()];
    }
    return ['success' => true];
}

/**
 * Sanitize a string field.
 *
 * This function sanitizes a string field by trimming whitespace and optionally
 * stripping HTML tags and converting special characters to HTML entities.
 *
 * @param string $field The field to sanitize.
 * @param bool $flag Determines whether to apply strict sanitization (strip tags and HTML entities).
 * @return string The sanitized string.
 */
function sanitizeString(string $field, bool $flag = true): string
{
    if ($flag) {
        $cleaned = trim($field);
    } else {
        $cleaned = trim(strip_tags(htmlspecialchars($field)));
    }
    return $cleaned;
}

/**
 * Apply sanitization to the received data if it is of string type.
 *
 * This function sanitizes client data, ensuring that all string fields are properly cleaned.
 * If the data contains a nested array of clients, it sanitizes each client's data individually.
 *
 * @param array $data Client's data to sanitize.
 * @return array The sanitized data.
 */
function getSanitizeData(array $data): array
{
    $sanitizedArray = array();
    if (isset($data['clients'])) {
        $clients = $data['clients'];
        foreach ($clients as $client) {
            $sanitizedClient = array();
            foreach ($client as $key => $value) {
                if (is_string($value)) {
                    $sanitizedClient[$key] = sanitizeString($value, false);
                } else {
                    $sanitizedClient[$key] = $value;
                }
            }
            $sanitizedArray[] = $sanitizedClient;
        }
    } else {
        $sanitizedArray = array_map('sanitizeString', $data);
    }
    return $sanitizedArray;
}