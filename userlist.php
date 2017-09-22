<?php
session_start();
include("includes/database.php");


    
    $userquery = "SELECT * FROM users";
    $result = $connection->query($userquery);
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["email"],  $row["firstname"],  $row["lastname"],  $row["phonenumber"], $row["confirmation"], "<br>";
    }
    } else {
    echo "0 results";
    }
    
    
    try {
            $con= new PDO('mysql:host=localhost;dbname=dbName', "user", "pwd");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $userquery = "SELECT * FROM users";
          //first pass just gets the column names
          print "<table> n";
          $result = $con->query($userquery);
          //return only the first row (we only need field names)
          $row = $result->fetch(PDO::FETCH_ASSOC);
          print " <tr> n";
          foreach ($row as $field => $value){
           print " <th>$field</th> n";
          } // end foreach
          print " </tr> n";
          //second query gets the data
          $data = $con->query($userquery);
          $data->setFetchMode(PDO::FETCH_ASSOC);
          foreach($data as $row){
           print " <tr> n";
           foreach ($row as $name=>$value){
           print " <td>$value</td> n";
           } // end field loop
           print " </tr> n";
          } // end record loop
          print "</table> n";
          } catch(PDOException $e) {
           echo 'ERROR: ' . $e->getMessage();
  } // end try
    

    
    
  


?>
<!doctype html>

<html>
  <head>
          <meta charset = "UTF-8">
     <title>userlist.php</title>
     <style type = "text/css">table, th, td {border: 1px solid black}</style>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
         <?php include("includes/pageheader.php"); ?>
      
    </body>
</html>