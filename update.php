<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
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

if(isset($_GET['student_id'])) {
    $id = $_GET['student_id'];

    // Truy vấn để lấy thông tin sinh viên từ cơ sở dữ liệu
    $query = "SELECT * FROM student WHERE id = $id";
    $result = mysqli_query($data, $query);
    $info = mysqli_fetch_assoc($result);
}

if(isset($_POST['update'])) {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $pob = $_POST['pob'];
    $major = $_POST['major'];

    // Cập nhật dữ liệu trong bảng users và student
    $update_query = "UPDATE users 
                     INNER JOIN student ON users.username = student.code
                     SET users.name = '$name', users.username = '$username', users.birthday = '$birthday', 
                         users.phone = '$phone', users.pob = '$pob', student.major = '$major'
                     WHERE student.id = $id";
    $update_result = mysqli_query($data, $update_query);

    if($update_result) {
        echo "Cập nhật thông tin sinh viên thành công.";
    } else {
        echo "Cập nhật thông tin sinh viên thất bại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sinh viên</title>
    <?php include('admin_css.php'); ?>
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
            padding-top: 70px;
            padding-bottom: 70px;
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
            <h2>Cập nhật sinh viên</h2>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Họ và Tên</label>
                        <input type="text" name="name" value="<?php if(isset($info['name'])) echo $info['name']; ?>">
                    </div>
                    <div>
                        <label>Mã sinh viên</label>
                        <input type="text" name="username" value="<?php if(isset($info['username'])) echo $info['username']; ?>">
                    </div>
                    <div class="date">
                        <label>Ngày sinh</label>
                        <input type="date" name="birthday" value="<?php if(isset($info['birthday'])) echo $info['birthday']; ?>">
                    </div>
                    <div>
                        <label>Số điện thoại</label>
                        <input type="number" name="phone" value="<?php if(isset($info['phone'])) echo $info['phone']; ?>">
                    </div>
                    <div>
                        <label>Nơi sinh</label>
                        <input type="text" name="pob" value="<?php if(isset($info['pob'])) echo $info['pob']; ?>">
                    </div>
                    <div>
                        <label>Ngành</label>
                        <input type="text" name="major" value="<?php if(isset($info['major'])) echo $info['major']; ?>">
                    </div>
                    <div class="submit">
                        <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                    </div>
                </form>
            </div>
        </center>  
    </div>
</body>
</html>
