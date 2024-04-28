<!-----------------------Github repo: https://github.com/ahinkson0342/Pets-II---------------------->
<?php

//turning on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Create instance of base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /',function()
{
    //echo '<h1>Hello World!</h1>';

    //Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /home',function()
{
    //echo '<h1>Hello World!</h1>';

    //Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /order',function()
{
    //echo '<h1>Hello World!</h1>';

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //echo "<p>You got here using the POST method</p>";
        //var_dump ($_POST);

        // Get the data from the post array
        $petType = $_POST['petType'];
        $petColor = $_POST['petColor'];

        // If the data valid
        if (isset($petType) && isset($petColor)) {

            // Add the data to the session array
            $f3->set('SESSION.petType', $petType);
            $f3->set('SESSION.petColor', $petColor);

            // Send the user to the next form
            $f3->reroute('next');
        }
        else {
            // Temporary
            echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";

        }
    }

    //Render a view page
    $view = new Template();
    echo $view->render('views/pet-order.html');
});

//Run fat-free
$f3->Run();