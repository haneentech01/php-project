<?php
require_once 'connect.php'; 
error_reporting(0);

$category = $title = $startDate = $endDate = $institution = $description = "";
$errors = array();

if(isset($_POST['submit'])) {


  if(empty(trim($_POST["category"]))) {
    $errors['category'] = "Your category is wanted";
  } else {
    $category = trim($_POST["category"]);
  }

 
  if(empty(trim($_POST["title"]))) {
    $errors['title'] = "Your title is wanted";
  } else {
    $title = trim($_POST["title"]);
  }

  
  if(trim($_POST["startDate"]) != NULL) {
    $startDate = trim($_POST["startDate"]);
  }


  if(empty(trim($_POST["endDate"]))) {
    $errors['endDate'] = "Your End Date is wanted";
  } else {
    $endDate = trim($_POST["endDate"]);
  }


  if(empty(trim($_POST["institution"]))) {
    $errors['institution'] = "Your institution is wanted";
  } else {
    $institution = trim($_POST["institution"]);
  }

   
  if(empty(trim($_POST["description"]))) {
    $errors['description'] = "Your description is wanted";
  } else {
    $description = trim($_POST["description"]);
  }

  if(count($errors) == 0) {
    $insertData = "INSERT INTO experiences(category,title,startDate,endDate,institution,description) VALUES('$category','$title','$startDate','$endDate','$institution','$description')";
    $result = mysqli_query($connect, $insertData);
    if($result) {
      echo "Success";
      header("Location: experienceInforamtion.php");
      exit();
    } else {
      die(mysqli_errno($connect));
    }
  }
 
}

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
  
  <style>
    span {
      color: red;
      font-size: 14px;
    }
  </style>

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


  <div class="form-exeprience">
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div>
        <label for="experience-category">Experiences Category:</label>
        <select id="experience-category" name="category">
          <option selected disabled>Select your category</option>
          <option value="Java">Java</option>
          <option value="PHP">PHP</option>
          <option value="C++">C++</option>
          <option value="Html">Html</option>
          <option value="SQL">SQL</option>
        </select><br>
        <span><?php echo $errors['category']; ?></span>
      </div>

      <div class="form-experience-item">
        <label for="experience-title">Experiences Title:</label>
        <input id="experience-title" type="text" name="title"><br>
        <span><?php echo $errors['title']; ?></span>
      </div>
      <div class="form-experience-item">
        <label for="start-date-experience">Start Date:</label>
        <input id="start-date-experience" type="date" name="startDate">
      </div>

      <div class="form-experience-item">
        <label for="end-date-experience">End Date:</label>
        <input id="end-date-experience" type="date" name="endDate"><br>
        <span><?php echo $errors['endDate']; ?></span>
      </div>

      <div class="form-experience-item">
        <label for="institution-experience">Institution:</label>
        <input id="institution-experience" type="text" name="institution"><br>
        <span><?php echo $errors['institution']; ?></span>
      </div>

      <div class="form-experience-item">
        <label class="description-experience" for="description-experience">Description:</label>
        <textarea class="textarea-experience" id="description-experience" name="description" cols="60" rows="7"></textarea><br>
        <span><?php echo $errors['description']; ?></span>
      </div>

      <div class="form-experience-item-last">
        <input class="btn-save-experience" type="submit" value="Save" name="submit">
        <input class="btn-reset-experience" type="reset" value="Reset" name="reset">
      </div>
    </form>
  </div>
  <img class="experience-img" src="img/experience.jpg" width="400" height="556">
</body>

</html>