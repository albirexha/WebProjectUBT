<?php
include_once 'DbConn.php';
include_once 'movieModel.php';
class movieMapper
{
    private $movie;
    private $connection;
    public function __construct(\Movie $movie)
    {
        $obj = new DBConnection();
        $this->connection = $obj->getConnection();
        $this->movie = $movie;
    }

    public function Insert(){
        $sql = "INSERT INTO Film (Title,Director,Subject, Category,Image) VALUES (:Title,:Director,:Subject,:Category ,:Image)";

        $title = $this->movie->getTitle();
        $director = $this->movie->getDirector();
        $subject = $this->movie->getSubject();
        $category = $this->movie->getCategory();
        $image = $this->movie->getImage();

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":Title", $title);
        $statement->bindParam(":Director", $director);
        $statement->bindParam(":Subject", $subject);
        $statement->bindParam(":Category", $category);
        $statement->bindParam(":Image", $image);

        try{
            $statement->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }


}