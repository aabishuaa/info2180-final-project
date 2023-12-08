<?php session_start(); ?>
<html>
    <!DOCTYPE html>

    <head>
        <meta charset ="UTF-8"/>
        <meta name= "viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet"  href="styles.css"/>
        <title>Group #23 Dolphin CRM</title>
    </head>

    <body>
        <section id="parent">

            <header>
            <img src="dolphin.png" alt="Logo with a Cute Blue Dolphin"/>
                <p id="logotitle">Dolphin CRM</p>
            </header>

            <div id="central">

                <aside class="hide">
                    <div class="menu"><button id="home"> <img src="images/home.png"/> Home</button></div>
                    <div class="menu"><button id ="newcontact"> <img src="images/new_contact.png"/> New Contact</button></div>
                    <div class="menu" id = "admin"><button id="viewusers"> <img src="images/users.png"/>Users</button></div>
                    <hr>
                    <div class="menu"><button id="logout"> <img src="images/logout.png"/>Logout</button></div>
                </aside>

                <section id="change"> 
                    <form id="login">
                        <h1 class="formtitle">Login</h2>
                        <div class="formstatus"> </div>
                        <div class="formgrp"> 
                            <input class="inputnormal" type="email" placeholder="Email address" name="email" required>
                        </div>
                        <div class="formgrp"> 
                            <input class="inputnormal" type="password" placeholder="Password" name="password" required>
                        </div>
                        <button type= "submit" name="submitbtn" id="submitbtn"> <i class="fa-solid fa-lock"></i> <span> Login </span></button>
                    </form> 
                </section>

                <footer id="footer">
                    <hr>
                    <p>Copyright &copy; 2022 Dolphin CRM</p>
                </footer>
            </div>
        </section>
    </body>

</html>