<?php
class Movie{

    private $movie_ID;
    private $title;
    private $director;
    private $subject;
    private $category;
    private $image;

    public function __construct($title, $director, $subject, $category,$image){
        $this->title = $title;
        $this->director = $director;
        $this->subject = $subject;
        $this->category = $category;
        $this->image = $image;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDirector(){
        return $this->director;
    }

    public function getSubject(){
        return $this->subject;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getImage(){
        return $this->image;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setDirector($director){
        $this->director = $director;
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function setImage($image){
        $this->image = $image;
    }
}

?>
