<?php
include "connection.php";
$id=$_GET["id"];
$firstname="";
$lastname="";
$email="";
$contact="";

$res=mysqli_query($link,"select * from table1 where id=$id");
while ($row=mysqli_fetch_array($res))
{
    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $email=$row["email"];
    $contact=$row["contact"];

}
header("location.index.php");
?>

<html lang="en" xmlns="">
<head>
    <title>User Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Custom styles for forms */
        body {
            background-color: #f8f9fa; /* Light background for the page */
        }
        .container .col-lg-4 {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 30px; /* Add some space from the top */
            margin-bottom: 30px; /* Add some space at the bottom */
        }

        /* Form heading styling */
        .container .col-lg-4 h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-weight: 500;
        }

        /* Input and textarea styling */
        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px 12px;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }

        .form-control:focus {
            border-color: #66afe9;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
        }

        /* Label styling */
        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }

        /* Button styling */
        .btn-default, .btn-primary, .btn-success, .btn-danger {
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-default:hover {
            background-color: #e0e0e0;
            color: #333;
            border-color: #adadad;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <!-- short column display for forms rows -->
    <!--visit https://www.w3schools.com/bootstrap/bootstrap_forms.asp search for forms template and use it.-->
    <div class="col-lg-4">
        <h2>User data form</h2>
        <form action="" name="form1" method="post">
            <div class="form-group">
                <label for="firstname">First name:</label>
                <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="firstname" value="<?php echo $firstname; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last name:</label>
                <input type="text" class="form-control" id="lastname" placeholder="Enter Last name" name="lastname" value="<?php echo $lastname; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact" value="<?php echo $contact; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-default">Update</button>

        </form>
    </div>
</div>

</body>

<?php
if(isset($_POST["update"]))
    {
        mysqli_query($link,"update table1 set firstname='$_POST[firstname]',lastname='$_POST[lastname]',email='$_POST[email]',contact='$_POST[contact]' where id=$id");

        ?>
        <script type="text/javascript">
            window.location="index.php";
        </script>
        <?php
    }
?>

</html>