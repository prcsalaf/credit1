<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Example: BlinkID Scan From Camera</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="assets/css/styleScan.css">
    </head>
    <body>
        <div id="screen-initial" style="display: none;">
            <h1 id="msg">Loading...</h1>
            <progress id="load-progress" value="0" max="100"></progress>
        </div>
        <input type="file" accept="image/*;capture=camera">
        <div id="screen-start" class="">
            <a href="#" id="start-scan">Start scan</a>
        </div>

        <div id="screen-scanning" class="hidden">
            <video id="camera-feed" playsinline></video>
            <!-- Recognition events will be drawn here. -->
            <canvas id="camera-feedback"></canvas>
            <p id="camera-guides">Point the camera towards front side of a document.</p>
        </div>
    </body>
    <script src="https://unpkg.com/@microblink/blinkid-in-browser-sdk@5.11.4/dist/blinkid-sdk.js"></script>
    <script src="assets/js/apicin.js"></script>
</html>
