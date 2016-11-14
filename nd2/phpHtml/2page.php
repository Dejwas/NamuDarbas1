<body>
 <?php
	$id = intval($_GET['id']);
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "NamuDarbas1";

	try {
	    $conn = new mysqli($servername,$username,$password,$dbname);
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}

	$sql = "SELECT title,year,Genre from Books WHERE bookId = $id";
	$result = $conn->query($sql);
	$sql1 = "Select Authors.name from Authors LEFT JOIN BookAuthors ON Authors.authorId = BookAuthors.authorId WHERE BookAuthors.bookId = $id";
	$result1 = $conn->query($sql1);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
		echo "Title:".$row["title"]."<br>";
		echo "Year:".$row["year"]."<br>";
		echo "Genre:".$row["Genre"]."<br>";
	    }
	} else {
	    echo "0 results";
	}
	if ($result1->num_rows > 0) {
		echo "Authors:";
	    	while($row = $result1->fetch_assoc()) {
			echo $row["name"].",";
	    }
	} else {
	    echo "0 results";
	}

	$conn->close();
?>
</body>

