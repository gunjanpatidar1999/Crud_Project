<?php

include("connection.php");

if(!empty($_GET['del']))
{
    $id = $_GET['del'];
    if(mysqli_query($conn,"delete from crud_operation where id = $id"));
    {
        header("location:index.php");
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

    <title>Employee Deatils</title>
</head>

<body>
    <br>
    <br>
    <div class="container">
        <h1>Employee Deatils</h1>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td colspan="7" align="center"><a href="addemployee.php" class="btn btn-info">Add Employee</a></td>
                </tr>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">City</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            $sel = mysqli_query($conn, "select * from crud_operation order by created_at desc");

            if (mysqli_num_rows($sel) > 0) {
                $sn = 1;
                while ($arr = mysqli_fetch_assoc($sel)) {
            ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $arr['email'] ?></td>
                        <td><?php echo $arr['name'] ?></td>
                        <td><?php echo $arr['age'] ?></td>
                        <td><?php echo $arr['city'] ?></td>
                        <td><?php echo $arr['gender'] ?></td>
                        <td>
                            <a href="editemployee.php?edit=<?php echo $arr['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="?del=<?php echo $arr['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                <?php
                    $sn++;
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" align="center">No record found</td>
                </tr>
            <?php
            }

            ?>



        </table>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>