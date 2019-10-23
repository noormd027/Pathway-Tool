<?php
include "./xcommon.php";

// select all the programmes and display them
$ProgrammeQuery = "SELECT * FROM Programme;";
$ProgrammeResults = mysqli_query($GLOBALS['conn'], $ProgrammeQuery) or die(mysqli_error($GLOBALS['conn']));

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pathway Planner</title>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <nav>
    <ul>
      <li><a href="https://www.unitec.ac.nz/" target="_blank">Unitec</a></li>
      <li><a href="#">Information</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <h1>Pathway Planner</h1>
  <h2>Select Your Study Options</h2>
  <ul class="courseSelections">
    <?php

    // while there is a record to show, display the ID and the Hame
    while ($programmes = mysqli_fetch_array($ProgrammeResults))
    {
      // get variables to print
      $ID = $programmes['ProgrammeID'];
      $Name = $programmes['ProgrammeName'];

      // this is the redirect code, looks messy but you should get an output like:
      // mikex.co.nz/testing/pathways.php?id=xxx

      // get all the pathways that are relevent to the selected degree
      $PathwayQuerry = "SELECT PathwayID FROM Pathway where ProgrammeID=$ID;";
      $PathwayResults = mysqli_query($conn, $PathwayQuerry) or die(mysqli_error($conn));

      // if there is a pathway to display, show it
      while ($pathways = mysqli_fetch_array($PathwayResults))
      {
        // set the link ID to the correct ID
        $PWID = $pathways['PathwayID'];

        //revised the code so it's easier to read
        echo "<li>$ID - $Name: <a href='pathways.php?i=1&id=$PWID'>Click Me</a></li>";
    }
    ?>

</ul>
</body>
</html>
<?php
