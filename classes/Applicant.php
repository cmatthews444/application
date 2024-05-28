<?php

/**
 * Applicant class
 *
 * This class represents an applicant with various personal details and methods to access and modify them.
 *
 * @category   Application
 * @package    ApplicantManagement
 * @author     Your Name
 * @version    1.0
 */

class Applicant
{
    private $firstName;
    private $lastName;
    private $email;
    private $state;
    private $phone;
    private $githubLink;
    private $experience;
    private $relocate;
    private $biography;

    /**
     * Constructor for the Applicant class
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
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->state = $state;
        $this->phone = $phone;
        $this->githubLink = $githubLink;
        $this->experience = $experience;
        $this->relocate = $relocate;
        $this->biography = $biography;
    }

    /**
     * Get the first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the first name
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Get the last name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the last name
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Get the email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * Get the state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the state
     *
     * @param string $state
     * @return void
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * Get the phone number
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the phone number
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Get the GitHub link
     *
     * @return string
     */
    public function getGithubLink()
    {
        return $this->githubLink;
    }

    /**
     * Set the GitHub link
     *
     * @param string $githubLink
     * @return void
     */
    public function setGithubLink($githubLink): void
    {
        $this->githubLink = $githubLink;
    }

    /**
     * Get the experience
     *
     * @return string
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set the experience
     *
     * @param string $experience
     * @return void
     */
    public function setExperience($experience): void
    {
        $this->experience = $experience;
    }

    /**
     * Get the relocate preference
     *
     * @return string
     */
    public function getRelocate()
    {
        return $this->relocate;
    }

    /**
     * Set the relocate preference
     *
     * @param string $relocate
     * @return void
     */
    public function setRelocate($relocate): void
    {
        $this->relocate = $relocate;
    }

    /**
     * Get the biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set the biography
     *
     * @param string $biography
     * @return void
     */
    public function setBiography($biography): void
    {
        $this->biography = $biography;
    }
}

?>
