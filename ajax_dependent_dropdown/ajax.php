<?php
include("database.php");
if(!empty($_POST['country_id'])){
  $id=$_POST['country_id'];
  $sel=mysqli_query($conn,"select id,name from state where country_id=$id");
  echo "<option value=''>Select State </option>";
  while($arr=mysqli_fetch_assoc($sel)){
      echo "<option value='".$arr['id']."'>".$arr['name']."</option>";
  }
}
if(!empty($_POST['state_id'])){
    $id=$_POST['state_id'];
    $sel=mysqli_query($conn,"select id,name from city where state_id=$id");
    echo "<option value=''>Select City </option>";
    while($arr=mysqli_fetch_assoc($sel)){
        echo "<option value='".$arr['id']."'>".$arr['name']."</option>";
    }
  }
?>