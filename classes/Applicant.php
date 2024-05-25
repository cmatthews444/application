<?php

/**
 *  Applicant class
 */

class Applicant {
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
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $state
     * @param $phone
     * @param $githubLink
     * @param $experience
     * @param $relocate
     * @param $biography
     */
    public function __construct($firstName, $lastName, $email, $state, $phone, $githubLink, $experience, $relocate, $biography)
    {
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
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getGithubLink()
    {
        return $this->githubLink;
    }

    /**
     * @param mixed $githubLink
     */
    public function setGithubLink($githubLink): void
    {
        $this->githubLink = $githubLink;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getRelocate()
    {
        return $this->relocate;
    }

    /**
     * @param mixed $relocate
     */
    public function setRelocate($relocate): void
    {
        $this->relocate = $relocate;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param mixed $biography
     */
    public function setBiography($biography): void
    {
        $this->biography = $biography;
    }




}










?>