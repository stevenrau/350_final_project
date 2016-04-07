<?php
    session_start();

    // Include the albums controller file
    include("../../controller/tracks_controller.php");

    // Get all of the albums
    $controller = new Tracks_Controller();
    $tracksList = $controller->getAllTracks();
?>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="/350_final_project/final_projectStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="/350_final_project/controller/tracks_controller.js"></script>
        <script src="/350_final_project/preload.js"></script>
        <title>Tracks</title>
    </head>

    <body class="preload">
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

        <div id="home_main" ng-app="tracksController" ng-controller="tracksController">

        <!-- Ensure that the user is logged in before allowing access to the site -->
         <?php if (isset($_SESSION['name'])){ ?>

            <h2> Tracks  </h2>

            <h3 class="operation_header"> Possible Operations: </h3>
            <ul id="operation_list">
                <li class="operation_list">
                    <a class="operation_list" href="trackAdd.php"> Add a new track </a>
                </li>
            </ul>

            <!-- Load the video if videoUrl gets set in the angular "listen" button handler -->
            <div id="video_div" ng-app="tracksController" ng-if="videoUrl">
                <iframe id="video_player" src={{videoUrl}}></iframe>
            </div>

            <!-- Construct the table of all tracks -->
            <h3 class="operation_header"> List of all tracks: </h3>
            <table id="track_list" border="1" cellpadding="5">
                <tr>
                    <td class="track_list_header">Album Art</td>
                    <td class="track_list_header">Title</td>
                    <td class="track_list_header">Artist</td>
                    <td class="track_list_header">Album</td>
                </tr>
                <tr ng-repeat="track in trackData">

                    <td class="imgCol"> <img class="albumImg" ng-src={{track.artwork_url}} /></td>
                    <td> {{track.title}} </td>
                    <td> {{track.artist}} </td>
                    <td> {{track.album}} </td>
                    <td>
                        <input type="button" class="clickable_button table_button" name="Listen" value="Listen" ng-click="listenTrack(track.video_url)"/>
                    </td>
                    <td class="empty_cell"></td>

                    <td>
                        <form name="editTrack" action="trackUpdate.php" method="GET">
                            <input type="hidden" name="trackId" ng-value={{track.id}} />
                            <input type="submit" class="clickable_button" name="editTrack" value="Edit"/>
                        </form>
                    </td>
                    <td>
                        <form name="deleteTrack" action="trackDelete.php" method="GET">
                            <input type="hidden" name="trackId" value={{track.id}} />
                            <input type="submit" class="clickable_button" name="deleteTrack" value="Delete" />
                        </form>
                    </td>
                </tr>
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
