<?php

class Applicant_SubscribedToLists extends Applicant{
    private array $selectionsJobs = [];
    private array $selectionsVerticals = [];

    /**
     * @param array $selectionsJobs
     * @param array $selectionsVerticals
     */
    public function __construct(array $selectionsJobs, array $selectionsVerticals)
    {
        $this->selectionsJobs = $selectionsJobs;
        $this->selectionsVerticals = $selectionsVerticals;
    }

    public function getSelectionsJobs(): array
    {
        return $this->selectionsJobs;
    }

    public function setSelectionsJobs(array $selectionsJobs)
    {
        $this->selectionsJobs = $selectionsJobs;
    }

    public function getSelectionsVerticals(): array
    {
        return $this->selectionsVerticals;
    }

    public function setSelectionsVerticals(array $selectionsVerticals)
    {
        $this->selectionsVerticals = $selectionsVerticals;
    }




}
{

}









?>