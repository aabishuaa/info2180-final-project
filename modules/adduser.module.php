<?php

require "../core/init.php"; 

$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)) {


        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Valid email is required!";
        }

        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
        if (!preg_match($pattern, $_POST["password"])) {
            $errors["password"] = "Password must have at least one number, one letter, one capital letter, and be at least 8 characters long.";
        } 

        foreach ($_POST as $key=> $value) {
            if(empty($_POST[$key])) {
                $errors[$key] = $key." is required!";
            }
        }

        if(empty($errors)) {
            foreach ($_POST as $key=> $value) {
                $_POST[$key] = trim($value);
            }
            insert("users", [$_POST["firstname"], $_POST["lastname"], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST["email"], $_POST["role"], date('Y-m-d H:i:s')]);
        }

    }   
}

echo json_encode($errors);
?>