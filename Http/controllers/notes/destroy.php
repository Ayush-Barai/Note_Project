<?php

use core\Database;
use core\App;


$db = App::resolve(Database::class);


$query = "SELECT * FROM notes WHERE id = :id";
$userId = 1;

// form was submited delete the current note
$note = $db->query($query,[
    // 'user'=> 1,
    'id' => $_POST["id"],
    ])->findOrFail();

authorization($note['user_id'] == $userId );

$db->query('DELETE FROM notes WHERE id = :id', ['id' => $_POST['id']]);

header('location: /notes');

exit();
