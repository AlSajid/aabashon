<?php
    include 'সংযোগ.php';

    $sql = "DELETE FROM bills WHERE `No`=".$_GET['id'];

    if ($connect->query($sql) === TRUE) {
        header("location: index.php");
      } else {
        echo "Error deleting record: " . $connect->error;
      }
      

?>