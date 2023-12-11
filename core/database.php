<?php
    
function connect() {
    $pdo = new PDO ("mysql:host=localhost;dbname=dolphin_crm", "root","");
    return $pdo;
}
    
function get_all($table) {
    $statement = connect()->prepare("select * from ".$table);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function get_where($table, $data) {
    $statement = connect()->prepare("select * from ".$table." where ".$data[0]." = ?");
    $statement->execute([$data[1]]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function insert($table, $data){
    $statement = [];
    switch($table){
        case "users":
            $statement = connect()->prepare("insert into ".$table." (`id`, `firstname`, `lastname`, `password`, `email`, `role`, `created_at`) values (NULL, ?, ?, ?, ?, ?, ?)");
            break;
            
        case "contacts":
            $statement = connect()->prepare("insert into ".$table." (`id`, `title`, `firstname`, `lastname`, `email`, `telephone`, `company`, `type`, `assigned_to`, `created_by`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            break;

        case "notes":
            $statement = connect()->prepare("insert into ".$table." (`id`, `contact_id`, `comment`, `created_by`, `created_at`) values (NULL, ?, ?, ?, ?)");
            break;
    }
    
    if(!is_array($statement )) {
        $statement->execute($data);
    }
    
}

function update($table, $data){
    $statement = connect()->prepare("update ".$table." set ".$data[0]." = ? where ".$table.".`id` = ?");

    if(!is_array($statement )) {
        $statement->execute([$data[1],$data[2]]);
    }
}

?>