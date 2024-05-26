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

    $f3 = $this->f3;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $firstName = $_POST['firstName'] ?? '';
            $lastName = $_POST['lastName'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $state = $_POST['state'] ?? '';
            $subscribe = isset($_POST['subscribe']);
            $errors = [];
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
                    $Applicant = new Applicant_SubscribedToLists($firstName, $lastName, $email, $phone, $state);

                } else {
                    $Applicant = new Applicant($firstName, $lastName, $email, $phone, $state);
                }
                $f3->set('SESSION.Applicant', $Applicant);
                if ($subscribe) {
                    $f3->reroute('/jop-open');
                } else {
                    $f3->reroute('/experience');
                }


            }

            if (empty($errors)) {
                if ($subscribe) {
                    $applicant = new Applicant_SubscribedToLists($firstName, $lastName, $email, $phone, $state);
                } else {
                    $applicant = new Applicant($firstName, $lastName, $email, $phone, $state);
                }
                $f3->set('SESSION.applicant', $applicant);
                if ($subscribe) {
                    $f3->reroute('/job-open');
                } else {
                    $f3->reroute('/experience');
                }
            } else {
                $f3->set('errors', $errors);
            }
            $view = new Template();
            echo $view->render('views/personal-info.html');
        }



            function experience()
            {
                $f3 = $this->f3;

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

      $errors = [];
            if (!validGithub($githubLink)) {
                $errors['github'] = 'Please enter a valid GitHub link';
            }

            if (!validExperience($experience)) {
                $errors['experience'] = 'Please select a valid experience range';
            }

            if (empty($errors)) {
                $applicant = $f3->get('SESSION.applicant');
                $applicant->setGithub($githubLink);
                $applicant->setExperience($experience);
                $applicant->setBio($biography);
                $applicant->setRelocate($relocate);

                $f3->reroute('job-open');
            } else {
                $f3->set('errors', $errors);
            }
        }


    $view = new Template();
    echo $view->render('views/experience.html');





    }





            function jobOpen(){
     $f3->set('techOptions', ['JavaScript', 'PHP', 'HTML', 'CSS', 'Java', 'ReactJS', 'Python', 'NodeJS']);
        $f3->set('industryOptions', ['SaaS', 'Health tech', 'Industrial tech', 'Cybersecurity', 'Ag tech', 'HR tech']);


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $techs = $_POST['techs'] ?? [];
            $industries = $_POST['industries'] ?? [];


            $applicant = $f3->get('SESSION.applicant');
            if ($applicant instanceof Applicant_SubscribedToLists) {
                $applicant->setSelectionsJobs($techs);
                $applicant->setSelectionsVerticals($industries);
            }

            $f3->reroute('/summary');
        } else {
            $view = new Template();
            echo $view->render('views/job-open.html');
        }
    }

    function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');

    }







}


?>



