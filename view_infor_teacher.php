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

$sql = "SELECT teacher.*, users.*
        FROM teacher
        INNER JOIN users ON users.username = teacher.code";
$result = mysqli_query($data, $sql);

$sql_relationship = "SELECT relationship.*, teacher.* , student.*, users_student.name AS student_name, users_teacher.name AS teacher_name, subject.*
                        FROM relationship
                        INNER JOIN teacher ON teacher.code = relationship.teacher_code
                        INNER JOIN student ON student.code = relationship.student_code
                        INNER JOIN subject ON subject.code = relationship.subject_code
                        INNER JOIN users AS users_student ON users_student.username = student.code
                        INNER JOIN users AS users_teacher ON users_teacher.username = teacher.code";

$result_relationship = mysqli_query($data, $sql_relationship);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include('admin_css.php'); ?>
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
    .birthday{
        width: 120px;
    }
    #show_table{
        display: none;
    }
    #show_table_relationship{
        display: none;
    }
    </style>

</head>
<body>
    <?php include('admin_sidebar.php'); ?>
    <div class="content ">
        <center>
        <div class="jumbotron text-center my-8 py-4 "> <h1>Quản lý thông tin giảng viên</h1></div>
       
        <div class="container">
                <div class="row my-1 py-2 mx-1 px-3 bg-custom align-items-center">
            <div class="col-md-3">
                <div class="btn btn-info ml-2">
                    <button class="btn btn-info btn-sm float-right" id="view_teacher">Hiển thị thông tin</button>
                </div> 
            </div>
           
            <div class="col-md-3">
                <div class="btn btn-info ml-2">
                    <button class="btn btn-info btn-sm float-right" id="view_relationship">Hiển thị mối quan hệ</button>
                </div> 
            </div>

            <div class="col-md-3">
                <div class="btn btn-warning ml-1">
                    <button class="btn btn-warning btn-sm float-right" id="add_teacher">Thêm giảng viên</button>
                </div> 
            </div>
            
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="input_search" placeholder="Nhập thông tin sinh viên">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button" id="search_teacher_btn">Tìm kiếm</button>
                    </div>
                </div>
            </div>   
        </div>

    <div class="row my-1 py-2 mx-1 px-3" id="show_table">
        <div class="col">
            <table class="table table-bordered custom-border">
                <thead>
                    <tr>
                        <th>Mã giảng viên</th>
                        <th>Họ và tên</th>
                        <th class="birthday">Năm sinh</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Chức danh</th>
                        <th>Trình độ đào tạo</th>
                        <th>Chuyên ngành giảng dạy</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php while ($info = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $info['code']; ?></td>
                            <td><?php echo $info['name']; ?></td>
                            <td><?php echo $info['birthday']; ?></td>
                            <td><?php echo $info['sex']; ?></td>
                            <td><?php echo $info['phone']; ?></td>
                            <td><?php echo $info['title']; ?></td>
                            <td><?php echo $info['level']; ?></td>
                            <td><?php echo $info['training']; ?></td>
                            <td><?php echo "<button class='btn btn-danger'><a href='delete.php?student_code={$info['code']}' class='text-white'>Delete</a></button>"; ?></td>
                            <td><?php echo "<button class='btn btn-info'><a href='update.php?student_code={$info['code']}' class='text-white'>Update</a></button>"; ?></td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Thêm một bảng để hiển thị mối quan hệ giữa giảng viên và sinh viên -->
<div class="row my-1 py-2 mx-1 px-3" id="show_table_relationship">
    <div class="col">
        <table class="table table-bordered custom-border">
            <thead>
                <tr>
                    <th>Tên giảng viên</th>
                    <th>Mối quan hệ</th>
                    <th>Tên sinh viên</th>
                    <th>Môn học</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($relationship_info = $result_relationship->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $relationship_info['teacher_name']; ?></td>
                        <td><?php echo $relationship_info['relationship']; ?></td>
                        <td><?php echo $relationship_info['student_name']; ?></td>
                        <td><?php echo $relationship_info['subjectname']; ?></td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
</div>  
    </center>
    </div>
    <script src="./js/view_infor_teacher.js"></script>
</body>
</html>
