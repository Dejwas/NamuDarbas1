<?php

class Book
{
    private $hostName;
    private $userName;
    private $psw;
    private $dbName;
    private $bookId;
    private $title;
    private $year;
    private $genre;

    public function __construct($hostName, $userName, $psw, $dbName)
    {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->psw = $psw;
        $this->dbName = $dbName;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    public function loadBookById($id)
    {
        $db = mysqli_connect($this->hostName, $this->userName, $this->psw, $this->dbName) or die('Error connecting to MySQL server.');
        $query = "SELECT * FROM Books WHERE bookId = $id";
        $result = mysqli_query($db, $query) or die('Error querying database.');
        $row = mysqli_fetch_array($result);
        $this->setBookId($row['bookId']);
        $this->setYear($row['year']);
        $this->setTitle($row['title']);
        $this->setGenre($row['Genre']);
        mysqli_close($db);
    }

    public function getAllBookIds()
    {
        $db = mysqli_connect($this->hostName, $this->userName, $this->psw, $this->dbName) or die('Error connecting to MySQL server.');
        $query = "SELECT bookId FROM Books";
        $result = mysqli_query($db, $query) or die('Error querying database.');
        $ids = array();
        while($row = mysqli_fetch_array($result))
            $ids[] = $row['bookId'];
        mysqli_close($db);
        return $ids;
    }

    public function getAuthorsByBookId($bookId)
    {
        $db = mysqli_connect($this->hostName, $this->userName, $this->psw, $this->dbName) or die('Error connecting to MySQL server.');
        $query = "SELECT * FROM Books 
		  LEFT JOIN BookAuthors ON Books.bookId = BookAuthors.bookId 
		  LEFT JOIN Authors ON BookAuthors.authorId = Authors.authorId 
  		  WHERE Books.bookId = $bookId";
        $result = mysqli_query($db, $query) or die('Error querying database.');
        $authors = array();
        while($row = mysqli_fetch_array($result))
            $authors[] = $row['name'];
        mysqli_close($db);
        return $authors;
    }
}
