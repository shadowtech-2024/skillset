<!DOCTYPE html>
<html lang="en">
  
  <!-- Head  -->
  <?php include("../php/head.php")?>

  <body>
    
    <div class="p-3">
      
      <!-- Logo and Title  -->
      <div class="d-flex align-items-center justify-content-center gap-1">
        <div><img src="../images/logo.svg" alt="logo" width="50" height="50"></div>
        <h1 class="mb-0">Skillset</h1>
      </div>

      <div>
        <button type="button" class="btn-close back"></button>
      </div>
      
      <!-- Role  -->
      <div class="mt-2 <?php echo isset($_GET['role']) ? "d-none" : "" ?>">
        <a href="?role=skilled" class="text-decoration-none btn btn-primary btn-lg w-100">Skilled Manual Laborer</a>
        <a href="?role=owner" class="text-decoration-none btn btn-primary btn-lg w-100 mt-2">Homeowner</a>
      </div>
      
      <!-- signup form  -->
      <form action="" class="<?php echo isset($_GET['role']) ? "" : "d-none" ?>" method="post" id="signupForm" role="<?php echo isset($_GET['role']) ? $_GET['role'] : ""?>">

        <!-- Personal details  -->
        <div>
          <h4>personal information</h4>
          <div>
            <label class="form-label form-label-lg">Email</label>
            <input type="email" class="form-control form-control-lg" required placeholder="example@gmail.com" name="signupEmail">
          </div>
          <div>
            <label class="form-label form-label-lg">Password</label>
            <input type="password" class="form-control form-control-lg" required placeholder="password" name="signupPassword">
          </div>
          <div>
            <label class="form-label form-label-lg">Fullname</label>
            <input type="text" class="form-control form-control-lg" required placeholder="" name="signupFullname">
          </div>
          <div>
            <label class="form-label form-label-lg">Location</label>
            <input type="text" class="form-control form-control-lg" required placeholder="Current address" name="signupLocation">
          </div>
          <div>
            <label class="form-label form-label-lg">Contact No.</label>
            <input type="tel" class="form-control form-control-lg" required placeholder="e.g 09558761211" name="signupContactNumber">
          </div>
        </div>

        <!-- Identity card  -->
        <div>
          <h4>identification card</h4>
          <div>
            <label class="form-label form-label-lg">ID type</label>
            <select class="form-select form-select-lg" required name="signupIdType">
              <option value="PhilID or Philippine National ID">PhilID or Philippine National ID</option>
              <option value="Unified Multi-Purpose ID (UMID) card">Unified Multi-Purpose ID (UMID) card</option>
              <option value="Postal ID">Postal ID</option>
              <option value="Commission on Elections (COMELEC) Voter's ID">Commission on Elections (COMELEC) Voter's ID</option>
            </select>
          </div>
          <div>
            <label class="form-label form-label-lg">Front</label>
            <input type="file" accept="image/*" class="form-control form-control-lg" required placeholder="" name="signupFront">
          </div>
          <div>
            <label class="form-label form-label-lg">Back</label>
            <input type="file" accept="image/*" class="form-control form-control-lg" required placeholder="" name="signupBack">
          </div>
        </div>

        <!-- face recognition  -->
         <div>
          <h4>selfie</h4>
          <div>
            <video id="video" width="200" height="300" autoplay></video>
            <button id="capture">Capture Photo</button>
            <canvas id="canvas" width="200" height="300" class="d-none"></canvas>
          </div>
         </div>


        <br>
        <div>
          <button type="submit" class="btn btn-primary w-100 btn-lg" name="loginButton">Signup</button>
        </div>
      </form>

      <!-- Login -->
      <div>
        Already have an account. <a href="./index.php">Login</a>
      </div>
    </div>

  </body>
</html>