<?php 

require "../core/init.php"; 

$where = [];
$errors = [];

if(!empty(current_contact_info("all"))) {
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(!empty($_POST["note"])) {
            insert("notes", [current_contact_info("id"), $_POST["note"], user_info("id"), date('Y-m-d H:i:s')]);
                        
        } else {   
            $errors['note'] = "please enter a note!";
            
        }
    }    
    
    $where = sanitize_array_of(get_where("notes", ["contact_id", current_contact_info("id")]));
}
?>


<?php foreach ($where as $row) { ?>
    <div class="note">
        <p class="title"><?= sanitize(users_name_by_id($row["created_by"]))?></p>
        <p class="body"><?= $row["comment"]?></p>
        <p class="date"><?= date('F j, Y', strtotime($row["created_at"]))?> at <?= date('ga', strtotime($row["created_at"]))?> </p>
    </div>
<?php }?>