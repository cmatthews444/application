<?php
//controller/
//328

ini_set('display_errors',1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');

$f3 = Base::instance();


//deine rout
$f3->route('GET /', function (){
    //echo '<h1> Pet home </h1>';
    //render view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->run();