<?php

use Core\Database;
use Core\App;


$db = App::resolve(Database::class);


$query = "SELECT * FROM notes WHERE id = :id";
$userId = 1;

$note = $db->query($query, [
    // 'user'=> 1,
    'id' => $_GET["id"],
])->findOrFail();

authorization($note['user_id'] == $userId);


view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'note' => $note,
    'errors' => []
]);