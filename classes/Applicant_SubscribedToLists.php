<?php

/**
 * Applicant_SubscribedToLists class
 *
 * This class extends the Applicant class to include selections for jobs and verticals.
 *
 * @category   Application
 * @package    ApplicantManagement
 * @subpackage SubscribedToLists
 * @author     Your Name
 * @version    1.0
 */

class Applicant_SubscribedToLists extends Applicant
{
    /**
     * @var array $selectionsJobs List of selected jobs
     */
    private $selectionsJobs = [];

    /**
     * @var array $selectionsVerticals List of selected verticals
     */
    private $selectionsVerticals = [];

    /**
     * Constructor for the Applicant_SubscribedToLists class
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $state
     * @param string $phone
     * @param string $githubLink
     * @param string $experience
     * @param string $relocate
     * @param string $biography
     */
    public function __construct(
        $firstName,
        $lastName,
        $email,
        $state,
        $phone,
        $githubLink,
        $experience,
        $relocate,
        $biography
    ) {
        parent::__construct($firstName, $lastName, $email, $state, $phone, $githubLink, $experience, $relocate, $biography);
    }

    /**
     * Get the list of selected jobs
     *
     * @return array
     */
    public function getSelectionsJobs()
    {
        return $this->selectionsJobs;
    }

    /**
     * Set the list of selected jobs
     *
     * @param array $selectionsJobs
     * @return void
     */
    public function setSelectionsJobs($selectionsJobs): void
    {
        $this->selectionsJobs = $selectionsJobs;
    }

    /**
     * Get the list of selected verticals
     *
     * @return array
     */
    public function getSelectionsVerticals()
    {
        return $this->selectionsVerticals;
    }

    /**
     * Set the list of selected verticals
     *
     * @param array $selectionsVerticals
     * @return void
     */
    public function setSelectionsVerticals($selectionsVerticals): void
    {
        $this->selectionsVerticals = $selectionsVerticals;
    }
}

?>
