<?php
include "./xcommon.php";

// get the id from the previous page to use here
$id = $_REQUEST['id'];

// get all courses that match the id of the selected pathway
$query1 = "select * from Course;";

// display Compulsory classes of all courses
$query2 = "select * from Course where Compulsory='Y';";

//
$results1 = mysqli_query($GLOBALS['conn'], $query1) or die(mysqli_error($GLOBALS['conn']));;
$results2 = mysqli_query($GLOBALS['conn'], $query2) or die(mysqli_error($GLOBALS['conn']));;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Course List</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <nav>
    <ul>
      <li><a href="https://www.unitec.ac.nz/" target="_blank">Unitec</a></li>
      <li><a href="index.php" target="_blank">Pathway Planner</a></li>
    </ul>
  </nav>

  <?php

  // use the id that is parsed to this page to determine the title of the programme
  // then set the variable PTitle to be the right rewsult, making this page modular
  $gettitle = "select * from Programme where ProgrammeID=$id";
  $titleresult = mysqli_query($GLOBALS['conn'], $gettitle) or die(mysqli_error($GLOBALS['conn']));


  // bad logic but currently only 1 needs to be selected
  while ($mytitle = mysqli_fetch_array($titleresult))
  {
    $PTitle = $mytitle['ProgrammeName'];

    // start formatting the page and print the title
    echo "<h1>".$PTitle."</h1>";
  }

  // bulk logic, these are the fields from the database
  // this displays every class in the pathway, which will be needed until the database is updated
  while ($CourseResults = mysqli_fetch_array($results1))
  {
    $CC = $CourseResults['CourseCode'];
    $CName = $CourseResults['CourseName'];
    $level = $CourseResults['Level'];
    $PWID = $CourseResults['PathwayID'];
    $Requisite = $CourseResults['PreRequisite'];
    $CRequisite = $CourseResults['CoRequisite'];
    $Compulsory = $CourseResults['Compilsory'];
    $Credits = $CourseResults['Credits'];

    // segment each course into  its own box
    echo "<div>";

    // display each courses titles
    echo "<h2>".$CName." - ".$level." - ".$CC."</h2>";
    echo "<h3>In pathway: ".$PWID."</h3>";

    // display extra info
    echo "<hr>";
    echo "<h2>PreRequisite: ".$Requisite."</h2>";
    echo "<h2>CoRequisite: ".$CRequisite."</h2>";
    echo "<h3>Compulsory: ".$Compulsory."</h3>";
    echo "<h3>Credits: ".$Credits."</h3>";

    // close the block
    echo "</div>";
  }

  // display the Compulsory courses, this has to be its own loop
  while ($CourseResults = mysqli_fetch_array($results2))
  {
    $CC = $CourseResults['CourseCode'];
    $CName = $CourseResults['CourseName'];
    $level = $CourseResults['Level'];
    $PWID = $CourseResults['PathwayID'];
    $Requisite = $CourseResults['PreRequisite'];
    $CRequisite = $CourseResults['CoRequisite'];
    $Compulsory = $CourseResults['Compilsory'];
    $Credits = $CourseResults['Credits'];

    // segment each course into  its own box
    echo "<div>";

    // display each courses titles
    echo "<h2>".$CName." - ".$level." - ".$CC."</h2>";
    echo "<h3>In pathway: ".$PWID."</h3>";

    // display extra info
    echo "<hr>";
    echo "<h2>PreRequisite: ".$Requisite."</h2>";
    echo "<h2>CoRequisite: ".$CRequisite."</h2>";
    echo "<h3>Compulsory: ".$Compulsory."</h3>";
    echo "<h3>Credits: ".$Credits."</h3>";

    // close the block
    echo "</div>";
  }

  ?>

  </body>
  </html>
