<?php
include "connection.php";
?>

<html lang="en" xmlns="">
<head>
    <title>User Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Custom styles for forms and tables */
        body {
            background-color: #f8f9fa; /* Light background for the page */
        }
        /* General form container styling */
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

        /* Table styling */
        .col-lg-12 .table {
            margin-top: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Ensures border-radius applies to table corners */
        }

        .col-lg-12 .table thead th {
            background-color: #f8f9fa; /* Light grey header */
            color: #495057;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .col-lg-12 .table tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping */
        }

        .col-lg-12 .table tbody tr:hover {
            background-color: #e9ecef; /* Hover effect */
        }

        .col-lg-12 .table td, .col-lg-12 .table th {
            padding: 12px;
            vertical-align: middle;
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
            <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last name:</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter Last name" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact" required>
        </div>
        <button type="submit" name="insert" id="insertBtn" class="btn btn-default" disabled>Insert</button>
    </form>
</div>
</div>

<!-- new column inserted for records -->
<!-- Search for boostrap table template online and copy code -->
<div class="col-lg-12">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <!-- Database connection -->
        <?php
        if (!empty($link)) {
            $res=mysqli_query($link,"select * from table1");
        }
        while($row=mysqli_fetch_array($res))
        {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["firstname"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["lastname"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["contact"]) . "</td>";
            echo "<td><a href='edit.php?id=" . htmlspecialchars($row["id"]) . "'><button type='button' class='btn btn-success'>Edit</button></a></td>";
            echo "<td><a href='delete.php?id=" . htmlspecialchars($row["id"]) . "'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>

<!-- new records insertion into database table -->
<!-- records delete from database table -->
<!-- records update from database table -->
<script>
    $(document).ready(function () {
        // Target the form inputs and the insert button
        const formInputs = $('#firstname, #lastname, #email, #contact');
        const insertBtn = $('#insertBtn');

        // Function to check if all inputs are filled
        function checkInputs() {
            let allFilled = true;
            formInputs.each(function () {
                if ($(this).val().trim() === '') {
                    allFilled = false;
                    return false; // Exit the loop early
                }
            });
            // Enable or disable the button based on the result
            insertBtn.prop('disabled', !allFilled);
        }

        // Run the check on keyup and change events in the form inputs
        formInputs.on('keyup change', checkInputs);
    });
</script>

<!-- to automatically refresh the pages after crud activity   window.location.href=window.location.href; -->
<?php
if(isset($_POST["insert"]))
{
    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($link, "INSERT INTO table1 (firstname, lastname, email, contact) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['contact']);
    mysqli_stmt_execute($stmt);
   ?>
    <script type="text/javascript">
        // Redirect to clear the form and show the new entry
        window.location="index.php";
    </script>
    <?php
}
?>
</html>