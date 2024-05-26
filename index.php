<?php
// index.php
// Colton Matthews
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');
//test
$f3 = Base::instance();
include 'model/validate.php';

$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

$f3->route('GET /personal-info', function() {
    $GLOBALS['con']->personalInfo();
});

$f3->route('GET /job-open', function() {
    $GLOBALS['con']->jobOpen();
});

$f3->route('GET /experience', function() {
    $GLOBALS['con']->experience();
});


$f3->route('GET /summary', function() {
    $GLOBALS['con']->summary();
});







// Define route for home
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

// Route for personal info
$f3->route('GET|POST /personal-info', function($f3) {
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $state = $_POST['state'] ?? '';
//
//        if (!validName($firstName)) {
//            $errors['firstName'] = 'Please enter a valid first name.';
//        }
//
//        if (!validName($lastName)) {
//            $errors['lastName'] = 'Please enter a valid last name.';
//        }
//
//        if (!validEmail($email)) {
//            $errors['email'] = 'Please enter a valid email.';
//        }
//
//        if (!validPhone($phone)) {
//            $errors['phone'] = 'Please enter a valid phone number.';
//        }

        if (empty($errors)) {
            $f3->set('SESSION.firstName', $firstName);
            $f3->set('SESSION.lastName', $lastName);
            $f3->set('SESSION.email', $email);
            $f3->set('SESSION.state', $state);
            $f3->set('SESSION.phone', $phone);

            $f3->reroute('/experience');
        } else {
            $f3->set('errors', $errors);
        }
    }

    $view = new Template();
    echo $view->render('views/personal-info.html');
});

// Route for experience page
$f3->route('GET|POST /experience', function($f3) {
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $githubLink = $_POST['githubLink'] ?? '';
        $experience = $_POST['experience'] ?? '';
        $biography = $_POST['biography'] ?? '';
        $relocate = $_POST['relocate'] ?? '';
        $f3->set('experienceOptions', ['0-2', '2-4', '4+']);
        $f3->set('relocateOptions', ['yes', 'no', 'maybe']);

        if (!validGithub($githubLink)) {
            $errors['github'] = 'Please enter a valid GitHub link';
        }

        if (!validExperience($experience)) {
            $errors['experience'] = 'Please select a valid experience range';
        }
//
//        if (empty($errors)) {
//            $f3->set('SESSION.githubLink', $githubLink);
//            $f3->set('SESSION.experience', $experience);
//            $f3->set('SESSION.biography', $biography);
//            $f3->set('SESSION.relocate', $relocate);
//
//            $f3->reroute('job-open');
//        } else {
//            $f3->set('errors', $errors);
//        }
    }

    $view = new Template();
    echo $view->render('views/experience.html');
});

// Route for job-open page
$f3->route('GET|POST /job-open', function($f3) {
    $f3->set('techOptions', ['JavaScript', 'PHP', 'HTML', 'CSS', 'Java', 'ReactJS', 'Python', 'NodeJS']);
    $f3->set('industryOptions', ['SaaS', 'Health tech', 'Industrial tech', 'Cybersecurity', 'Ag tech', 'HR tech']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $techs = $_POST['techs'] ?? [];
        $industries = $_POST['industries'] ?? [];

        $f3->set('SESSION.techSelections', $techs);
        $f3->set('SESSION.industrySelections', $industries);

        $f3->reroute('/summary');
    } else {
        // Render the form page
        $view = new Template();
        echo $view->render('views/job-open.html');
    }
});


// Order Summary
$f3->route('GET /summary', function($f3) {
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Keep at bottom
$f3->run();
?>
