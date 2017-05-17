<html>
   
   <head>
      <title>Create Group</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   
   <body>
      <?php
         if(isset($_POST['add'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }



if(! get_magic_quotes_gpc() ) {
               $em_address = addslashes ($_POST['em_address']);
            }else {
               $em_address = $_POST['em_address'];
            }
            
            $sql = "CREATE TABLE $em_address(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				mail VARCHAR(30) NOT NULL
				)";

			$sqll = "INSERT INTO group_list ". "(name) ". "VALUES('$em_address')";

            $result = mysqli_query($conn, $sqll);

				if ($conn->query($sql) === TRUE) {
				    echo "New Group created successfully";
				    echo "<a href=\"index.html\"><br><br><br>Go Back</a>";
				} else {
				    echo "Error creating table: " . $conn->error;
				    echo "<a href=\"index.html\"><br><br><br>Go Back</a>";
				}

           
            mysqli_close($conn);
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Enter New Group Name</td>
                        <td><input name = "em_address" type = "text" 
                           id = "em_address"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Add New Group">
                        </td>
                     </tr>
                  
                  </table>
               </form>
               <h4><a href="index.html"><br><br><br>Go Back</a></h4>
            
            <?php
         }
      ?>
   
   </body>
</html>