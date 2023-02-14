<?php
require "connection.php";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT vote_status FROM users where vote_status='voted' ORDER BY email";
$sql2="SELECT vote_status FROM users where vote_status='notvoted' ORDER BY email";
$sql3="SELECT vote_status FROM users where vote_status='voted' OR vote_status='notvoted' ORDER BY email";


if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  //printf("Total Voters %d rows.\n",$rowcount);
  //echo $rowcount;
  // Free result set
  mysqli_free_result($result);
  }

  if ($result2=mysqli_query($con,$sql2))
  {
  // Return the number of rows in result set
  $rowcount2=mysqli_num_rows($result2);
  //printf("Total Voters %d rows.\n",$rowcount2);
  //echo $rowcount2;
  // Free result set
  mysqli_free_result($result2);
  }

  if ($result3=mysqli_query($con,$sql3))
  {
  // Return the number of rows in result set
  $rowcount3=mysqli_num_rows($result3);
  //printf("Total Voters %d rows.\n",$rowcount3);
  //echo $rowcount3;
  // Free result set
  mysqli_free_result($result3);
  }



mysqli_close($con);
?>