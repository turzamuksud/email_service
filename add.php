<html>
   
   <head>
      <title>Add New email</title>
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
               $em_addresss = addslashes ($_POST['em_addresss']);
            }else {
               $em_address = $_POST['em_address'];
               $em_addresss = $_POST['em_addresss'];
            }
            
            $sql = "INSERT INTO $em_addresss ". "(mail) ". "VALUES('$em_address')";

            $result = mysqli_query($conn, $sql);
            
            if(! $result) {
               die('Could not enter data..');
               echo "<a href=\"index.html\"><br><br><br>Go Back</a>";
            }
            
            echo "Entered email address successfully..\n";
            echo "<a href=\"index.html\"><br><br><br>Go Back</a>";
            
            mysqli_close($conn);
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                      <tr>
                        <td width = "100">Enter Group Name</td>
                        <td><input name = "em_addresss" type = "text" 
                           id = "em_address"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>

                     <tr>
                        <td width = "100">Enter email Address</td>
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
                              value = "Add Email Address">
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