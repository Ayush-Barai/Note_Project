<?php
use core\Database;
use core\App;


$db = App::resolve(Database::class);


$notes = $db->query('SELECT * FROM notes',[])->get();



view("notes/index.view.php" ,[
    'heading'=>'Notes',
    'notes'=> $notes
]);

// dd($db);