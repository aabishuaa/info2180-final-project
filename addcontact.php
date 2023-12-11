<?php 

require "core/init.php"; 
$title = "New Contact";

?>

<?php require "header.php"; ?>
<script assets="assets/js/addcontact.js"></script>
</head>
<body>

<?php if (is_loggedin()) {?>
    <?php require "banner.php"; ?>
    <?php require "sidebar.php"; ?>

    <div class="container">
        <h1>New Contact</h1>
        <div class="content-container">
            <div class="contact-add-success hide">Sucessfully Added New Contact</div>
            <form action="addcontact.php" id="add-contact-form" method="post">
                
                <div class="input-container">
                    <label for="title">Title</label>
                    <select name="title" id="title">
                        <option name="mr">Mr</option>
                        <option name="mrs">Mrs</option>
                        <option name="ms">Ms</option>
                        <option name="dr">Dr</option>
                        <option name="prof">Prof</option>
                    </select>
                </div>

                <div class="input-container">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" autocomplete="off" required>
                    <p class="firstname-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" autocomplete="off" required>
                    <p class="lastname-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" autocomplete="off" required>
                    <p class="email-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="telephone">Telephone</label>
                    <input type="text" id="telephone" name="telephone" placeholder="000-000-0000" required pattern="\d{3}-\d{3}-\d{4}" autocomplete="off">
                    <p class="telephone-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" autocomplete="off" required>
                    <p class="company-error input-error hide"></p>
                </div>

                <div class="input-container">
                    <label for="type">Type</label>
                    <select name="type" id="type" autocomplete="off">
                        <option name="sales lead">Sales Lead</option>
                        <option name="support">Support</option>
                    </select>
                </div>

                <div class="input-container">
                    <label for="assigned_to">Assigned To</label>
                    <select name="assigned_to" id="assigned_to">
                        <?php foreach (get_all("users") as $row){?>
                            <option><?= $row['firstname']." ".$row['lastname'] ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="input-container">
                    <button id="contact-submit" type="submit">Save</button>
                </div>

            </form>
        </div>
        <?php require "footer.php"; ?>
    </div>
<?php } else { ?> 
    <?php require "warning.php"; ?>
<?php } ?> 

</body>
</html>


