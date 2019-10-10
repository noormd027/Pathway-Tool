<?php
include "./xcommon.php";

// Note to the devs of this page!
// commented code is relevant for later on, but not now

//if (empty($_REQUEST['i'])) $_REQUEST['i'] = '1';
//switch($_REQUEST['i'])
//{
//  case '1':
//  ListDegrees(0);
//  break;
//  case '2':
//  tempThing();
//  break;
//  default:
//  ListDegrees(0);
//}

$ProgrammeQuerry = "SELECT * FROM Programme order by ProgrammeName ASC;";
//$PathwayQuerry = "SELECT * FROM Pathway order by PathwayName ASC;";
$ProgrammeResults = mysqli_query($conn, $ProgrammeQuerry) or die(mysqli_error($conn));
//$PathwayResults = mysqli_query($conn, $PathwayQuerry) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pathway Planner</title>
  <link rel="stylesheet" href="./style.sss">
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
    // this code is sooo bad, this needs fixing, currently parsing the id to
    // another page to do the processing and show the list of attached pathways
    // but this can be re-written so only this page is needed by using a switch
    // however this works for what we have currently developed.
    while ($programmes = mysqli_fetch_array($ProgrammeResults))
    {
      $ID = $programmes['ProgrammeID']
      $Name = $programmes['ProgrammeName'];

      // this is the redirect code, looks messy but you should get an output like:
      // mikex.co.nz/testing/pathways.php?id=xxx
      // this should work, once there is a pathways.php page setup
      ?>
      <li><?php echo $ID." - ".$Name; ?> - <a href="pathways.php?id=<?php echo $ID; ?>">Temp Link</a> </li>
      <?php
    }
    ?>

    <!--The code below is fine, however having static lists is bad, and we will re-write this later-->

    <ul class="Bachelors">
      <li><a href="#">Bachelor of Architectural Techlogy</a></li>
      <li><a href="#">Bachelor of Computer Systems</a>

        <ul>
          <li><a href="#">Computer Networks and Cloud Compting</a></li>
          <li><a href="#">Software Engineering</a></li>
          <li><a href="#">Games Development</a></li>
          <li><a href="#">Business Intellingence</a></li>
          <li><a href="cybersecurity.html" target="_blank">Cybersecurity</a></li>
        </ul>
      </li>

      <li><a href="#">Bachelor of Nursing</a></li>
      <li><a href="#">Bachelor of Osteopath</a></li>
    </ul>
  </li>

  <li><a href="#">Graduate Diplomas</a></li>
  <li><a href="#">Postgraduates</a></li>
</ul>
</body>
</html>
