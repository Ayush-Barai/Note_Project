<?php

use core\App;
use core\Database;
use core\Validator;


$db = App::resolve(Database::class);

$errors = [];


if (!Validator::string($_POST['body'], 1, 100000)) {
    $errors['body'] = 'A body can not be more than 10000 characters !!';
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create note',
        'errors' => $errors
    ]);
}

if (empty($errors)) {
    $db->query("INSERT INTO `notes` (`body`, `user_id`) VALUES(:body, :user_id)", [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);

    header('location: /notes');
    exit();
}
