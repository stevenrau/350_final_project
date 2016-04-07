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

        <!-- Map div. Always start at the U of S for simplicity's sake -->
        <div id="location_div">
            <div class="element">
                <input type="submit" class="button" id="get_location" name="get_location" value="Get my location" >
            </div>

            <div class="element">
                <div id="map">
                    <iframe id="google_map"
                      width="450"
                      height="250"
                      frameborder="0" style="border:0"
                      src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDEx3MPx7UglM3SSIAsBm620nMvlDTse1c&q=university+of+saskatchewan" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Map controller script -->
        <script type="text/javascript">

            var c = function(pos){

                var lat = pos.coords.latitude,
                    long = pos.coords.longitude,
                    coords = lat + ',' + long;

                document.getElementById('google_map').setAttribute('src', 'https://maps.google.com?q=' + coords + '&z=60&output=embed')
            }

            document.getElementById("get_location").onclick= function(){
                navigator.geolocation.getCurrentPosition(c);
                return false;
            }
        </script>


        <footer>
            <small id="footer_copyright">Copyright &copy; 2016 Steven Rau</small>
        </footer>

    </body>

</html>
