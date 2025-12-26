<?php

$heading = "Notes";
$config = require('config.php');

// $id = $_GET["id"];
// $query = "SELECT * FROM posts WHERE id = :id";
// dd( $query );

$db = new Database($config['databases']);
// $res = $db->query($query , [':id'=>$id]);
// dd( $res );

$notes = $db->query('SELECT * FROM notes',[])->get();


require 'views/notes/index.view.php';

// dd($db);