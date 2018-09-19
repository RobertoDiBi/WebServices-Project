<?php
/**
 * Description of Video
 *
 * @author robertodibiase
 */
class Video {
    private $id;
    private $title;
    private $description;
    private $videoLink;
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getVideoLink() {
        return $this->videoLink;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setVideoLink($videoLink) {
        $this->videoLink = $videoLink;
    }


}
