<?php
 include "BookRepository.php";
?>

<html>
 <body>
  <ul>
   <?php
    $bookrep = new BookRepository("localhost", "root", "root", "NamuDarbas1");
    $books = $bookrep->getAllBooks();
    foreach($books as $b)
    {
       $id = $b->getBookId();
       echo '<li><a href="book_details.php?id='.$id.'">'.$b->getTitle().'</a></li>';
    }
   ?>
  </ul>
 </body>
</html>
