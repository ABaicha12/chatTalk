<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: chat.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper1">
    <section class="form login">
    <img src="img/Connection.png">
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
         <header>Welcome 👋 </header>
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
      </form>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
