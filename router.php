<?php 
// require 'function.php';
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$routs = [
    '/' => 'controllers/index.php',
    '/notes' =>'controllers/notes.php',
    '/note' =>'controllers/note.php',
    '/notes/create' =>'controllers/notes-create.php',
    '/contact' =>'controllers/contact.php',
    '/about' =>'controllers/about.php'
];

routeToController($uri , $routs);