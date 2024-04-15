<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); 
} elseif ($_SESSION['usertype'] == 'student') { 
    header("Location: login.php");
    exit(); 
}

$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM users";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include('.admin_css.php'); ?>
    <style type="text/css">

     .custom-border {
         border-width: 3px; 
    }
    .custom-border th{
        border-width: 3px; 
    }
    .custom-border td{
        border-width: 3px; 
    }
    .btn-sm{
        height: 27px;
        max-width: 560px;
    }
    .col-6 {
      left: 5%;
      padding-top: 50px;
    }
    </style>

</head>
<body>
    <?php include('admin_sidebar.php'); ?>
    <center>
    <div class="col-6 mt-5 mb-5"> 
    <div class="container-fluid bg-light my-8">
        <div class="jumbotron text-center my-8 py-4">
            <h5>QUẢN LÝ ĐIỂM SINH VIÊN</h5>
        </div>
        <div class="row text-center mx-auto py-2 my-2">
            <div class="col-12">
                <input type="button" id="view_result_btn" value="Xem điểm">
            </div>
        </div>
        <div class="row bg-success">
            <table id="table_results" class="w-100"></table>
        </div>
    </div>	
</div>

	</center>	

    

       
        
    </center>
    </div>
</body>
</html>
