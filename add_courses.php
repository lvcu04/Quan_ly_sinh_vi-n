
<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit(); // Đảm bảo không có mã PHP nào tiếp tục thực thi sau khi chuyển hướng
} elseif ($_SESSION['usertype'] == 'student') { 
    header("Location:login.php");
    exit(); // Đảm bảo không có mã PHP nào tiếp tục thực thi sau khi chuyển hướng
}

$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

$data = mysqli_connect($host, $user, $password, $db);
if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student";

    // Sử dụng Prepared Statements để chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO users (username, email, phone, usertype, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($data, $sql);

    // Kiểm tra xem Prepared Statements đã được chuẩn bị thành công hay không
    if ($stmt) {
        // Gán các giá trị vào các tham số của Prepared Statements
        mysqli_stmt_bind_param($stmt, "sssss", $username, $user_email, $user_phone, $usertype, $user_password);

        // Thực thi câu lệnh Prepared Statements
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script type='text/javascript'>
            alert('Data Upload Success');
            </script>";
        } else {
            echo "Upload Failed";
        }
        
        // Đóng Prepared Statements
        mysqli_stmt_close($stmt);
    } else {
        echo "Prepared Statement preparation failed.";
    }

    // Đóng kết nối
    mysqli_close($data);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include('admin_css.php');
    ?>
    <title>Admin Dashboard</title>
    <style type="text/css">
        label
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
        .submit{
           
            padding-top: 20px;
        }
    </style>


</head>
<body>
    <?php
     include('admin_sidebar.php');
    ?>
    <div class="content">
    <center>    
    <h2>Thêm môn học</h2>
        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label >Mã Khóa học</label>
                    <input type="text" name="id">
                </div>
                <div>
                    <label >Tên môn học</label>
                    <input type="name" name="name">
                </div>
                <div>
                    <label >Phòng</label>
                    <input type="name" name="name">
                </div>
                <div>
                    <label >Tên giáo viên</label>
                    <input  type="text" name="text">
                </div>
                <div>
    
                    <label >Tên môn học</label>
                    <input  type="text" name="text">
                </div>
                <div>
                    <label >Tiết học</label>
                    <input type="name" name="name">
                </div>
                <div>
                    <label >Thời gian</label>
                    <input type="name" name="name">
                </div>
                <div>
                    <label >Thứ</label>
                    <input type="name" name="name">
                </div>
                <div class="submit">
                    <input type="submit" class="btn btn-success" name="add_student" value="Chấp nhận">
                </div>
            </form>
        </div>
    </div>
 </center>  
</body>
</html>