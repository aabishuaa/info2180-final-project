<?php
    
function connect() {
    return new PDO("mysql:host=localhost;dbname=dolphin_crm", "root", "");
}
    
function get_all($table) {
    $statement = connect()->query("SELECT * FROM $table");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function get_where($table, $data) {
    $statement = connect()->prepare("SELECT * FROM $table WHERE {$data[0]} = ?");
    $statement->execute([$data[1]]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function insert($table, $data) {
    $pdo = connect();
    switch ($table) {
        case "users":
            $statement = $pdo->prepare("INSERT INTO $table (firstname, lastname, password, email, role, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
            break;
        case "contacts":
            $statement = $pdo->prepare("INSERT INTO $table (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
            break;
        case "notes":
            $statement = $pdo->prepare("INSERT INTO $table (contact_id, comment, created_by, created_at) VALUES (?, ?, ?, NOW())");
            break;
    }
    
    if (!is_array($statement)) {
        $statement->execute($data);
    }
}

function update($table, $data) {
    $pdo = connect();
    $statement = $pdo->prepare("UPDATE $table SET {$data[0]} = ? WHERE $table.id = ?");

    if (!is_array($statement)) {
        $statement->execute([$data[1], $data[2]]);
    }
}

?>
