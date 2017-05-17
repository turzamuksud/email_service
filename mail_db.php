<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT mail FROM test";
$result = mysqli_query($conn, $sql);
$serial = 1;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $send=mail($row["mail"],$_POST['name'],$_POST['message'],'From:turzamuksud@gmail.com');
		
		if ($send) {
			echo "Successfully send email..".$serial.'<br>';
		}
		else
		{
			echo "Failed..".$serial.'<br>';
		}
		$serial = $serial + 1;
    }
} 
else {
    echo "0 results";
}

echo "<a href=\"index.html\"><br><br><br>Go Back</a>";

mysqli_close($conn);
?>