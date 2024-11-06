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
      
      <!-- Role  -->
      <div class="mt-2 <?php echo isset($_GET['role']) ? "d-none" : "" ?>">
        <a href="?role=skilled" class="text-decoration-none btn btn-primary btn-lg w-100">Skilled Manual Laborer</a>
        <a href="?role=owner" class="text-decoration-none btn btn-primary btn-lg w-100 mt-2">Homeowner</a>
      </div>
      

      <!-- Signup -->
      <div>

        
        Already have an account. <a href="./index.php">Signup</a>
      </div>
    </main>

  </body>
</html>