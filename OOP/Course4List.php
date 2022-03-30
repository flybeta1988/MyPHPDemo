<?php
class Course4List extends CourseBase
{
    protected $grouping;

    protected $buy_status = 0;

    protected $learnStatus = 0;

    /**
     * @return mixed
     */
    public function getGrouping()
    {
        return $this->grouping;
    }

    /**
     * @param mixed $grouping
     */
    public function setGrouping($grouping): void
    {
        $this->grouping = $grouping;
    }

    /**
     * @return mixed
     */
    public function getBuyStatus()
    {
        return $this->buy_status;
    }

    /**
     * @param mixed $buy_status
     */
    public function setBuyStatus($buy_status): void
    {
        $this->buy_status = $buy_status;
    }

    /**
     * @return mixed
     */
    public function getLearnStatus()
    {
        return $this->learnStatus;
    }

    /**
     * @param mixed $learnStatus
     */
    public function setLearnStatus($learnStatus): void
    {
        $this->learnStatus = $learnStatus;
    }
}