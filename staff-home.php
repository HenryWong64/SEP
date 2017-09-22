<?php
session_start();
include("includes/database.php");
if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["submit"] == "search"){
      $search = $_GET["search"];
    $searchquery = "SELECT * FROM books WHERE
    title LIKE '%$search%' OR 
    author LIKE '%$search%' ";
    $result = $connection->query($searchquery);
    $books = array();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            array_push($books,$row);
        }
    }
}
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
            <form id="book-search" method="get" action="staff-home.php" >
                <label for="search">Search</label>
                <input type="text" name="search" placeholder="Search for a book"
                id="search">
                <button type="submit" name="submit" value="search">Search</button>
            </form>
        </div>
        
        
        <div class="container" id="search-results"></div>
            <?php
            if(count($books) > 0){
                foreach($books as $book){
                    $id = $book["book_id"];
                    $title = $book["title"];
                    $author = $book["author"];
                    $isbn = $book["ISBN"];
                    $available = $book["available"];
                    echo "<div class=\"search-item\">
                            <h4 class=\"title\">$title</h4>
                            <h5 class=\"author\">$author</h5>
                            <p class=\"isbn\">ISBN $isbn</p>
                            <p class=\"available\">$available Copies</p>
                            <a href=\"borrow.php?id=$id\">Borrow this book</a>
                    </div>";
                }
            }
            ?>
        
    </body>
</html>