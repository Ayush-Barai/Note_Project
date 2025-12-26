<?php 
// require 'function.php';
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$routs = [
    '/' => 'controllers/index.php',
    '/notes' =>'controllers/notes/index.php',
    '/note' =>'controllers/notes/show.php',
    '/notes/create' =>'controllers/notes/create.php',
    '/contact' =>'controllers/contact.php',
    '/about' =>'controllers/about.php'
];

routeToController($uri , $routs);