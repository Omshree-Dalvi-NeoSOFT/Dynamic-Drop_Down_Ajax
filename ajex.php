<?php 
include("databse.php");
if(!empty($_POST['country_id'])){
    $id=$_POST['country_id'];
    $fetch=mysqli_query($conn,"SELECT id,name FROM state WHERE country_id=$id;");
    echo "<option value=''> Select State </option>";
    while($arr=mysqli_fetch_assoc($fetch)){
        echo "<option value='".$arr['id']."'>".$arr['name']."</option>";
    }
}

if(!empty($_POST['state_id'])){
    $id=$_POST['state_id'];
    $fetch=mysqli_query($conn,"SELECT id,name FROM city WHERE state_id=$id;");
    echo "<option value=''> Select State </option>";
    while($arr=mysqli_fetch_assoc($fetch)){
        echo "<option value='".$arr['id']."'>".$arr['name']."</option>";
    }
}
?>