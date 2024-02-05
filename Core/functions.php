<?php

use Core\Response;
use Core\Session;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

if (!function_exists('array_key_last')) {
    function array_key_last($array) {
        if (!is_array($array) || empty($array)) {
            return NULL;
        }
        return array_keys($array)[count($array) - 1];
    }
}

function urlIs($value) {
    return in_array(parse_url($_SERVER['REQUEST_URI'])['path'], $value);
    // return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{

    extract($attributes);
    // dd($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}


// Function to read HTML content from a file and replace placeholders with data
function getHtmlContent($filePath, $data)
{
    $htmlContent = file_get_contents($filePath);

    // Replace placeholders with data
    foreach ($data as $key => $value) {
        $placeholder = '{{' . strtoupper($key) . '}}';
        $htmlContent = str_replace($placeholder, $value, $htmlContent);
    }

    return $htmlContent;
}

// Function to generate the next control number
// function generateControlNumber($controlNumber, $counterLength = 4) {

//     // Extract the numeric part after the hyphen
//     $numericPartWithZeros = explode('-', $controlNumber)[1];

//     // Extract the prefix part
//     $prefix = explode('-', $controlNumber)[0];

//     // Remove leading zeros
//     $numericPartWithoutZeros = ltrim($numericPartWithZeros, '0') + 1;
//     // Format the counter with leading zeros
//     $formattedCounter = str_pad($numericPartWithoutZeros, $counterLength, '0', STR_PAD_LEFT);

//     // Combine prefix and formatted counter
//     $controlNumber = $prefix . '-' . $formattedCounter;

//     return $controlNumber;
// }
// Function to generate the next control number
function generateControlNumber($controlNumber = 'Q-0') {

    // Extract the numeric part after the hyphen
    $numericPartWithZeros = (int)explode('-', $controlNumber)[1] + 1;

    // Extract the prefix part
    $prefix = explode('-', $controlNumber)[0];

    // // Remove leading zeros
    // $numericPartWithoutZeros = ltrim($numericPartWithZeros, '0') + 1;
    // // Format the counter with leading zeros
    // $formattedCounter = str_pad($numericPartWithoutZeros, $counterLength, '0', STR_PAD_LEFT);

    // Combine prefix and formatted counter
    $controlNumber = $prefix . '-' . $numericPartWithZeros;

    return $controlNumber;
}