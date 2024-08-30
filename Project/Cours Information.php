<?php
require_once 'connect.php';
$result = mysqli_query($connect, "SELECT * FROM courses ORDER BY id DESC");
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

  <title>Courses Information</title>

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


    <div class="body">
        <div class="title" style="margin-left: 26px;">
            <p>All Courses Information</p>
        </div>


        <table class="table-course-information" border="1" cellspacing="0" cellpadding="5" width=100%>

            <tr class="tr" bgcolor="gray">
                <th class="th" rowspan="2">#</th>
                <th class="th" rowspan="2">Course name</th>
                <th class="th" rowspan="2">Total hours</th>
                <th class="th" colspan="2">Date</th>
                <th class="th" rowspan="2">Institution</th>
                <th class="th" rowspan="2">Attachment</th>
                <th class="th" rowspan="2">Notes</th>
            </tr>

            <tr bgcolor="gray">
                <th>From</th>
                <th>To</th>
            </tr>

            <?php
                $i = 0;
                while($courses = mysqli_fetch_array($result)) {
                    $i++;
            ?>

               <tr class="td" bgcolor="#E1DEDD">
                <th><?php echo $i; ?></th>
                <td><?php echo $courses['name']; ?></td>
                <td><?php echo $courses['numberOfHours']; ?></td>
                <td style="white-space:nowrap;"><?php echo $courses['startDate']; ?></td>
                <td style="white-space:nowrap;"><?php echo $courses['endDate']; ?></td>
                <td><?php echo $courses['institution']; ?></td>
                <td><a href="./certification.php?id=<?php echo $courses['id']; ?>">View</a></td>
                <td><?php echo $courses['notes']; ?></td>
            </tr>
            <?php
             } 
             ?>
        </table>
        
    </div>
</body>

</html>