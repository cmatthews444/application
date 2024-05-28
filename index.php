<?php
// index.php
// Colton Matthews
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');

$f3 = Base::instance();
include 'model/validate.php';

// Instantiate the controller
$GLOBALS['con'] = new Controller($f3);

$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

$f3->route('GET|POST /personal-info', function() {
    $GLOBALS['con']->personalInfo();
});

$f3->route('GET|POST /job-open', function() {
    $GLOBALS['con']->jobOpen();
});

$f3->route('GET|POST /experience', function() {
    $GLOBALS['con']->experience();
});



$f3->route('GET|POST /summary', function() {
    $GLOBALS['con']->summary();
});

// Run the application
$f3->run();
?>
