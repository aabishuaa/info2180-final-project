<?php 
require "core/init.php"; 
require "modules/contact.module.php";
$title = "Contact";

?>

<?php require "header.php"; ?>
<link rel="stylesheet" href="assets/css/contact.css">
<script src="assets/js/contact.js"></script>
</head>
<body>
<?php if (is_loggedin()) { ?>
    <?php require "banner.php"; ?>
    <?php require "sidebar.php"; ?>

    <div class="container">
        
        <?php if(empty($errors)) { ?>
            <div class="contact-info-container">
        
                <div class="page-title">
                    <div class="contact-title">
                        <div class="profile"></div>
                        <div class="title-info">
                            <h1><?= $requestedContact["title"].". ".$requestedContact["firstname"]." ".$requestedContact["lastname"]?></h1>
                            <p>Created on <?= date('F j, Y', strtotime($requestedContact["created_at"])) ?> by <?= users_name_by_id($requestedContact["created_by"])?></p>
                            <p id="updated-at">Updated on <?= date('F j, Y', strtotime($requestedContact["updated_at"])) ?></p>
                        </div>
                    </div>
                    <div class="title-button-container">
                        <p class="assign-warning hide" >Contact Already<br>Assigned To You!</p>
                        <a href="#" id="assignTM"><span><img src="assets/images/assign.svg"  width="32px" alt=""></span>Assign to me</a>
                        <?php if($requestedContact["type"]=="Sales Lead") { ?>
                            <a href="#" id="switch" class="switch-to-support" >
                                <span><img src="assets/images/switch-light.svg"  width="32px" alt="switch to support"></span>
                                Switch to Support
                            </a>
                        <?php } else { ?>
                            <a href="#" id="switch" class="switch-to-sales" >
                                <span><img src="assets/images/switch.svg"  width="32px" alt="switch to sales lead"></span>
                                Switch to Sales Lead
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="contact-personal-info">

                    <div class="info-container">
                        <p>Email</p>
                        <p><?= $requestedContact["email"]?></p>
                    </div>

                    <div class="info-container">
                        <p>Telephone</p>
                        <p><?= $requestedContact["telephone"]?></p>
                    </div>

                    <div class="info-container">
                        <p>Company</p>
                        <p><?= $requestedContact["company"]?></p>
                    </div>

                    <div class="info-container">
                        <p>Assigned To</p>
                        <p id="assigned-user"><?= sanitize(users_name_by_id($requestedContact["assigned_to"]))?></p>
                    </div>

                </div>

                <div class="notes-container">

                    <div class="notes-header">
                        <img src="assets/images/notes.svg"  width="32px" alt="">
                        <p>Notes</p>
                    </div>

                    <div class="notes">
                    
                    </div>

                    <div class="add-note">
                        <p>Add a note about <?= $requestedContact["firstname"]?></p>
                        <form action="" method="post" id="note-form">
                            <textarea name="note" id="note" cols="30" rows="10"></textarea>
                            <div class="add-note-btn">
                                <p class="note-warning hide">Note Text Area Is Empty!</p>
                                <button type="submit" id= "note-submit">Add Note</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            
            </div>

        <?php } else { ?> 
            <div class="contact-warning-container">
                <p class="contact-warning"><?=$errors[0]?></p>
            </div>
        <?php } ?> 

        <?php require "footer.php"; ?>

    </div>

<?php } else { ?> 
    <?php require "warning.php"; ?>
<?php } ?> 

</body>
</html>