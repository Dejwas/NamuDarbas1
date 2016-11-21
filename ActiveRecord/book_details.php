<?php
 include "Book.php";
?>

<html>
 <body>
  <?php
   $id = $_GET['id'];
   $book = new Book("localhost", "root", "root", "NamuDarbas1");
   $book->loadBookById($id);
   echo 'Title: '.$book->getTitle().'<br/>';
   echo 'Year: '.$book->getYear().'<br/>';
   echo 'Genre: '.$book->getGenre().'<br/>';
   $authors = $book->getAuthorsByBookId($id);
   if(count($authors) > 1) {
      echo 'Authors: ';
      $auth = "";
      foreach ($authors as $a)
         $auth.= trim($a, " ").", ";
      echo rtrim($auth, ", ").'<br/>';
   } else {
      echo 'Author: '.trim($authors[0], " ").'<br/>';
   }
  ?>
  <br/>
  <a href='book_list.php'>Back to list</a>
 </body>
</html>
