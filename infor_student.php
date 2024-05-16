<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("location:login.php");
    exit; 
}

$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

$data = mysqli_connect($host, $user, $password, $db);

// Kiểm tra kết nối
if ($data->connect_error) {
    die("Kết nối thất bại: " . $data->connect_error);
}


$sql = "SELECT users.*, DATE_FORMAT(birthday, '%d-%m-%Y') AS formatted_birthday 
        FROM users 
        WHERE username = '$username';";

$result = mysqli_query($data, $sql);
$userData = $result->fetch_assoc();

// Đóng kết nối
mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="./css/student_sidebar.css">
    <?php include('admin_css.php'); ?>
    <title>Thông tin sinh viên</title>
    <style>
        .container-fluid {
            padding-left: 220px;
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
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron custom-jumbotron">
                    <!-- Nội dung của bạn ở đây -->
                    <div class="box-df">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="portlet">
                                    <div class="portlet-body light">
                                        <div class="profile-userpic">
                                            <img class="image-responsive" src="./img/user.png" style="object-fit: cover;">
                                            <br><br>
                                            <div class="form-group">
                                                <div class="control-label"><span id="code">MSSV</span>: <b><?php echo $userData['username']; ?></b></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="control-label"><span id="name">Họ tên</span>: <b><?php echo $userData['name']; ?></b></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="control-label"><span id="name">Giới tính</span>: <b>Nam</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-info bold">Thông tin học vấn</span>
                                        </div>
                                    </div>
                                    <div class="information">
                                        <div class="form-infor">
                                            <div class="control-label"><span id="code">Mã hồ sơ</span>: <b><?php echo $userData['username']; ?></b></div>
                                        </div>
                                        <div class="form-infor">
                                            <div class="control-label"><span>Bậc đào tạo</span>: <b>Đại học-chính quy</b></div>
                                        </div>
                                        <div class="form-infor">
                                            <div class="control-label"><span id="major">Khoa</span>: <b>Công nghệ thông tin</b></div>
                                        </div>
                                        <div class="form-infor">
                                            <div class="control-label"><span id="major">Ngành</span>: <b>Công nghệ thông tin</b></div>
                                        </div>
                                        <div class="form-infor">
                                            <div class="control-label"><span>Trường</span>: <b>ĐH GTVT HCM</b></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 personal-info">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-info bold">Thông tin cá nhân</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="information">
                                                <div class="form-infor">
                                                    <div class="control-label"><span id="birthday">Ngày sinh</span>: <b><?php echo $userData['formatted_birthday']; ?></b></div>
                                                </div>
                                                <div class="form-infor">
                                                    <div class="control-label"><span id="phone">Số điện thoại</span>: <b><?php echo $userData['phone']; ?></b></div>
                                                </div>
                                                <div class="form-infor">
                                                    <div class="control-label"><span id="pob">Nơi sinh</span>: <b><?php echo $userData['pob']; ?></b></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="information">
                                                <div class="form-infor">
                                                    <div class="control-label"><span id="major">Email</span>: <b><?php echo $userData['email']; ?></b></div>
                                                </div>
                                                <div class="form-infor">
                                                    <div class="control-label"><span>Đối tượng</span>: <b>Sinh viên</b></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="./js/student_sidebar.js"></script>
</body> 
</html>
