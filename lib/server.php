<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            background-color: #000000;
            overflow: hidden;
            position: fixed;
<?php
if (!empty($_GET['forceHideAnnotation'])) {
?>
            height: 1000%;
            width: 1000%;
            transform: scale(0.1);
            transform-origin: left top;
<?php
} else {
?>
            height: 100%;
            width: 100%;
<?php
}
?>
        }
    </style>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
</head>
<body>
    <div id="player"></div>
    <script>
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;
        var timerId;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '100%',
                width: '100%',
                <?= empty($_GET['initialVideoId']) ? "" : "videoId: '".$_GET['initialVideoId']."'," ?>
                playerVars: {
                    'controls': 0,
                    'playsinline': 1,
                    'enablejsapi': 1,
                    'fs': 0,
                    'rel': 0,
                    'showinfo': 0,
                    'iv_load_policy': 3,
                    'modestbranding': 1,
                    <?= empty($_GET['enableCaption']) ? "" : "'cc_load_policy': ".$_GET['enableCaption']."," ?>
                    <?= empty($_GET['captionLanguage']) ? "" : "'cc_lang_pref': '".$_GET['captionLanguage']."'," ?>
                    'autoplay': <?= empty($_GET['autoPlay']) ? "0" : "1" ?>
                },
                events: {
                    onReady: (event) => Ready.postMessage("Ready"),
                    onStateChange: (event) => sendPlayerStateChange(event.data),
                    onPlaybackQualityChange: (event) => PlaybackQualityChange.postMessage(event.data),
                    onPlaybackRateChange: (event) => PlaybackRateChange.postMessage(event.data),
                    onError: (error) => Errors.postMessage(error.data)
                },
            });
        }

        function sendPlayerStateChange(playerState) {
            clearTimeout(timerId);
            StateChange.postMessage(playerState);
            if (playerState == 1) {
                startSendCurrentTimeInterval();
                sendVideoData(player);
            }
        }

        function sendVideoData(player) {
            var videoData = {
                'duration': player.getDuration(),
                'title': player.getVideoData().title,
                'author': player.getVideoData().author,
                'videoId': player.getVideoData().video_id
            };
            VideoData.postMessage(JSON.stringify(videoData));
        }

        function startSendCurrentTimeInterval() {
            timerId = setInterval(function () {
                CurrentTime.postMessage(player.getCurrentTime());
                LoadedFraction.postMessage(player.getVideoLoadedFraction());
            }, 100);
        }

        function play() {
            player.playVideo();
            return '';
        }

        function pause() {
            player.pauseVideo();
            return '';
        }

        function loadById(id, startAt, endAt) {
            player.loadVideoById(id, startAt, endAt);
            return '';
        }

        function cueById(id, startAt, endAt) {
            player.cueVideoById(id, startAt, endAt);
            return '';
        }

        function loadPlaylist(playlist, index, startAt) {
            player.loadPlaylist(playlist, 'playlist', index, startAt);
            return '';
        }

        function cuePlaylist(playlist, index, startAt) {
            player.cuePlaylist(playlist, 'playlist', index, startAt);
            return '';
        }

        function mute() {
            player.mute();
            return '';
        }

        function unMute() {
            player.unMute();
            return '';
        }

        function setVolume(volume) {
            player.setVolume(volume);
            return '';
        }

        function seekTo(position, seekAhead) {
            player.seekTo(position, seekAhead);
            return '';
        }

        function setSize(width, height) {
            player.setSize(width, height);
            return '';
        }

        function setPlaybackRate(rate) {
            player.setPlaybackRate(rate);
            return '';
        }

        function setTopMargin(margin) {
            document.getElementById("player").style.marginTop = margin;
            return '';
        }
    </script>
</body>
</html>