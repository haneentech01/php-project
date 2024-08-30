<?php
require_once 'connect.php';
error_reporting(0);

$nameCourse = $startDate = $endDate = $institution = $url = $file = $notes = "";
$numberOfHours = $attachment = 0;
$errors = array();

if (isset($_POST['submit'])) {

  
  if (empty(trim($_POST["name"]))) {
    $errors['name'] = "Your name is wanted";
  } else {
    $nameCourse = trim($_POST["name"]);
  }

  
  if (empty(trim($_POST["numberOfHours"]))) {
    $errors['numberOfHours'] = "Your Number Of Hours is wanted";
  } else {
    $numberOfHours = trim($_POST["numberOfHours"]);
  }

  if (trim($_POST["startDate"]) != NULL) {
    $startDate = trim($_POST["startDate"]);
  }


  if (empty(trim($_POST["endDate"]))) {
    $errors['endDate'] = "Your End Date is wanted";
  } else {
    $endDate = trim($_POST["endDate"]);
  }

  
  if (empty(trim($_POST["institution"]))) {
    $errors['institution'] = "Your institution is wanted";
  } else {
    $institution = trim($_POST["institution"]);
  }

  
  $validExtension = array("jpg", "png", "gif", "jpeg");
  $attachment = trim($_POST["attachment"]);
  if ($_POST["attachment"] == 0) {
    // Validate file 
    if (empty(trim($_FILES['file']['name']))) {
      $errors['file'] = "Your file is wanted";
    } else {
      $name = $_FILES['file']['name'];
      list($txt, $ext) = explode(".", $name);
      if (in_array($ext, $validExtension)) {
        $file = time() . "." . $ext;
        $tmp = $_FILES['file']['tmp_name'];
      } else {
        $errors['file'] = "Your file '$ext' doesn't match: 'jpg', 'png', 'gif', 'jpeg'";
      }
    }
  } else {
  
    if (empty(trim($_POST["url"]))) {
      $errors['url'] = "Your url is wanted";
    } else {
      $url = basename($_POST["url"]);
      list($txt, $ext) = explode(".", $url);
      if (in_array($ext, $validExtension)) {
        file_put_contents("img/courses/$url", file_get_contents($_POST["url"]));
      } else {
        $errors['url'] = "Your url '$ext' doesn't match: 'jpg', 'png', 'gif', 'jpeg'";
      }
    }
  }

   
  if (empty(trim($_POST["notes"]))) {
    $errors['notes'] = "Your notes is wanted";
  } else {
    $notes = trim($_POST["notes"]);
  }

  if (count($errors) == 0) {
    if (move_uploaded_file($tmp, 'img/courses/' . $file) && empty(trim($_POST["url"])) || !empty(trim($_POST["url"])) && empty(trim($_FILES['file']['name']))) {
      $insertData = "INSERT INTO courses(name,numberOfHours,startDate,endDate,institution,attachment,url,file,notes) VALUES('$nameCourse','$numberOfHours','$startDate','$endDate','$institution','$attachment','$url','$file','$notes')";
      echo ($insertData);
      $result = mysqli_query($connect, $insertData);
      echo "Error 4";
      if ($result) {
        echo "Success";
        header("Location: courseInformation.php");
        exit();
      } else {
        die(mysqli_errno($connect));
      }
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

  <title>Add Course Page</title>
  
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


  <div class="form-course">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <div>
        <label for="course-name">Course Name:</label>
        <input id="course-name" type="text" name="name"><br>
        <span><?php echo $errors['name']; ?></span>
      </div>

      <div class="form-course-item">
        <label for="hours-course">Number of Hours:</label>
        <input id="hours-course" type="number" name="numberOfHours" min="1" max="50"><br>
        <span><?php echo $errors['numberOfHours']; ?></span>
      </div>

      <div class="form-course-item">
        <label for="start-date-course">Start Date:</label>
        <input id="start-date-course" type="date" name="startDate">
      </div>

      <div class="form-course-item">
        <label for="end-date-course">End Date:</label>
        <input id="end-date-course" type="date" name="endDate"><br>
        <span><?php echo $errors['endDate']; ?></span>
      </div>

      <div class="form-course-item">
        <label for="institution-course">Institution:</label>
        <input id="institution-course" type="text" name="institution"><br>
        <span><?php echo $errors['institution']; ?></span>
      </div>

      <div class="form-course-item">
        <label for="attachment-course">Attachment:</label>
        <input id="attachment-course-file" type="radio" value="0" name="attachment" checked>
        <label for="attachment-course-file">File</label>
        <input id="attachment-course-url" type="radio" value="1" name="attachment">
        <label for="attachment-course-url">URL</label><br>
        <span><?php echo $errors['attachment']; ?></span>
      </div>

      <div class="form-course-item">
        <label for="url-course">URL:</label>
        <input id="url-course" type="url" name="url"><br>
        <span><?php echo $errors['url']; ?></span>
      </div>

      <div class="form-course-item">
        <label for="file-course">File:</label>
        <input id="file-course" type="file" name="file" value="Choose File"><br>
        <span><?php echo $errors['file']; ?></span>
      </div>

      <div class="form-course-item">
        <label for="textarea-course" style="position: absolute;">Notes:</label>
        <textarea id="textarea-course" name="notes" cols="28" rows="6"></textarea><br>
        <span><?php echo $errors['notes']; ?></span>
      </div>

      <div class="form-course-item">
        <input class="btn-save-course" type="submit" value="Save" name="submit">
        <input class="btn-reset-course" type="reset" value="Reset" name="reset">
      </div>
    </form>
  </div>
  <img class="course-img" src="img/course.jpg" width="550" height="717">
</body>

</html>