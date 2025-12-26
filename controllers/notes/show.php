<?php


$heading = "Note";
$config = require('config.php');

$id = $_GET["id"];
$query = "SELECT * FROM notes WHERE id = :id";
// dd( $query );

$db = new Database($config['databases']);
// $res = $db->query($query , [':id'=>$id]);
// dd( $res );

$note = $db->query($query,[
    // 'user'=> 1,
    'id' => $id
    ])->findOrFail();

if(!$note){
    abort();
}

$userId = 1;

authorization($note['user_id'] == $userId );


require 'views/notes/show.view.php';

// dd($db);