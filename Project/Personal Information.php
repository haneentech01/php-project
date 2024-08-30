<?php
 require_once 'connect.php'; 
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

  <title>Personal Information</title>

</head>

<body>
<?php  
$activePage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
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


  <div class="title">
    <p>Personal Information</p>
  </div>

  <div class="container-body">
    <div class="left">
      <div class="detail">
        <p class="col-25">Full Name:</p>
        <p class="col-75">Haneen Shaikha</p>
      </div>

      <div class="detail">
        <p class="col-25">Gender:</p>
        <p class="col-75">Female</p>
      </div>

      <div class="detail">
        <p class="col-25">Birth Date:</p>
        <p class="col-75">06<sup>th</sup>, June 2001 </p>
      </div>

      <div class="detail">
        <p class="col-25">Notionality:</p>
        <p class="col-75">Palestinian</p>
      </div>

      <div class="detail">
        <p class="col-25">Place of Birth:</p>
        <p class="col-75">Gaza</p>
      </div>

      <div class="detail">
        <p class="col-25">Job title:</p>
        <p class="col-75">Software Engineering</p>
      </div>

      <div class="detail">
        <p class="col-25">Year of Experience:</p>
        <p class="col-75">3 years</p>
      </div>

    </div>

    <img class="img-profile" src="img/profile.jpg" alt="Person">
  </div>
</body>

</html>
