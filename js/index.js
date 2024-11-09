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

    // Draw the video frame to the canvas
    context.drawImage(video, 0, 0, 640, 480);

    // Check if a face is detected
    const detection = await faceapi.detectSingleFace(canvas, new faceapi.TinyFaceDetectorOptions());
    if (!detection) {
        alert("No face detected. Please try again.");
        return; // Exit if no face is found
    }

    capture.text("Validating...")
    capture.prop('disabled',true)

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
            faceCaptured = true
            capture.text("Capture Photo")
    capture.prop('disabled',false)
        },
        error: function () {
            alert("Failed to save the image.");
        }
    });
});

// sign up
$('#signupForm').off('submit').on('submit', function(e){
  e.preventDefault()
  var signupRole = $(this).attr('role')

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