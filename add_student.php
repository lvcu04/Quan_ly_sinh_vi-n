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

if(isset($_POST['add_student'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $code = $_POST['username'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $pob = $_POST['pob'];
    $major = $_POST['major'];
    $usertype ='student';

    // Thực hiện INSERT vào bảng users
    $sql_users = "INSERT INTO users (name, username, birthday, phone,usertype, pob) VALUES ('$name', '$username', '$birthday', '$phone','$usertype', '$pob')";
    $result_users = mysqli_query($data, $sql_users);

    //Thực hiện INSERT vào bảng student
    $sql_student = "INSERT INTO student (code, major) VALUES ( '$code','$major')";
    $result_student = mysqli_query($data, $sql_student);

    if($result_users && $result_student ) {
        echo "<script type='text/javascript'>
        alert('Thêm sinh viên thành công!');
        </script>";
    } else {
        echo "Lỗi: " . mysqli_error($data);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('admin_css.php'); ?>
    <title>Thêm sinh viên</title>
    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 40px;
            padding-bottom:40px;
        }
        .date input {
            width: 185px;
        }
        .submit {
            padding-top: 20px;
        }
        
    </style>
</head>
<body>
    <?php include('admin_sidebar.php'); ?>
    <div class="content">
        <center>    
            <h2>Thêm sinh viên</h2>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Họ và Tên</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label>Mã sinh viên</label>
                        <input type="text" name="username">
                    </div>
                    <div class="date">
                        <label>Ngày sinh</label>
                        <input type="date" name="birthday">
                    </div>
                    <div>
                        <label>Số điện thoại</label>
                        <input type="number" name="phone">
                    </div>
                    <div>
                        <label>Nơi sinh</label>
                        <input type="text" name="pob">
                    </div>
                    <div>
                        <label>Ngành</label>
                        <input type="text" name="major">
                    </div>
                    <div class="submit">
                        <input type="submit" class="btn btn-success" name="add_student" value="Chấp nhận">
                    </div>
                </form>
            </div>
        </center>  
    </div>
</body>
</html>
