<?php

use JetBrains\PhpStorm\NoReturn;

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    return require base_path('views/' . $path);
}

#[NoReturn] function redirect($location = '/'): void
{
    header("location: {$location}");
    exit();
}

function abort($code = 404)
{
    http_response_code($code);
    return require base_path('Http/controllers/' . $code . '.php');
}

function sendmail($name, $tel, $email, $query): string
{
    $subject = "Website Contact from {$name} : {$tel}";
    $headers = "From: contact@rbmobilepattesting.co.uk" . "\r\n" .
        "Reply-To: <{$email}>";
    $message = '';
    try {
        mail('<william.mccloy@googlemail.com>', $subject, $query, $headers);
        $message = 'Your contact request has been sent.';
    } catch (Exception $e) {
        $message = "Your contact request failed - error {$e->getMessage()}";
    }
    return $message;
//    mail('william.mccloy@gmail.com', 'Hello', 'This is my message', ['From'=>'will@test.com']);
}

#[NoReturn] function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

