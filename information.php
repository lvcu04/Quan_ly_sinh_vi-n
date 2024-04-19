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
    
    <?php include('admin_css.php'); ?>
    <title>Student Dashboard</title>
    <style>
        .notify{
            color: white;
            font-size: bold;
            position: relative;
        }
        .notify:hover{
            color: rgba(245, 240, 243, 0.8);
            text-decoration: none!important;
             
        }
        .count{
            width: 17px;
            height: 17px;
            border-radius: 50%;
            background-color: red;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            position: absolute;
            right: 130px;
            top:-10px;
            z-index: 99;
            
        }
        .container-fluid{
          padding-left: 220px;
        }
        .profile-userpic img{
            width: 120px;
            margin-top: -5%;
            margin: 0 auto;
            
        }
        .custom-jumbotron {
            margin-top: 80px;
       }
       .portlet-body {
         text-align: center;
       }
       .profile-userpic {
            display: flex; 
            flex-direction: column; 
            align-items: flex-start; 
        }

        .form-group {
            margin-top: 10px; 
            padding-left: 40px;
        }
        .portlet-title{
            border-bottom: 1px solid black;
            min-height: 41px;
        }
        .bold{
            font-weight: 700!important;
            font-size: 20px;
            color: #0099cc;
        }
        .information {
        display: flex; 
        flex-direction: column; 
        align-items: flex-start;
       }
       .form-infor{
            margin-top: 15px; 
            padding-left: -10px;
       }
       .personal-info{
        padding-top: 40px;
       }
        .fa-angle-down{
            padding-left: 15px;
            text-align: center;
        }
       
        

    </style>
   
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
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron  custom-jumbotron">
                    <!-- Nội dung của bạn ở đây -->
                    <div class="box-df">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="portlet">
                                    <div class="portlet portlet-body light">
                                        <div class="profile-userpic">
                                            <img  class="image-respontive"src="./img/user.png" style="object-fit: cover;">
                                            <br><br>
                                            <div class="form-group" >
                                               <div class="control-label"><span id="code">MSSV</span>: <b>2251120275</b>
                                               </div>
                                            </div>
                                            <div class="form-group" >
                                               <div class="control-label"><span id="name">Họ tên</span>: <b>Lê Văn Cừ</b>
                                               </div>
                                            </div>
                                            <div class="form-group" >
                                               <div class="control-label"><span id="name">Giới tính</span>: <b>Nam</b>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <span class="caption-subject  bold" >Thông tin học vấn</span>
                                            </div>
                                            
                                        </div>
                                        <div class="information" >
                                            <div class="form-infor" >
                                               <div class="control-label"><span id="code">Mã hồ sơ</span>: <b>2251120275</b>
                                               </div>
                                            </div>
                                            <div class="form-infor" >
                                               <div class="control-label"><span>Bậc đào tạo</span>: <b>Đại học-chính quy</b>
                                               </div>
                                            </div>
                                            <div class="form-infor" >
                                               <div class="control-label"><span id="major">Khoa</span>: <b>Công nghệ thông tin</b>
                                               </div>
                                            </div>
                                            <div class="form-infor" >
                                               <div class="control-label"><span id="major">Ngành</span>: <b>Công nghệ thông tin</b>
                                               </div>
                                            </div>
                                            <div class="form-infor" >
                                               <div class="control-label"><span >Trường</span>: <b>ĐH GTVT HCM</b>
                                               </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                            </div>
                            
                            <div class="col-md-12 personal-info">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject  bold" >Thông tin cá nhân</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="information" >
                                                <div class="form-infor" >
                                                    <div class="control-label"><span id="birthday">Ngày sinh</span>: <b>09/07/2004</b>
                                                    </div>
                                                </div>
                                                <div class="form-infor" >
                                                    <div class="control-label"><span id="phone">Số điện thoại</span>: <b>0366796412</b>
                                                    </div>
                                                </div>
                                                <div class="form-infor" >
                                                    <div class="control-label"><span id="pob">Nơi sinh</span>: <b>Bình Phước</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="information" >
                                                <div class="form-infor" >
                                                    <div class="control-label"><span id="major">Email</span>: <b>levancu976@gmail.com</b>
                                                    </div>
                                                </div>
                                                <div class="form-infor" >
                                                    <div class="control-label"><span >Đối tượng</span>: <b>Sinh viên</b>
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
