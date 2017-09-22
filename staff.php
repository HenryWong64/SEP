<?php 
session_start();
include("includes/database.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $useremail = $_POST["email"];
    $userpass = $_POST["password"];
    //echo $useremail." ".$userpass;
    
    
    //check with the user table
    $user_query = "SELECT * FROM users WHERE email = '$useremail'";
    $user_result = $connection->query($user_query);
    if($user_result-> num_rows > 0){
        //echo "account exists";
        $row = $user_result->fetch_assoc();
        $id = $row["id"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $phone = $row["phonenumber"];
        $hashed_password = $row["password"];
        
        if(!password_verify($userpass,$hashed_password)){
            $errors["credentials"] = "Incorrect Username/Password";  
        }
        else{
            echo "Welcome $firstname $lastname";
            
           $_SESSION["id"] = $id;
           /* $_SESSION["username"] =$username;
            if($admin==1){
            $_SESSION["admin"] = 1;
      }*/
        }
            
    }
    
    else{
        $errors["credentials"] = "No account registerd with supplied credentials";
        
    }
    
    
}

?>
<!doctype html>
<html>
    <head>
        <title></title>
        <link href = "style.css" rel="stylesheet">
    </head>
    <body>
        <?php include("includes/pageheader.php")?>
        <div class ="container">
            <form id ="login-form" action = "staff.php" method ="post">
                <label for ="email">Your Email</label>
                <input id ="email" type ="email" name ="email" placeholder ="name@domain.com">
                <label for="password">Password</label>
                <input id="password" type="password" name ="password" placeholder="password">
                <button type="submit" name="login">Login</button>
            </form>
            
        </div>
        
    </body>
</html>