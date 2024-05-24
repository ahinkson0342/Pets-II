<?php
// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
require_once('classes/pet.php');
require_once('classes/roboticPet.php');
require_once('classes/stuffedPet.php');


// Instantiate the F3 Base class
$f3 = Base::instance();

// Define a default route
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
        // Get the data from the post array
        $petType = $_POST['petType'];
        $petColor = $_POST['petColor'];

        // If the data is valid
        if (!empty($petType)) {
            // Add the data to the session array
            $f3->set('SESSION.petType', $petType);
            $f3->set('SESSION.petColor', $petColor);

            if($petType == 'robotic'){
                $roboticpet = new RoboticPet($petType, $petColor);
                $f3 -> set('SESSION.pet', $roboticpet);
                $f3->reroute('/robotic');
            } else if ($petType == 'stuffed'){
                $stuffedpet = new StuffedPet($petType, $petColor);
                $f3->set('SESSION.pet', $stuffedpet);
                $f3->reroute('/stuffed');
            }


            // Send the user to the next form
           // $f3->reroute('summary');
        } else {
            // Temporary
            echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";
        }
    }

    // Render a view page
    $view = new Template();
    echo $view->render('views/pet-order.html');
});


//robotic page
$f3->route('GET|POST /robotic', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $acc = $_POST['acc'];

        if (!is_array($acc)) {
            $acc = [$acc];
        }

        $pet = $f3->get('SESSION.pet');

        foreach ($acc as $accessory) {
            $pet->addAcc($accessory);
        }

        $f3->set('SESSION.pet', $pet);
        $f3->reroute('/summary');
    }

    $view = new Template();
    echo $view->render('views/RoboticPet.html');
});



$f3->route('GET|POST /stuffed', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $f3->get('SESSION.pet')->setSize($_POST['size']);
        $f3->get('SESSION.pet')->setMaterial($_POST['material']);
        $f3->get('SESSION.pet')->setStuffingType($_POST['stuffingType']);


        //part of the failed attempts below

        //  $size = $_POST['size'];
       // $material = $_POST['material'];
      //  $stuffingType = $_POST['stuffingType'];
       // $f3->set('SESSION.size', $size);
     //   $f3->set('SESSION.material', $material);
      //  $f3->set('SESSION.stuffingType', $stuffingType);
        $f3->reroute('/summary');
    }

    $view = new Template();
    echo $view->render('views/StuffedPet.html');
});



$f3->route('GET|POST /summary', function($f3) {
    // Render a view page
    $view = new Template();
    echo $view->render('views/summary.html');

    $f3->clear('SESSION');
});

// Run F3
$f3->run();
?>
