<?php
require_once 'connect.php';
$result = mysqli_query($connect, "SELECT * FROM experiences ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="120">
    <meta name="keywords" content="html,css">
    <meta name="desctption" contant="lab in azhar">
    <meta name="author" contant="Haneen">
    <meta name="viewport" content="with=device-with,intial-scal=1.0">
  
  <link rel="stylesheet" href="css/style.css">

  <title>Add Experience Page</title>

</head>

<body>
  <?php
$activePage = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
  ?>

  <header>
    <div class="container">
      <nav>
        <ul>
        <li><a class="<?php echo $activePage == "Personal Information.php" ? "link-active" : ""; ?>" href="Personal Information.php"><b>Personal Information</b></a></li>
        <li><a class="<?php echo $activePage == "Course Information.php" || $activePage == "certification.php" ? "link-active" : ""; ?>" href="Course Information.php"><b>Courses Information</b></a></li>
        <li><a class="<?php echo $activePage == "Experience Inforamtion.php" ? "link-active" : ""; ?>" href="Experience Inforamtion.php"><b>Experience Information</b></a></li>
        <li><a class="<?php echo $activePage == "Add Course.php" ? "link-active" : ""; ?>" href="Add Course.php"><b>Add Course</b></a></li>
        <li><a class="<?php echo $activePage == "Add Experience.php" ? "link-active" : ""; ?>" href="Add Experience.php"><b>Add experience</b></a></li>
        </ul>
        <div class="nav-logo"><img src="img/logo.png" width="50" height="50"></div>
      </nav>
    </div>
  </header>


  <div class="container-body">
    <div class="body">
      <div class="title">
        <p>All Experiences Information</p>
      </div>
      
      <?php
      while ($experience = mysqli_fetch_array($result)) {
      ?>
      
      <div class="row">
          <h3><?php echo $experience['category'] ?> <sub><?php echo $experience['institution'] ?></sub></h3>
          <h5>from <?php echo $experience['startDate'] . ' to ' . $experience['startDate']; ?> </h5>
          <p><?php echo $experience['description'] ?></p>
        </div>
      
      <?php 
      }
      ?>
    </div>
  </div>
</body>

</html>