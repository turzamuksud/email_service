<html>
   
   <head>
      <title>Add New email</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   
   <body>
      <?php
         if(isset($_POST['delete'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            if(! get_magic_quotes_gpc() ) {
               $id = addslashes ($_POST['id']);
               $em_address = addslashes ($_POST['em_address']);
            }else {
               $id = $_POST['id'];
               $em_address = $_POST['em_address'];
            }
            
            $sql = "DELETE FROM $em_address WHERE id = $id";

            $result = mysqli_query($conn, $sql);
            
            if(! $result) {
               die('Could not delete data..');
               echo "<a href=\"index.html\"><br><br><br>Go Back</a>";
            }
            
            echo "Deleted email address successfully..\n";
            echo "<a href=\"index.html\"><br><br><br>Go Back</a>";
            
            $conn = null;
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                      <tr>
                        <td width = "100">Enter Group Name</td>
                        <td><input name = "em_address" type = "text" 
                           id = "em_address"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>

                     <tr>
                        <td width = "100">Enter id</td>
                        <td><input name = "id" type = "text" 
                           id = "id"></td>
                     </tr>


                      <tr>
                        <td width = "100"></td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "delete" type = "submit" id = "delete" 
                              value = "Delete Email Address">
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