<?php 

  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <!--------------------------------------------------SIDEbare------------------------------------------------------------------------------->
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
            <span ><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status'];?></p>
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
  <!--------------------------------------------------CHATBOX--------------------------------------------------------------------------------->
  <div class="wrapper">
   <div  class="chat_cont">
    <section class="chat-area">     
      <header>

      <?php
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");                
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql); 
          }else{
            header("location: users.php");
          } 
        ?>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span id="name"><?php echo $row['fname']. " ". $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
       
        <div class="toggle">
         <button id="toggle-button">
            <span id="icon"class="material-symbols-outlined">more_vert</span>
         </button>
         <div id="more-content" class="hidden">
           <ul><a href="#" style="color: #333;">Info do contact</a></ul>
           <ul><a href="#" style="color: #333;">Selection of messages</a></ul>
           <ul><a href="users.php" style="color: #333;">close the discussion</a></ul>
         </div>
      </div>
      </header>
      <div class="chat-box">
      </div>

      <form action="#" class="typing-area"  autocomplete="off">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message"   id="message" class="input-field" placeholder="Type a message here..." autocomplete="off" value="" required="">
        <button ><span class="material-symbols-outlined">send</span></button>

      </form>
    </section>
  </div>
</div>

 <!--------------------------------------------------- chatbot html  -------------------------------------------------------------------------------------------------------------->

 <!----------------------------------------------------end chatbot html----------------------------------------------------------------------------------------------->
 <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout"><span class="material-symbols-outlined">logout</span></a>
<!------------------------------------------------------------Whatsapp---------------------------------------------------------------------------------------------------------------->
<?php include("whatsapp.php");?>
<!---------------------------------------------------------------------------------------------------------------------------------------------------->

  <script src="javascript/chat.js"></script>
  <script src="javascript/users.js"></script>
  <script src="javascript/searchmessage.js"></script>
  <script src="javascript/more.js"></script>

  
 



</body>
</html>
