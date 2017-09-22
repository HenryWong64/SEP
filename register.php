<?php
session_start();
include("includes/database.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phonenumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $errors= array();
    
    if(strlen($firstname) > 32 || (strlen($firstname) < 4)){
        $errors["firstname"] = "too long";
    }
    
    if(strlen($lastname)> 32 || (strlen($lastname) < 4)){
        $errors["lastname"] = "too long";
    }
    
  
    
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $errors["email"] = "invalid email address";
   }
   
   if(strlen($password) < 8 ){
       $errors["password"] = "Minimum 8 characters";
   }
   
   if(count($errors)==0){
       $firstname = filter_var($firstname,FILTER_SANITIZE_STRING);
       $lastname = filter_var($lastname,FILTER_SANITIZE_STRING);
       $phone = filter_var($phone,FILTER_SANITIZE_STRING);
       $email = filter_var($email,FILTER_SANITIZE_EMAIL);
       $password = password_hash($password,PASSWORD_DEFAULT);
       
       $query = "INSERT INTO users 
       (firstname, lastname, phonenumber, email, created, confirmation, password)
       VALUES
       ('$firstname','$lastname','$phone','$email',NOW(),1, '$password')";
       
       if(!$connection->query($query)){
         
         echo "Invalid data entered";
         echo "<br>";
         
        if($connection->errno == "1062"){
        echo "email or username already used";
        }
        
        else{
             echo "database error";
        }
       
     }else{
         echo "Success";
     }
   }
}



?>

<!doctype html>
<html>
    <head>
        <title>Register</title>
        <link href ="style.css" rel="stylesheet">
    </head>
    <body>
        <?php include("includes/pageheader.php")?>
        <br>
        <div class="container1">
         <form method = "post" action ="register.php" id ="register">
             <h1>Register A User</h1>
            <span class="errors"><?php echo $errors["database"];?></span>
            
            <label for="firstname">First Name</label>    
            <input required type ="text" name = "firstname" placeholder ="John" maxlength="32" value ="<?php echo $firstname;?>">
            <span class="errors">
                <?php echo $errors["firstname"];?>
            </span>
            
            <label for="lastname">Last Name</label>    
            <input required type ="text" name = "lastname" placeholder ="Appleseed" maxlength="32" value ="<?php echo $lastname;?>" >
            <span class="errors">
                <?php echo $errors["lastname"];?>
            </span>
            
            <label for="phonenumber">Phone Number</label>    
            <input required type ="text" name = "phonenumber" placeholder ="123456789" maxlength="10" value ="<?php echo $username;?>">
            <span class="errors">
                <?php echo $errors["username"];?>
            </span>
            
            <label for="email">Email Address</label>    
            <input required autocomplete="off" type ="email" name = "email" placeholder ="johnappleseed@email.com" value ="<?php echo $email;?>">
            <span class="errors">
                <?php echo $errors["email"];?>
            </span>
            
            <label for="password">Password</label>    
            <input required autocomplete="off" type ="password" name = "password" placeholder ="Minimum 8 characters">
            <span class="errors">
                <?php echo $errors["password"];?>
            </span>    
        
            <div class ="center">
                <button type ="submit" name = "submit">Register</button>
            </div>
        </form>
        </div>
    </body>
</html>