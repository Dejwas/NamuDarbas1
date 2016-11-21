<?php
 $db = mysqli_connect('localhost', 'root', 'root', 'NamuDarbas1') or die('Error connecting to MySQL server.');
?>

<html>
 <body>
  <?php
   $id = $_GET['id'];
   $query = "SELECT * FROM Books WHERE bookId = $id";
   $result = mysqli_query($db, $query) or die('Error querying database.');
   $book_details = mysqli_fetch_array($result);
   echo 'Title: '.$book_details['title'].'<br/>';
   echo 'Year: '.$book_details['year'].'<br/>';
   echo 'Genre: '.$book_details['Genre'].'<br/>';
   $query = "SELECT name FROM Books
             LEFT JOIN BookAuthors ON Books.bookId = BookAuthors.bookId
             LEFT JOIN Authors ON BookAuthors.authorId = Authors.authorId
             WHERE Books.bookId = $id";
   $result = mysqli_query($db, $query) or die('Error querying database.');
   $recordCount = mysqli_num_rows($result);
   if($recordCount > 1)
   { 
      echo 'Authors: ';
      $auth = "";
      while ($authors = mysqli_fetch_array($result))
         $auth .= trim($authors['name'], " ").', '; 
      echo rtrim($auth, ", ").'<br/>';
   } else {
      $authors = mysqli_fetch_array($result);
      echo 'Author: '.$authors['name'].'<br/>';
   }
   mysqli_close($db);
  ?>
  <br/>
  <a href='book_list.php'>Back to list</a>
 </body>
</html>
