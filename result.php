<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Bạn đã đăng nhập với tên đăng nhập: $username";
} else {
    
    header("location:login.php");
    exit; 
}
$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT users.*, student.*, result.*, course_has_student.*, course.*, subject.*
        FROM result
        INNER JOIN course_has_student ON result.c_h_s_code = course_has_student.c_h_s_code
        INNER JOIN student ON student.code = course_has_student.student_code
        INNER JOIN course ON course.code = course_has_student.course_code
        INNER JOIN subject ON subject.code = course.subject_code
        INNER JOIN users ON users.username = student.code
        WHERE users.username = '$username'; ";
        

$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="./css/student_sidebar.css">
    <?php include('admin_css.php'); ?>
    <title>Kết quả học tập</title>
    <style>
        .container-main {
            padding:80px 0 0 250px; 
        }
        .col{
            margin-top: 30px;
        }
    </style>
   
</head>
<body>
    <header class="header">
        <a href="studenthome.php"><img src="./img/logo-uth.png" style="max-height: 40px;"></a>
        
        <div class="logout">
            <a class="notify" href="notify.html"><i class="fa fa-bell"><div class="count">9</div>&nbsp;&nbsp;</i>
            Tin tức-Thông báo&nbsp;&nbsp;</a>
            <a href="logout.php" class="btn btn-primary">Đăng xuất</a>
        </div>
    </header>
    <?php include('student_sidebar.php'); ?>
    <div class="container-main">
        
        <span class="caption-subject bold">Kết quả học tập</span>

        <div class="col">
        <table class="table table-bordered custom-border">
            <thead>
                <tr>
                    <th>Mã học phần</th>
                    <th>Tên môn học phần</th>
                    <th>Số tín chỉ</th>
                    <th>Chuyên cần</th>
                    <th>Giữa kỳ</th>
                    <th>Cuối kỳ</th>
                    <th>Điểm tổng kết</th>
                    <th>Điểm chữ</th>
                    <th>Xếp loại</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($info = $result->fetch_assoc()) {
                    $diemtongket = $info['chuyencan']*0.2 + $info['giuaky']*0.3 + $info['cuoiky']*0.5;
                    
                    // Tính điểm chữ và xếp loại
                    if($diemtongket < 4.0){
                        $diemchu = 'F';
                        $xephang='Yếu';
                    } elseif($diemtongket <= 5.4 ){
                        $diemchu = 'D';
                        $xephang='Trung bình yếu';
                    } elseif($diemtongket <= 6.9 ){
                        $diemchu = 'C';
                        $xephang='Trung bình';
                    } elseif($diemtongket <= 8.4 ){
                        $diemchu = 'B';
                        $xephang='Khá';
                    } else {
                        $diemchu = 'A';
                        $xephang='Giỏi';
                    }

                    ?>
                    <tr>
                        <td><?php echo $info['course_code']; ?></td>
                        <td><?php echo $info['subjectname']; ?></td>
                        <td><?php echo $info['num_credit']; ?></td>
                        <td><?php echo $info['chuyencan']; ?></td>
                        <td><?php echo $info['giuaky']; ?></td>
                        <td><?php echo $info['cuoiky']; ?></td>
                        <td><?php echo $diemtongket; ?></td>
                        <td><?php echo $diemchu; ?></td>
                        <td><?php echo $xephang; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
    <script src="./js/student_sidebar.js"></script>
</body> 
</html>
