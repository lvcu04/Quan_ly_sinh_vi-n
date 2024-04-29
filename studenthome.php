<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif($_SESSION['usertype'] != 'student') {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="./css/student_sidebar.css">
    <?php include('admin_css.php'); ?>
    <title>Student Dashboard</title>
    
</head>
<body>
    <header class="header">
        <a href="studenthome.php"><img src="./img/logo-uth.png" style="max-height: 40px;"></a>
        
        <div class="logout">
        <a class="notify" href="#"><i class="fa fa-bell"><div class="count">9</div>&nbsp;&nbsp;</i>
            Tin tức-Thông báo&nbsp;&nbsp;</a>
            <a href="logout.php" class="btn btn-primary">Đăng xuất</a>
        </div>
    </header>
    
    
        <?php include('student_sidebar.php'); ?>
    
        <script src="./js/student_sidebar.js"></script>
</body>
</html>
