<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 8/5/2018
 * Time: 12:37 PM
 */

class Comic
{
    private $id;
    private $title;
    private $issueNumber;

    /**
     * @return mixed
     */
    public function getIssueNumber()
    {
        return $this->issueNumber;
    }

    /**
     * @param mixed $issueNumber
     */
    public function setIssueNumber($issueNumber): void
    {
        $this->issueNumber = $issueNumber;
    }
    private $description;
    private $thumbnail;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }
}