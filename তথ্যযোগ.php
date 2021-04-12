<?php
  include 'সংযোগ.php';

  $sql = "SELECT * FROM `amounts`";
  $result = mysqli_query($connect, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $ramount = $row["rent"];
      $samount = $row["service"];
      $wamount = $row["water"];
      $eamount = $row["electricity"];
      $gamount = $row["gas"];
    }
  }

  if(isset($_POST['rentm'])) $rentmonth = $_POST['rentm'];
  if(isset($_POST['rentt'])) $renttype = $_POST['rentt'];
  if(isset($_POST['rentd'])) $rentdate = $_POST['rentd'];
  if(isset($_POST['rent'])) $rent = $_POST['rent'];

  $col  ="$renttype";


  if ($renttype == "rent") {   
    $date = "date";
  } elseif ($renttype == "service") {   
    $date = "serviced";
  } elseif ($renttype == "water") {   
    $date = "waterd";
  } elseif ($renttype == "electricity") {   
    $date = "electricityd";
  } else {   
    $date = "gasd";
  } 

  $sql = "SELECT * FROM `bills` WHERE `Month`= '$rentmonth'";
  $result = mysqli_query($connect, $sql);

  if (mysqli_num_rows($result) > 0) {
    $exist="1";
  } else {
    $exist="0";
  }

  if ($exist == '0') { 
    
    $sql= " INSERT INTO `bills` (`No`, `Month`,  `$date`, `rent`, `service`, `water`, `electricity`, `gas`)
            VALUES (NULL, '$rentmonth', '$rentdate', $ramount, $samount, $wamount, $eamount, $gamount)";

    if (mysqli_query($connect, $sql)) {
      header("location: index.php");
    } else {
      echo "সমস্যা: " . mysqli_error($connect);
    } 
  } else {
    $sql = " UPDATE `bills` SET `$col` = $rent, `$date`='$rentdate' WHERE `Month` = '$rentmonth' ";
    
    if (mysqli_query($connect, $sql)) {
      header("location: index.php");
    } else {
      echo "সমস্যা: " . mysqli_error($connect);
    } 
  
  }
  mysqli_close($connect);
?>

