<?php
session_start();


// This is my CONTROLLER!

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate the F3 Base class
$f3 = Base::instance();
$con = new Controller($f3);

// Define a default route
// https://tostrander.greenriverdev.com/328/hello-fat-free/
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

$f3->route('GET /home', function() {
    $GLOBALS['con']->home();
});

$f3->route('GET /order', function() {
    $GLOBALS['con']->order();
});

$f3->route('GET /RoboticPet', function() {
    $GLOBALS['con']->roboticPet();
});

$f3->route('GET /StuffedPet', function() {
    $GLOBALS['con']->stuffedPet();
});

// Run Fat-Free
$f3->run();