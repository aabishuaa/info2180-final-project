<?php

require "../core/init.php"; 

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(!empty($_POST["email"])) {

        $result = get_where("users",["email",$_POST["email"]]);
        $user = empty($result)? []: $result[0];
    
        if($user) { 
            $password = $user["password"];
            if(password_verify($_POST['password'], $password)) {
                $_SESSION["user_data"] = $user;
                
            } else {
                $errors['password'] = "incorrect password!";
            }
        } else {

            $errors['email'] = "email not found!!";
        }
    } else {
        
        $errors['email'] = "please enter email!";
        
    }
}

echo json_encode($errors);
?>