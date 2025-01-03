<?php
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



if (!isset($conn)) {
    include('C:/xampp/Xampp/htdocs/tales_and_panels/dbconnection.php');
}

if (!isset($genre) || empty($genre)) {
    die('<p style="text-align:center;">Genre not provided for the playlist.</p>');
}

$playlist = [];
$query = "SELECT Song_Name, Song_URL, Genre FROM playlist WHERE Genre = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();
    $playlist = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    die("Failed to prepare playlist query: " . $conn->error);
}
?>


<div class="playlist-container">
    <?php if (!empty($playlist)): ?>
        <div id="video-container" class="video-container">
            <script>
                let playlist = <?php echo json_encode($playlist); ?>;
                let currentIndex = 0;

                function loadVideo(index) {
                    if (index >= playlist.length) {
                        alert("End of playlist.");
                        document.getElementById('video-container').innerHTML = '';
                        return;
                    }

                    const videoURL = playlist[index].Song_URL;
                    const embedURL = convertToEmbedURL(videoURL);
                    document.getElementById('video-container').innerHTML = `
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
                            'onStateChange': function(event) {
                                if (event.data === YT.PlayerState.ENDED) {
                                    currentIndex++;
                                    loadVideo(currentIndex);
                                }
                            }
                        }
                    });
                }

                // Load the first video on page load
                window.onload = function() {
                    loadVideo(currentIndex);
                };
            </script>
            <script src="https://www.youtube.com/iframe_api"></script>
        </div>
    <?php else: ?>
        <p style="text-align:center;">No songs available for the genre "<?php echo htmlspecialchars($genre); ?>".</p>
    <?php endif; ?>
</div>
</html>