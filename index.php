<?php
session_start();

// 328/diner/index.php
// This is my CONTROLLER!

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate the F3 Base class
$f3 = Base::instance();

// Define a default route
// https://tostrander.greenriverdev.com/328/hello-fat-free/
$f3->route('GET /', function() {

    // Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /home', function() {

    // Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /order', function($f3) {

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //echo "<p>You got here using the POST method</p>";
        //var_dump ($_POST);

        // Get the data from the post array
        $petType = $_POST['petType'];
        $petColor = $_POST['petColor'];

        // If the data valid
        if (!empty($petType)) {

            // Add the data to the session array
            $f3->set('SESSION.petType', $petType);
            $f3->set('SESSION.petColor', $petColor);

            // Send the user to the next form
            $f3->reroute('summary');
        }
        else {
            // Temporary
            echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";

        }
    }

    // Render a view page
    $view = new Template();
    echo $view->render('views/pet-order.html');
});

$f3->route('GET|POST /summary', function($f3) {


    // Render a view page
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();