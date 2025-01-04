<?php
 session_start();
function convertToEmbedURL($url)
{
    $urlParts = parse_url($url);

    // For youtu.be links
    if ($urlParts['host'] === 'youtu.be') {
        return "https://www.youtube.com/embed" . $urlParts['path'];
    }

    // For youtube.com/watch links
    if (isset($urlParts['query'])) {
        parse_str($urlParts['query'], $query);
        if (isset($query['v'])) {
            return "https://www.youtube.com/embed/" . $query['v'];
        }
    }
    return $url; // Return original URL if it's not valid
}

include('dbconnection.php');
$genre = isset($_GET['genre']) ? $_GET['genre'] : ''; // Get selected genre
$playlist = [];
if ($genre) {
    $query = "SELECT Song_Name, Song_URL, Genre FROM playlist WHERE Genre = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();
    $playlist = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<head>
    <title>Music Playlist</title>
    <style>
        .video-container {
            position: fixed;
            right: 0;
            margin: 0;
            padding: 0;
            z-index: 1000;
        }

        iframe {
            width: 320px;
            height: 180px;
            border: none;
        }

        select {
            padding: 8px;
            font-size: 16px;
            margin: 10px;
        }
    </style>
    <script>
        let playlist = <?php echo json_encode($playlist); ?>; // PHP playlist data
        let currentIndex = 0; // Start with the first song

        function loadVideo(index) {
            const videoContainer = document.getElementById('video-container');
            if (index >= playlist.length) {
                alert("End of playlist.");
                videoContainer.innerHTML = ''; // Clear video container when playlist ends
                return;
            }
            const videoURL = playlist[index].Song_URL;
            const embedURL = convertToEmbedURL(videoURL);
            videoContainer.innerHTML = `
                <iframe 
                    id="player"
                    src="${embedURL}?autoplay=1&enablejsapi=1" 
                    allow="autoplay; encrypted-media" 
                    allowfullscreen>
                </iframe>`;
        }

        function convertToEmbedURL(url) {
            const urlObj = new URL(url);
            if (urlObj.host === "youtu.be") {
                return "https://www.youtube.com/embed" + urlObj.pathname;
            }
            if (urlObj.searchParams.has("v")) {
                return "https://www.youtube.com/embed/" + urlObj.searchParams.get("v");
            }
            return url;
        }

        function onYouTubeIframeAPIReady() {
            const player = new YT.Player('player', {
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.ENDED) {
                currentIndex++;
                loadVideo(currentIndex);
            }
        }

        function autoLoadGenre(select) {
            const genre = select.value;
            if (genre) {
                window.location.href = `?genre=${encodeURIComponent(genre)}`;
            }
        }
    </script>
    <script src="https://www.youtube.com/iframe_api"></script>
</head>

<body>
    <h1 style="text-align: right ;">Music Playlist</h1>
    <form method="get" style="text-align: right;">
        <label for="genre">Select Genre:</label>
        <select name="genre" id="genre" onchange="autoLoadGenre(this)">
            <option value="">--Choose a Genre--</option>
            <option value="Action" <?php echo $genre === "Action" ? "selected" : ""; ?>>Action</option>
            <option value="Romance" <?php echo $genre === "Romance" ? "selected" : ""; ?>>Romance</option>
            <option value="Fantasy" <?php echo $genre === "Fantasy" ? "selected" : ""; ?>>Fantasy</option>
            <option value="Comedy" <?php echo $genre === "Comedy" ? "selected" : ""; ?>>Comedy</option>
            <option value="Sports" <?php echo $genre === "Sports" ? "selected" : ""; ?>>Sports</option>
            <option value="Horror" <?php echo $genre === "Horror" ? "selected" : ""; ?>>Horror</option>
        </select>
    </form>

    <?php if (!empty($playlist)): ?>
        <div id="video-container" class="video-container">
            <script>
                loadVideo(currentIndex);
            </script>
        </div>
    <?php else: ?>
        <?php if ($genre): ?>
            <p style="text-align: center;">No music found for the selected genre.</p>
        <?php else: ?>
            <p style="text-align: center;">Please select a genre to view the playlist.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
<?php include('footer.php'); ?>

</html>