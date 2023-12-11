<?php

require "../core/init.php"; 
$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)) {

        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Valid email is required!";
        }

        foreach ($_POST as $key=> $value) {
            if(empty($_POST[$key])) {
                $errors[$key] = $key." is required!";
            }
        }

        $pattern = '/^\d{3}-\d{3}-\d{4}$/';
        if (!preg_match($pattern, $_POST["telephone"])) {
            $errors["telephone"] = "Valid telephone number required!";
        } 

        if(empty($errors)) {
            foreach ($_POST as $key=> $value) {
                $_POST[$key] = strip_tags(trim($value));
            }   
            insert("contacts", [$_POST["title"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["telephone"], $_POST["company"], $_POST["type"], users_id_by_name($_POST["assigned_to"]), user_info("id"), date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
        }

    }   
}
echo json_encode($errors);
?>

