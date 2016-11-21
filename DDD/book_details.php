<?php
 include "BookRepository.php";
?>

<html>
 <body>
  <?php
   $id = $_GET['id'];
   $bookRep = new BookRepository("localhost", "root", "root", "NamuDarbas1");
   $book = $bookRep->getBookById($id);
   echo 'Title: '.$book->getTitle().'<br/>';
   echo 'Year: '.$book->getYear().'<br/>';
   echo 'Genre: '.$book->getGenre().'<br/>';
   $authors = $bookRep->getAuthorsByBookId($id);
   if(count($authors) > 1)
   {
      echo 'Authors: ';
      $auth = "";
      foreach ($authors as $a)
         $auth .= trim($a," ").", ";
      $auth = rtrim($auth,", ");
      echo $auth.'<br/>';
   } else {
      echo 'Author: '.trim($authors[0]," ").'<br/>';
   }
  ?>
  <br/>
  <a href='book_list.php'>Back to list</a>
 </body>
</html>
