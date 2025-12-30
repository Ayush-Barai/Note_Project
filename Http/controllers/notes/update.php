<?php

use Core\Validator;
use Core\Database;
use Core\App;


$db = App::resolve(Database::class);


$query = "SELECT * FROM notes WHERE id = :id";
$userId = 1;


$note = $db->query($query, [
    // 'user'=> 1,
    'id' => $_POST["id"],
])->findOrFail();



authorization($note['user_id'] == $userId);

$errors = [];


if (!Validator::string($_POST['body'], 1, 100000)) {
    $errors['body'] = 'A body can not be more than 10000 characters !!';
}

if (count($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit note',
        'errors' => $errors,
        'note' => $note
    ]);
}


$db->query(
    'UPDATE notes SET body = :body WHERE id = :id',
    [
        'body' => $_POST['body'],
        'id' => $_POST['id']
    ]
);

header('location: /notes');

exit();
