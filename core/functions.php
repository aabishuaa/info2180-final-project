<?php

function redirect($page) {
    header("Location: http://localhost/info2180-finalproject-main/".$page);
    die;
}

function is_loggedin() {
    if (!(empty($_SESSION['user_data']))){
        return true;
    }
    return false;
}

function is_admin() {
    if(array_key_exists('user_data',$_SESSION)) {
        if ($_SESSION['user_data']['role'] === "admin"){
            return true;
        }
    }
    return false;
}

function user_info($info) {
    if(array_key_exists('user_data',$_SESSION)) {
       if($info=="all") {
            return $_SESSION['user_data'];
       } else {
        return $_SESSION['user_data'][$info];
       }
    }
    return false;
}

function current_contact_info($info) {
    if(array_key_exists('current_contact',$_SESSION)) {
        if($info=="all") {
             return $_SESSION['current_contact'];
        } else {
         return $_SESSION['current_contact'][$info];
        }
     }
     return false;
}

function users_id_by_name($name) {
    $split_name = preg_split("/ /",$name);
    $retval = 0;
    foreach (get_all("users") as $row){
        if(($split_name[0]===$row["firstname"])&&($split_name[1]===$row["lastname"])) {
            $retval = $row["id"];
        }
    }
    
    return $retval;
}

function users_name_by_id($id) {
    $retval = "";
    $result = get_where("users", ["id",$id]);
    if(!empty($result)) {
        $retval = $result[0]["firstname"]." ".$result[0]["lastname"];
    }

    return $retval;
}

function sanitize($data) {   
    return htmlspecialchars($data);
}

function sanitize_array($array_data) {
    foreach ($array_data as $key => $value) {
        $array_data[$key] = sanitize($value);
    }
    
    return $array_data;
}

function sanitize_array_of($array_data) {
    $retval = [];
    foreach ($array_data as $row) {
        
        array_push($retval, sanitize_array($row));
    }

    return $retval;
}
// functions.php or a new file, e.g., warning_functions.php

function generate_warning_section($title) {
    return <<<HTML
    <section class="warning">
        <div class="warning-banner">
            <img src="assets/images/lock.png" width="32px" alt="">
        </div>
        <h1>MUST BE LOGGED IN TO<br>VIEW <span><?= strtoupper($title) ?></span> PAGE</h1>
        <a href="login.php">Go to Login</a>
    </section>
HTML;
}



?>