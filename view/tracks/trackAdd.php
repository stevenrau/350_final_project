<?php
    // Include the tracks controller file
    include("../../controller/tracks_controller.php");

    $controller = new Tracks_Controller();

    // If the submit new track button was pressed, send info to the controller
    if( isset($_POST['submit']) )
    {
        $newTitle = $_POST['newTitle'];
        $newArtist = $_POST['newArtist'];
        $newAlbum = $_POST['newAlbum'];

        if( isset($_POST['newVidUrl']) )
        {
            $newVidUrl = $_POST['newVidUrl'];
        }
        else
        {
            $newVidUrl = null;
        }

        $controller->addTrack($newTitle, $newArtist, $newAlbum, $newVidUrl);
    }
?>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="/350_final_project/final_projectStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/350_final_project/preload.js"></script>
        <title>Tracks</title>
    </head>

    <body>
        <header>
            <a href="/350_final_project/index.php"><img id="header_logo" src="/350_final_project/icons/site_logo.png" alt="logo" width='15%' height='auto' /></a>
            <h1 id="site_title">Steven Rau - Music Database</h1>
            <nav>
                <a class="navigation" href="/350_final_project/index.php">Home</a> |
                <a class="active_nav" href="/350_final_project/view/tracks/tracks.php">Tracks</a> |
                <a class="navigation" href="/350_final_project/view/artists/artists.php">Artists</a> |
                <a class="navigation" href="/350_final_project/view/albums/albums.php">Albums</a>
            </nav>
        </header>

        <div id="home_main">
            <h2> Add a new track </h2>

            <p> *NOTE* If the new track's artist and/or album does not exist in the database, a new entry for the artist/album will be created.</p>

            <form action="" method="post" enctype="multipart/form-data">
                <!-- Form for the new title  -->
                Title:
                <input class="form_input" type="text" name="newTitle">
                <br><br>
                <!-- Form for the artist name  -->
                Artist name:
                <input class="form_input" type="text" name="newArtist">
                <br><br>
                Album name:
                <input class="form_input" type="text" name="newAlbum">
                <br><br>
                Video URL (optional):
                <input class="form_input" type="text" name="newVidUrl">
                <br><br>
                <input type="submit" class="clickable_button" name="submit" value="Add">
            </form>


        </div>




        <footer>
            <small id="footer_copyright">Copyright &copy; 2016 Steven Rau</small>
        </footer>

    </body>

</html>
