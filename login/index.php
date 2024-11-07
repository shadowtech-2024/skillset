<!DOCTYPE html>
<html lang="en">
  
  <!-- Head  -->
  <?php include("../php/head.php")?>

  <body>
    
    <main class="p-3">
      
      <!-- Logo and Title  -->
      <div class="d-flex align-items-center justify-content-center gap-1">
        <div><img src="../images/logo.svg" alt="logo" width="50" height="50"></div>
        <h1 class="mb-0">Skillset</h1>
      </div>
      
      <!-- Log in and Sign up  -->
      <form action="" method="post" id="loginForm">
        <div>
          <label class="form-label form-label-lg">Email</label>
          <input type="email" class="form-control form-control-lg" required placeholder="example@gmail.com" name="loginEmail">
        </div>
        <div>
          <label class="form-label form-label-lg">Password</label>
          <input type="password" class="form-control form-control-lg" required placeholder="pass" name="loginPassword">
        </div>
        <br>
        <div>
          <button type="submit" class="btn btn-primary w-100 btn-lg" name="loginButton">Login</button>
        </div>
      </form>

      <!-- Signup -->
      <div>
        Create account. <a href="./signup.php">Signup</a>
      </div>

      <!-- copyright  -->
      <?php include("../php/copyright.php")?>
    </main>

  </body>
</html>