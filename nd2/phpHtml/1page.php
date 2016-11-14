<body>
 <?php
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

	$sql = "SELECT title FROM Books";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
		echo $row["title"]."<br>";
	    }
	} else {
	    echo "0 results";
	}

	$conn->close();
?>
</body>

