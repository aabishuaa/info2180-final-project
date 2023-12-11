<?php

require "../core/init.php"; 
$assign_retval = false;

if(!empty($_SESSION["current_contact"])) {
        
        if(array_key_exists("action", $_GET)) {
            
            switch($_GET['action']){
                case "assign-to":
                    if($_SESSION["current_contact"]["assigned_to"] !=  user_info("id")) {
                        update("contacts",["assigned_to", user_info("id"), $_SESSION["current_contact"]["id"]]); 
                        $assign_retval = true;
                    }

                    break;
                case "switch-to-support":
                    update("contacts",["type", "Support", $_SESSION["current_contact"]["id"]]); 
                    break;
                case "switch-to-sales":
                    update("contacts",["type", "Sales Lead", $_SESSION["current_contact"]["id"]]); 
                    break;
                case "updated-at":
                    update("contacts",["updated_at", date('Y-m-d H:i:s'), $_SESSION["current_contact"]["id"]]); 
                break;
            }
                        
        }    
    
    $where = get_where("contacts", ["id", $_SESSION["current_contact"]["id"]])[0];
    $_SESSION["current_contact"] =  $where;
}


?>
<?php if($_GET['action'] == "assign-to") { ?>
    
    <?php if($assign_retval) { ?>
        <p id="assigned-user"><?=sanitize(users_name_by_id(user_info("id")))?></p>
    <?php } else { ?>
        <?php echo "same";?>
    <?php } ?>
    
<?php } else if($_GET['action'] == "updated-at") { ?>
    <p id="updated-at">Updated on <?= date('F j, Y', strtotime($where["updated_at"])) ?></p>
<?php } else { ?>
    <?php if($where["type"]=="Sales Lead") { ?>
        <a href="#" id="switch" class="switch-to-support" >
            <span><img src="assets/images/switch.png"  width="32px" alt="switch to support"></span>
            Switch to Support
        </a>
    <?php } else { ?>
        <a href="#" id="switch" class="switch-to-sales" >
            <span><img src="assets/images/switch.png"  width="32px" alt="switch to sales lead"></span>
            Switch to Sales Lead
        </a>
    <?php } ?>
<?php } ?>

