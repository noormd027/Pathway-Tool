<?php
include "./xcommon.php";

// get the id from the previous page to use here
$id = $_REQUEST['id'];

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
      <li><a href="index.html" target="_blank">Pathway Planner</a></li>
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

  </body>
  </html>
