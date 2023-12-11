<?php 

require "core/init.php"; 
$title = "Dashboard";
?>

<?php require "header.php"; ?>
<script src="assets/js/filter.js"></script>
</head>
<body>
<?php if (is_loggedin()) { ?>
    <?php require "banner.php"; ?>
    <?php require "sidebar.php"; ?>

    <div class="container">
        <div class="page-title">
            <h1>Dashboard</h1>
            <a href="addcontact.php"><span><img src="assets/images/add.png"  width="20px" alt="add contact"></span>Add Contact</a>
        </div>
        <div class="content-container">

            <div class="filter-container">

                <div class="filter-text">
                    <img src="assets/images/filter.png" alt="filter" width="18px" src="">
                    <p>Filter By:</p>
                </div>

                <ul class="filter-options">
                    <li><a href="#" id="filterAll">All</a></li>
                    <li><a href="#" id="filterSL">Sales leads</a></li>
                    <li><a href="#" id="filterSupport">Support</a></li>
                    <li><a href="#" id="filterATM">Assigned to me</a></li>
                </ul>

            </div>

            <table id="contacts-table">

            </table>

        </div>
        <?php require "footer.php"; ?>

    </div>

<?php } else { ?> 
    <?php require "warning.php"; ?>
<?php } ?> 

</body>
</html>