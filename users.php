<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }

?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <div class="container">
    <section class="users">
      <header>
        <div class="content">

          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>

          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <div class="nav_icons">
           <button><a href="users.php" style="color: #333;"><span class="material-symbols-outlined">chat</span></button></a>
         
        </div>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      </div>
    </section>
  </div>
</div>

<div class="wrapper">
  <img src="/img/2e26a62787a0c18bee2133a893a7d3cb.jpg" class="backgroundimg">
</div>





<a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout"><span class="material-symbols-outlined">logout</span></a>


  <script src="javascript/users.js"></script>
</body>
</html>
