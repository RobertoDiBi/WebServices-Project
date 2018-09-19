<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 8/4/2018
 * Time: 7:10 PM
 */

class Series
{
    private $id;
    private $title;
    private $description;
    private $numberOfIssues;

    /**
     * @return mixed
     */
    public function getNumberOfIssues()
    {
        return $this->numberOfIssues;
    }

    /**
     * @param mixed $numberOfIssues
     */
    public function setNumberOfIssues($numberOfIssues): void
    {
        $this->numberOfIssues = $numberOfIssues;
    }
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