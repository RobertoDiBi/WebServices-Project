<?php
/**
 * Description of superHero
 *
 * @author robertodibiase
 */
class Superhero {
    
    private $id;
    private $name;
    private $description;
    private $image;
    private $comicsAvailable;
    
    function getComicsAvailable() {
        return $this->comicsAvailable;
    }

    function setComicsAvailable($comicsAvailable) {
        $this->comicsAvailable = $comicsAvailable;
    }

        function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setImage($image) {
        $this->image = $image;
    }


}
