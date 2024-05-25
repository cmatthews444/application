<?php

/*
 * Controller for my application project
 *328/application/controller/controller
 */

class Controller
{

    private $f3;

    /**
     * @param $f3
     */
    public function __construct($f3)
    {
        $this->f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personalInfo()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $firstName = $_POST['firstName'] ?? '';
            $lastName = $_POST['lastName'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $state = $_POST['state'] ?? '';
            $subscribe = isset($_POST['subscribe']);

            if (!validName($firstName)) {
                $errors['firstName'] = 'Please enter a valid first name.';
            }

            if (!validName($lastName)) {
                $errors['lastName'] = 'Please enter a valid last name.';
            }

            if (!validEmail($email)) {
                $errors['email'] = 'Please enter a valid email.';
            }

            if (!validPhone($phone)) {
                $errors['phone'] = 'Please enter a valid phone number.';
            }

            if (!subscribe($subscribe)) {
                if ($subscribe) {
                    $Applicant = new Applicant_SubscribedToLists($firstName);

                } else {
                    $Applicant = new Applicant($firstName);
                }
                $f3->set('SESSION.Applicant', $Applicant);
                if ($subscribe) {
                    $f3->reroute('/jop-open');
                } else {
                    $f3->reroute('/experience');
                }
                $view = new Template();
                echo $view->render('views/personal-info.html');

            }

            function experience()
            {
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







            }






            function jobOpen()
            {

            }


//echo "<p>test</p>";


        }

    }




}


?>



