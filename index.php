<?php
//controller/
//328

ini_set('display_errors',1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');

$f3 = Base::instance();


//deine rout
$f3->route('GET /', function (){
    //echo '<h1> Application </h1>';
    //render view page
    $view = new Template();
   echo $view->render('views/home.html');
});

$f3->route('GET|POST /personal-info', function ($f3){
   // echo '<h1>personal info</h1>';
if ($_SERVER['REQUEST_METHOD'] == "POST"){




}
    $view = new Template();
    echo $view->render('views/personal-info.html');

});


















// keep at bottom
$f3->run();