<?php


use core\Database;
use core\App;

$db = App::resolve(Database::class);



$query = "SELECT * FROM notes WHERE id = :id";
$userId = 1;

$note = $db->query($query, [
    // 'user'=> 1,
    'id' => $_GET["id"],
])->findOrFail();

authorization($note['user_id'] == $userId);


view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
