
<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); // Đảm bảo không có mã PHP nào tiếp tục thực thi sau khi chuyển hướng
} elseif ($_SESSION['usertype'] == 'student') { 
    header("Location: login.php");
    exit(); // Đảm bảo không có mã PHP nào tiếp tục thực thi sau khi chuyển hướng
}

$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

$data = mysqli_connect($host, $user, $password, $db);
if (isset($_POST['add_result'])) {
    $course_has_student_code = $_POST['c_h_s_code'];
    $student_code = $_POST['student_code'];
    $chuyencan = $_POST['chuyencan'];
    $giuaky = $_POST['giuaky'];
    $cuoiky = $_POST['cuoiky'];
    $status = $_POST['status'];
    $

    
    $sql_result = "INSERT INTO result (c_h_s_code, chuyencan , giuaky , cuoiky, status) 
                                  VALUES ('$course_has_student_code','$chuyencan','$giuaky','$cuoiky','$status')";
    $result_result = mysqli_query($data, $sql_result);

    $sql_course_has_student = "INSERT INTO course_has_student (c_h_s_code,course_code, student_code) 
                               VALUES ('$course_has_student_code','$course_has_student_code', '$student_code')";
    $result_course_has_student = mysqli_query($data, $sql_course_has_student);


    if($result_result && $result_course_has_student ) {
        echo "<script type='text/javascript'>
        alert('Thêm điểm thành công!');
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
            padding-top: 40px;
            padding-bottom: 30px;
           
        }
        .submit{
           
            padding-top: 20px;
        }
        .title{
            vertical-align: middle;
        }
    </style>


</head>
<body>
    <?php
     include('admin_sidebar.php');
    ?>
    <div class="content">
    <center>    
    <h2 style="padding-top: 15px;">Thêm điểm</h2>
        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label class="title">Mã khóa học của sinh viên</label>
                    <input type="text" name="c_h_s_code">
                </div>
                
                <div>
                    <label>Mã sinh viên</label>
                    <input type="text" name="student_code">
                </div>
                <div>
                    <label >Chuyên cần</label>
                    <input type="number" name="chuyencan">
                </div>
                <div>
                    <label >Giữa kỳ</label>
                    <input type="number" name="giuaky">
                </div>
                <div>
                    <label >Cuối kỳ</label>
                    <input  type="number" name="cuoiky">
                </div>
                <div>
    
                    <label >Trạng thái</label>
                    <input  type="text" name="status">
                </div>
                <div class="submit">
                    <input type="submit" class="btn btn-success" name="add_result" value="Chấp nhận">
                </div>
            </form>
        </div>
    </div>
 </center>  
</body>
</html>