<?php

/**
 * Controller class
 *
 * This class handles the routing and logic for various application pages, including home, personal info, experience, job openings, and summary.
 *
 * @category   Application
 * @package    ApplicantManagement
 * @subpackage Controller
 * @version    1.0
 */

class Controller
{
    /**
     * @var mixed $f3 Fat-Free Framework instance
     */
    private $f3;

    /**
     * Constructor for the Controller class
     *
     * @param mixed $f3 Fat-Free Framework instance
     */
    public function __construct($f3)
    {
        $this->f3 = $f3;
    }

    /**
     * Render the home page
     *
     * @return void
     */
    public function home(): void
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * Handle personal information form submission and render the personal info page
     *
     * @return void
     */
    public function personalInfo(): void
    {
        $f3 = $this->f3;
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            if (empty($errors)) {
                $github = '';
                $experience = '';
                $relocate = '';
                $biography = '';

                if ($subscribe) {
                    $applicant = new Applicant_SubscribedToLists($firstName, $lastName, $email, $state, $phone, $github, $experience, $relocate, $biography);
                } else {
                    $applicant = new Applicant($firstName, $lastName, $email, $state, $phone, $github, $experience, $relocate, $biography);
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
        }

        $view = new Template();
        echo $view->render('views/personal-info.html');
    }

    /**
     * Handle experience form submission and render the experience page
     *
     * @return void
     */
    public function experience(): void
    {
        $f3 = $this->f3;

        $f3->set('experienceOptions', ['0-2', '2-4', '4+']);
        $f3->set('relocateOptions', ['yes', 'no', 'maybe']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $githubLink = $_POST['githubLink'] ?? '';
            $experience = $_POST['experience'] ?? '';
            $biography = $_POST['biography'] ?? '';
            $relocate = $_POST['relocate'] ?? '';

            $errors = [];
            if (!validGithub($githubLink)) {
                $errors['github'] = 'Please enter a valid GitHub link';
            }

            if (!validExperience($experience)) {
                $errors['experience'] = 'Please select a valid experience range';
            }

            if (empty($errors)) {
                $applicant = $f3->get('SESSION.applicant');
                $applicant->setGithubLink($githubLink);
                $applicant->setExperience($experience);
                $applicant->setBiography($biography);
                $applicant->setRelocate($relocate);

                $f3->reroute('/summary');
            } else {
                $f3->set('errors', $errors);
            }
        }

        $view = new Template();
        echo $view->render('views/experience.html');
    }

    /**
     * Handle job open form submission and render the job open page
     *
     * @return void
     */
    public function jobOpen(): void
    {
        $f3 = $this->f3;
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

            $f3->reroute('/experience');
        } else {
            $view = new Template();
            echo $view->render('views/job-open.html');
        }
    }

    /**
     * Render the summary page
     *
     * @return void
     */
    public function summary(): void
    {
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}

?>
