<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT mail FROM test";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $send=mail($row["mail"],'test','successful','From:turzamuksud@gmail.com');
		
		if ($send) {
			echo "Done..";
		}
		else
		{
			echo "Failed..";
		}
    }
} 
else {
    echo "0 results";
}

mysqli_close($conn);
?>