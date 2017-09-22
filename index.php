<?php
session_start();
include("includes/database.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Index</title>
    </head>
    <body>
         <?php include("includes/pageheader.php"); ?>
        
        <div class="container">
            <form id="book-search" method="get" action="index.php" >
                <label for="search">Search</label>
                <input type="text" name="search" placeholder="Search for a book"
                id="search">
                <button type="submit" name="submit" value="search">Search</button>
            </form>
        </div>
        
    </body>
</html>