<?php

/** My Controller class for the Pets-III project
 *  328/Pets-III/controllers/controller.php
 */
class Controller
{
    private $_f3; // Fat-Free Router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        echo '<h1>Testing</h1>';

        // Render a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function order()
    {
        echo '<h1>Testing</h1>';
        $view = new Template();
        echo $view->render('views/pet-order.html');
    }
}