<?php
    session_start();

    // Include the artists controller file
    include("../../controller/artists_controller.php");

    // Get all of the artists
    $controller = new Artists_Controller();
    $artistsList = $controller->getAllArtists();
?>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="/350_final_project/final_projectStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/350_final_project/preload.js"></script>
        <title>Artists</title>
    </head>

    <body>
        <header>
            <a href="/350_final_project/index.php"><img id="header_logo" src="/350_final_project/icons/site_logo.png" alt="logo" width='15%' height='auto' /></a>
            <h1 id="site_title">Steven Rau - Music Database</h1>
            <nav>
                <a class="navigation" href="/350_final_project/index.php">Home</a> |
                <a class="navigation" href="/350_final_project/view/tracks/tracks.php">Tracks</a> |
                <a class="active_nav" href="/350_final_project/view/artists/artists.php">Artists</a> |
                <a class="navigation" href="/350_final_project/view/albums/albums.php">Albums</a>
            </nav>
        </header>

        <div id="home_main">

        <!-- Ensure that the user is logged in before allowing access to the site -->
         <?php if (isset($_SESSION['name'])){ ?>

            <h2> Artists  </h2>

            <h3 class="operation_header"> Possible Operations: </h3>
            <ul id="operation_list">
                <li class="operation_list">
                    <a class="operation_list" href="artistAdd.php"> Add a new artist </a>
                </li>
            </ul>

            <h3 class="operation_header"> List of all artists: </h3>
            <table id="artist_list" border="1" cellpadding="5">
                <tr>
                    <td class="artist_list_header">Name</td>
                    <td class="artist_list_header">Artist Image</td>
                </tr>
                <?php foreach ($artistsList as $curArtist) : ?>
                <tr>
                    <td> <?php echo $curArtist->name ?></td>
                    <td class="imgCol"> <img class="artistImg" src=" <?php echo $curArtist->thumbnail_url ?>" /></td>
                    <?php $artistId = $curArtist->id; ?>
                    <td>
                        <form name="editArtist" action="artistUpdate.php" method="GET">
                            <input type="hidden" name="artistId" value="<?php echo $artistId; ?>"/>
                            <input type="submit" class="clickable_button" name="editArtist" value="Edit"/>
                        </form>
                    </td>
                    <td>
                        <form name="deleteArtist" action="artistDelete.php" method="GET">
                            <input type="hidden" name="artistId" value="<?php echo $artistId; ?>"/>
                            <input type="submit" class="clickable_button" name="deleteArtist" value="Delete"/>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        <?php } else { ?>
            <h2> Access denied. </h2>
            <div id="main_text"> Please return to the home page and login to access the site contents. </div>
        <?php } ?>

        </div>




        <footer>
            <small id="footer_copyright">Copyright &copy; 2016 Steven Rau</small>
        </footer>

    </body>

</html>
