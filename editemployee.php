<?php 
 include("connection.php");

$id = $_GET['edit'];
$sel = mysqli_query($conn, "select * from crud_operation where id=$id");
$arr = mysqli_fetch_assoc($sel);

 if(isset($_POST['sub']))
 {
     $email = $_POST['email'];
     $name = $_POST['name'];
     $age = $_POST['age'];
     $city = $_POST['city'];
     $gender = $_POST['gender'];

    if(mysqli_query($conn,"update crud_operation set email='$email', name='$name',age = '$age',city='$city',gender='$gender' where id=$id"))
    {
        header("location:index.php");
    }
    else
    {
        echo "Updating error!";
    }


 }



?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add Employee</title>
</head>

<body>
    <br>
    <br>

    <div class="container">
        <h1>Edit Deatils</h1>
        <br>

        <form method="POST">

            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo $arr['email']; ?>">
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo $arr['name']; ?>">
            </div>

           <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter Age" name="age" value="<?php echo $arr['age']; ?>">
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $arr['city']; ?>">
            </div>

            <div class="form-group">
                <label>Gender</label>&nbsp; &nbsp;
                <input type="radio" name="gender" value="<?php echo $arr['gender']; ?>"> Male &nbsp; <input type="radio"  name="gender" value="<?php echo $arr['gender']; ?>"> Female 
            </div>

            <button type="submit" class="btn btn-primary" name="sub">Add </button>
        </form>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>