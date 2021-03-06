<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Example: BlinkID Upload File</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="assets/css/styleaps.css">
    </head>
    <body>
        <div id="screen-initial">
            <h1 id="msg">Loading...</h1>
            <progress id="load-progress" value="0" max="100"></progress>
        </div>

        <div id="screen-start" class="hidden">
            <input id="image-file" type="file" accept="image/*" capture="environment"/>
            <label for="image-file">Scan from file</label>
        </div>

        <div id="screen-scanning" class="hidden">
            <h1>Processing...</h1>
            <img id="target-image" />
        </div>
    </body>

    <!-- Keep in mind that Unpkg CDN is used for demonstration, it's not intended to be used in production! -->
    <script src="https://unpkg.com/@microblink/blinkid-in-browser-sdk@5.12.0/dist/blinkid-sdk.js"></script>
    <script src="assets/js/aps.js"></script>
</html>