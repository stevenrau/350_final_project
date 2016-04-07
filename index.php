<?php session_start(); ?>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="final_projectStyle.css">
        <title>Steven Rau - Music Database</title>
    </head>

    <body>

        <script type="text/javascript" src="./fbapp/fb.js"></script>


        <header>
            <a href="/350_final_project/index.php"><img id="header_logo" src="/350_final_project/icons/site_logo.png" alt="logo" width='15%' height='auto' /></a>
            <h1 id="site_title">Steven Rau - Music Database</h1>
            <nav>
                <a class="active_nav" href="/350_final_project/index.php">Home</a> |
                <a class="navigation" href="/350_final_project/view/tracks/tracks.php">Tracks</a> |
                <a class="navigation" href="/350_final_project/view/artists/artists.php">Artists</a> |
                <a class="navigation" href="/350_final_project/view/albums/albums.php">Albums</a>
            </nav>
        </header>

        <div id="home_main">
            <h2>Welcome
                <?php if (isset($_SESSION['name'])){ echo ', ' . $_SESSION['name']; } ?>
                !
            </h2>

            <!-- Ensure that the user is logged in before continuing to explore the site -->
            <?php if (isset($_SESSION['name'])){ ?>
                <div id="main_text"> Navigate using the links above to view, add, delete, and modify entries in the music database! </div>
            <?php } else { ?>
                <div class="fb-login-button" id="facebook_button" data-scope="public_profile, email" onlogin="checkLoginState();"></div>
                <div id="main_text"> Please login to access the site contents. </div>
            <?php } ?>


        </div>



        <footer>
            <small id="footer_copyright">Copyright &copy; 2016 Steven Rau</small>
        </footer>

    </body>

</html>
