<?php
include "./xcommon.php";
?>

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
    <h1>Cybersecurity Pathway</h1>
    <div class="classes">
      <ul>
        <h3>First Year</h3>
        <li><a href="#">ISCG5400 Hardware Fundaments</a></li>
        <li><a href="#">ISCG5401 Operating System Funcdamentals</a></li>
        <li><a href="#">ISCG5420 Programming Fundamentals</a></li>
        <li><a href="#">ISCG5430 Prof Skills IT Practitioners</a></li>
      </ul>
      <ul>
        <h3>Second Year</h3>
        <li><a href="#">ISCG6400 Hardware Technology</a></li>
        <li><a href="#">ISCG6401 Data Communications & Networks</a></li>
        <li><a href="#">ISCG6413 Testing & Quality Assurance</a></li>
        <li><a href="#">ISCG6411 Project Planning & Control</a></li>
      </ul>
      <ul>
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
