<?php
include "Book.php";
?>

<html>
 <body>
  <ul>
   <?php
    $book = new Book("localhost", "root", "root", "NamuDarbas1");
    $bookIds = $book->getAllBookIds();
    foreach($bookIds as $bookId)
    {
       $id = $bookId;
       $book->loadBookById($id);
       echo '<li><a href="book_details.php?id='.$id.'">'.$book->getTitle().'</a></li>';
    }
   ?>
  </ul>
 </body>
</html>
