$(document).ready(async function(){

  // back button
  $('.back').off('click').on('click', function(){
    history.back()
  })

  var faceCaptured = false

  const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');

        // Load face-api.js models
        await faceapi.nets.tinyFaceDetector.loadFromUri('../models');

        // Get access to the webcam
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true }).then(function (stream) {
                video.srcObject = stream;
                video.play();
            });
        }

        // Capture photo on button click
        $('#capture').click(async function () {
          var capture = $(this)

          capture.text('Validating...')
          capture.prop('disabled',true)

            // Draw the video frame to the canvas
            context.drawImage(video, 0, 0, 200, 300);

            // Check if a face is detected
            const detection = await faceapi.detectSingleFace(canvas, new faceapi.TinyFaceDetectorOptions());
            if (!detection) {
                alert("No face detected. Please try again.");
                capture.text('Camera Photo')
          capture.prop('disabled',false)
                return; // Exit if no face is found
            }

            // Convert canvas to image data URL
            const imageData = canvas.toDataURL('image/png');

            // Send the image data to the server using AJAX
            $.ajax({
                type: 'POST',
                url: '../php/main.php',
                data: {
                    imgBase64: imageData
                },
                success: function (response) {
                    alert("Image validated successfully.");
                    faceCaptured = true;
                    capture.text('Capture photo')
          capture.prop('disabled',false)
                },
                error: function () {
                    alert("Failed to save the image.");
                    capture.text('Capture photo')
          capture.prop('disabled',false)
                }
            });
        });

// sign up
$('#signupForm').off('submit').on('submit', function(e){
  e.preventDefault()
  var signupRole = $(this).attr('role')

  if(!faceCaptured)
    return
  
  var formData = new FormData(this)
  formData.append('signupRole', signupRole)
  $.ajax({
    url: "../php/main.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function(res){

    }
  })

})

  // Login
  $('#loginForm').off('submit').on('submit', function(e){
    e.preventDefault()

    var formData = new FormData(this)
    $.ajax({
      url: "../php/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(res){
        
      }
    })
  })

})