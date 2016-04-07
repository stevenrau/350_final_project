var app = angular.module('tracksController', []);
var api_get_tracks_url="/350_final_project/api.php/tracks";

/*
 * The track listing controller
 */
app.controller('tracksController', function($scope,  $sce, $http)
{
    $scope.videoUrl = undefined;

    /* Grab the list of track info from the API */
    $http.get(api_get_tracks_url).then(function (response)
    {
        $scope.trackData = response.data;
    });

    /*
     * Displays a given track's video if it has a video URL
     */
    $scope.listenTrack = function(vidUrl)
    {
        /* If we have a video url saved for the track... */
        if (vidUrl != null)
        {
            /* Ensure that the video link is embeddable */
            vidUrl = vidUrl.replace("watch?v=", "embed/");

            /* Save the url in the current scope as a trusted resource */
            $scope.videoUrl = $sce.trustAsResourceUrl(vidUrl);
        }
        /* Else leave the ur undefined so nothing is displayed */
        else
        {
            window.alert("No video available for the requested track. To add a video link, click the \"Edit \" button");

            $scope.videoUrl = undefined;
        }
    }
});

