<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Capture</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #canvas { display: none; }
    </style>
</head>
<body>
    <h2>Face Recognition Capture</h2>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="capture">Capture Photo</button>
    <canvas id="canvas" width="640" height="480"></canvas>

    <script >
      $(document).ready(function () {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');

    // Get access to the webcam
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true }).then(function (stream) {
            video.srcObject = stream;
            video.play();
        });
    }

    // Capture photo on button click
    $('#capture').click(function () {
        // Draw the video frame to the canvas
        context.drawImage(video, 0, 0, 640, 480);

        // Convert canvas to image data URL
        const imageData = canvas.toDataURL('image/png');

        // Send the image data to the server using AJAX
        $.ajax({
            type: 'POST',
            url: 'save_image.php',
            data: {
                imgBase64: imageData
            },
            success: function (response) {
                alert("Image saved successfully!");
                console.log(response);
            },
            error: function () {
                alert("Failed to save the image.");
            }
        });
    });
});

    </script>
</body>
</html>
