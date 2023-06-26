<?php

use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$query = $_POST['query'];
$errors = [];

if (!Validator::string($name, 1)) {
    $errors['name'] = 'Your name is required';
}

if (!Validator::email($email, 1, 1000)) {
    $errors['email'] = 'You must enter a valid email address';
}

if (!Validator::string($tel,1)) {
    $errors['tel'] = 'Your contact number is required';
}

if (!empty($errors)) {
    return view('index.view.php', [
        'heading' => 'Home',
        'errors' => $errors,
        'message' => 'Fail'
    ]);
}

$message = sendmail($name, $tel, $email, $query);
return view('index.view.php', [
    'heading' => 'Home',
    'message' => $message
]);
