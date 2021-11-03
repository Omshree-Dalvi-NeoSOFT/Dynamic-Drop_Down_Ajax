<?php
include("databse.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dynamic DD</title>
</head>
<body>
    <center><h1>Dynamic DropDown</h1></center>
    <div class="container p-4">
        <div class="form-group">
            <select class="form-control" id="country">
                <option value=""> Country </option>
                <?php
                    $sel=mysqli_query($conn,"SELECT * FROM country;");
                    while($arr=mysqli_fetch_assoc($sel)){
                        ?>
                            <option value="<?= $arr['id']?>"><?= $arr['name']?></option>
                        <?php
                    }
                ?>
                
            </select>
    </div><br>
    <div class="form-group">
        <select class="form-control" id="state">
            <option value="">State</option>
            <option value="" class="text-danger" disabled> Select Country !! </option>
        </select>
    </div>
    <br>
    <div class="form-group">
        <select class="form-control" id="city">
        <option value="">City</option>
            <option value="" class="text-danger" disabled> Select city !! </option>
        </select>
    </div>
    

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(document).on('change',"#country",function(){
                var countryId=$(this).val();
                if(countryId){
                    $.ajax({
                        type:"POST",
                        url:"ajex.php",
                        data:{
                            'country_id':countryId
                        },
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
                        url:"ajex.php",
                        data:{
                            'state_id':stateId
                        },
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