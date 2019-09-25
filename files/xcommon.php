<?php
// start the session to the server
	session_start();

  // set the time zone to auckland time, so the database can handle dates correctly
  date_default_timezone_set('Pacific/Auckland');

  // connect to the raspberry pi server with the login details
	$GLOBALS['conn'] = mysqli_connect("localhost", "fred", "20Triangle", "DATABASE HERE");

  // very bad for security, but print an error if connection fails
  if(!$GLOBALS['conn']){
    
    // remove these lines before the final release!!!
		die("Connection failed: ".mysqli_connect_error());
	}
