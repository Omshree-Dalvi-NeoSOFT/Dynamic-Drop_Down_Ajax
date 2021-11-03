<?php 
 include("database.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ajax Dropdown</title>
  </head>
  <body>
    <h1>Dependent Dropdown Ajax with Mysql</h1>
    <div class="container">
        <div class="form-group">
    <select class="form-control" id="country">
       <option value=""> Country </option>
       <?php 
     $sel=mysqli_query($conn,"select * from country");
     while($arr=mysqli_fetch_assoc($sel)){
         ?>
         <option value="<?= $arr['id'];?>"><?= $arr['name'];?></option>
         <?php
     }
       ?>
    </select>
    </div>
    <div class="form-group">
    <select class="form-control" id="state">
       <option value=""> State </option>
    </select>
    </div>
    <div class="form-group">
    <select class="form-control" id="city">
       <option value=""> City </option>
    </select>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(document).on('change',"#country",function(){
                var countryId=$(this).val();
                if(countryId){
                    $.ajax({
                        type:"POST",
                        url:"ajax.php",
                        data:{'country_id':countryId},
                        success:function(result){
                            $("#state").html(result);
                        }
                    })
                }
            })
            $(document).on('change',"#state",function(){
                var stateId=$(this).val();
                if(stateId){
                    $.ajax({
                        type:"POST",
                        url:"ajax.php",
                        data:{'state_id':stateId},
                        success:function(result){
                            $("#city").html(result);
                        }
                    })
                }
            })
        })
    </script>  
</body>
</html>