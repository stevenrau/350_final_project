<?php
    // Include the artists controller file
    include("../../controller/artists_controller.php");

    $controller = new Artists_Controller();
    $artist = $controller->getArtist();

    // If the confirm delete button was pressed, send info to the controller
    if( isset($_POST['confirmDelete']) )
    {
        $controller->deleteArtist($_GET['artistId']);
    }

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
            <h2> Delete Artist </h2>

            <!-- Display the chosen artist info to be deleted -->
            <h3 class="operation_header"> Artist chosen to delete: </h3>
            <p> *NOTE* By deleting this artist, you will also delete any associated albums and/or songs</p>
            <table id="artist_list" border="1" cellpadding="5">
                <tr>
                    <td class="artist_list_header">Name</td>
                    <td class="artist_list_header">Artist Image</td>
                </tr>
                <tr>
                    <td> <?php echo $artist->name ?></td>
                    <td class="imgCol"> <img class="artistImg" src=" <?php echo $artist->thumbnail_url ?>" width='45%' height='auto' /></td>
                    <?php $artistId = $artist->id; ?>

                </tr>
            </table>

            <!-- Use POST form to submit the new name  -->
            <form action="" method="post">
                Are you sure you want to delete this artist?
                <input type="submit" class="clickable_button" name="confirmDelete" value="Delete">
            </form>

        </div>




        <footer>
            <small id="footer_copyright">Copyright &copy; 2016 Steven Rau</small>
        </footer>

    </body>

</html>
