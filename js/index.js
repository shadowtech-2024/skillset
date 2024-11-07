$(document).ready(function(){

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