<?php
include "./xcommon.php";

// get the id from the previous page to use here
$id = $_REQUEST['id'];

// switch is used to sort items in the page
if (empty($_REQUEST['i'])) $_REQUEST['i'] = '1';
switch($_REQUEST['i'])
{
  case '1':
    // sort by id lowest to highest
		$query = "select * from Pathways where ProgrammeID=$id order by PathwayID des;";
		$results = mysqli_query($conn, $query) or die(mysqli_error($conn));
		break;
	case '2':
    // sort by id highest to lowest
		$query = "select * from Pathways where ProgrammeID=$id order by PathwayID asc;";
		$results = mysqli_query($conn, $query) or die(mysqli_error($conn));
		break;
	case '3':
    // sort by name a-z
		$query = "select * from Pathways where ProgrammeID=$id order by PathwayName des;";
		$results = mysqli_query($conn, $query) or die(mysqli_error($conn));
		break;
}

?>

  <p>Sort by: | <a href='./pathways.php?i=1&id=<?php echo $id ?>'>Class ID</a> | <a href='./pathways.php?i=2&id=<?php echo $id ?>'>Class Name</a> | <a href='./pathways.php?i=3&id=<?php echo $id ?>'>Year</a></p>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Classes in Cybersecurity</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <nav>
    <ul>
      <li><a href="https://www.unitec.ac.nz/" target="_blank">Unitec</a></li>
      <li><a href="index.html" target="_blank">Pathway Planner</a></li>
    </ul>
  </nav>

  <?php

  // use the id that is parsed to this page to determine the title of the programme
  // then set the variable PTitle to be the right rewsult, making this page modular
  $gettitle = "select * from Programme where ProgrammeID=$id";
  $titleresult = mysqli_query($conn, $gettitle) or die(mysqli_error($conn));

  // bad logic but currently only 1 needs to be selected
  while ($mytitle = mysqli_fetch_array($titleresult))
  {
    $PTitle = $titleresult['ProgrammeName'];

    // start formatting the page and print the title
    echo "<h1>".$PTitle."</h1>";
  }

  while ($PathwayResults = mysqli_fetch_array($results))
  {
    $PWID = $PathwayResults['PathwayID'];
    $PWName = $PathwayResults['PathwayName'];

    // segment each pathway into  its own box
    echo "<div>";

    // display each pathway
    echo "<h2>".$PWName."</h2>";
    echo "<h3>".$PWID."</h3>";

    //create a link to the next page, parsing the pathwayID
    echo "<a href='./courses.php?id=".$PWID."'>Show Courses in Pathway</a>";

    // close the block
    echo "</div>";
  }

  ?>

  <h1>Cybersecurity Pathway</h1>
  <div class="classes">
    <ul>
      <?php // This will be its own search querry for the database ?>
      <h3>First Year</h3>
      <li><a href="#">ISCG5400 Hardware Fundaments</a></li>
      <li><a href="#">ISCG5401 Operating System Funcdamentals</a></li>
      <li><a href="#">ISCG5420 Programming Fundamentals</a></li>
      <li><a href="#">ISCG5430 Prof Skills IT Practitioners</a></li>
    </ul>
    <ul>
      <?php // This will be its own search querry for the database ?>
      <h3>Second Year</h3>
      <li><a href="#">ISCG6400 Hardware Technology</a></li>
      <li><a href="#">ISCG6401 Data Communications & Networks</a></li>
      <li><a href="#">ISCG6413 Testing & Quality Assurance</a></li>
      <li><a href="#">ISCG6411 Project Planning & Control</a></li>
    </ul>
    <ul>
      <?php // This will be its own search querry for the database ?>
      <h3>Third Year</h3>
      <li><a href="#">ISCG7430 Project</a></li>
      <li><a href="#">ISCG7431 Capstone Project</a></li>
      <li><a href="#">ISCG7407 Advanced Cybersecurity</a></li>
      <li><a href="#">ISCG7404 Computer Forensics Investigation</a></li>
    </ul>
  </div>
  <div class="selectClasses">
    <form class="selectClasses" action="selectClasses.php" method="post">
      <h3>Select Your Classes</h3>
      First Year <br>
      <input type="checkbox" name="ISCG5400 Hardware Fundaments" value="ISCG5400" tabindex="1"/>ISCG5400 Hardware Fundaments </br>
      <input type="checkbox" name="ISCG5401 Operating System Funcdamentals" value="ISCG5401" tabindex="2"/>ISCG5401 Operating System Funcdamentals </br>
      <input type="checkbox" name="ISCG5420 Programming Fundamentals" value="ISCG5420" tabindex="3"/>ISCG5420 Programming Fundamentals </br>
      <input type="checkbox" name="ISCG5430 Prof Skills IT Practitioners" value="ISCG5430" tabindex="4"/>ISCG5430 Prof Skills IT Practitioners </br>
      Second Year <br>
      <input type="checkbox" name="ISCG6400 Hardware Technology" value="ISCG6400" tabindex="5"/>ISCG6400 Hardware Technology </br>
      <input type="checkbox" name="ISCG6401 Data Communications & Networks" value="ISCG6401" tabindex="6"/>ISCG6401 Data Communications & Networks</br>
      <input type="checkbox" name="ISCG6413 Testing & Quality Assurance" value="ISCG6413" tabindex="7"/>ISCG6413 Testing & Quality Assurance </br>
      <input type="checkbox" name="ISCG6411 Project Planning & Control" value="ISCG6411" tabindex="8"/>ISCG6411 Project Planning & Control </br>
      Third Year <br>
      <input type="checkbox" name="ISCG7430 Project" value="ISCG7430" tabindex="9"/>ISCG7430 Project </br>
      <input type="checkbox" name="ISCG7431 Capstone Project" value="ISCG7431" tabindex="10"/>ISCG7431 Capstone Project</br>
      <input type="checkbox" name="ISCG7407 Advanced Cybersecurity" value="ISCG7407" tabindex="11"/>ISCG7407 Advanced Cybersecurity </br>
      <input type="checkbox" name="ISCG7404 Computer Forensics Investigation" value="ISCG7404" tabindex="12"/>ISCG7404 Computer Forensics Investigation </br>
      <input type="submit" name="Print" value="Print">

    </form>

  </body>
  </html>
