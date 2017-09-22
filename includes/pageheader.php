<?php
$currentpage = basename($_SERVER["PHP_SELF"]);


if(isset($_SESSION["id"])){
    
    $navitems = array(
                    
                    "home"=>"staff-home.php",
                    "logout"=>"logout.php",
                    "add user"=>"register.php",
                    "user list"=>"userlist.php",
                    "add book"=>"addbook.php",
                    "book list"=> "booklist.php");
                    
                    
                         
    }
    
if(!isset($_SESSION["id"])){
    
    $navitems = array(
                    "home"=>"index.php",
                    "login"=>"staff.php");
                    
                         
    }

?>

<html>
    <body>
        <div class="container">
        <header>
            <a class="logo" href="index.php">
                <h1>Library</h1>
            </a>
            <nav class="navigation">
                <ul>
                    <?php
                    
                    foreach($navitems as $name=>$link){
                        if($link == $currentpage){
                            $class= "active";
                        }
                        else{
                            $class="";
                        }
                        echo "<li class=\"$class\"><a href=\"$link\">$name</a></li>";
                    }
                    ?>
                   <!-- <li><a href="index.php">Home</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="logout.php">Logout</a></li>-->
                    
                </ul>
            </nav>
            
            
    </header>
    </div>
    </body>
    
</html>