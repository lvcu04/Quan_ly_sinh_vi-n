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

$sql = "SELECT users.*, student.*, result.*, course_has_student.*, course.*, subject.*
        FROM result
        INNER JOIN course_has_student ON result.c_h_s_code = course_has_student.c_h_s_code
        INNER JOIN student ON student.code = course_has_student.student_code
        INNER JOIN course ON course.code = course_has_student.course_code
        INNER JOIN subject ON subject.code = course.subject_code
        INNER JOIN users ON users.username = student.code";


$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý điểm sinh viên</title>
    <?php include('admin_css.php'); ?>
    <style type="text/css">

     .custom-border {
         border-width: 3px; 
    }
    .custom-border th{
        border-width: 3px; 
        
        vertical-align: middle;
    }
    .custom-border td{
        border-width: 3px; 
    
        vertical-align: middle;
    }
    .table thead th{
        text-align: center;
        vertical-align: middle;
    }
    .btn-sm{
        height: 27px;
        max-width: 560px;
    }
    .col-name{
        width: 150px;
    }
    #show_table{
        display: none;
    }
   
    </style>

</head>
<body>
    <?php include('admin_sidebar.php'); ?>
    <div class="content ">
        <center >
        <div class="jumbotron text-center my-8 py-4 "> <h1>Quản lý điểm sinh viên</h1></div>
       
        <div class="container">
    <div class="row my-1 py-2 mx-1 px-3 bg-custom align-items-center">
        <div class="col-md-6 ">
            Hiển thị sinh viên.
       <div class="btn btn-primary ml-2">
            <button class="btn btn-primary btn-sm float-right " id="view_student">View</button>
        </div> 
    </div>
        
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" class="form-control" id="input_search" placeholder="Nhập thông tin sinh viên">
            <div class="input-group-append">
                <button class="btn btn-success" type="button" id="search_student_btn">Tìm kiếm</button>
            </div>
        </div>
    </div>

        
    </div>
    <div class="row my-1 py-2 mx-1 px-1" id="show_table">
    <div class="col">
        <table class="table table-bordered custom-border">
            <thead>
                <tr>
                    <th class="col-name">Họ và tên</th>
                    <th>Mã khóa học của sinh viên</th>
                    <th>Môn học</th>
                    <th>Ngành</th>
                    <th>Chuyên cần</th>
                    <th>Giữa kỳ</th>
                    <th>Cuối kỳ</th>
                    <th>Trạng thái</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($info = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $info['name']; ?></td>
                        <td><?php echo $info['c_h_s_code']; ?></td>
                        <td><?php echo $info['subjectname']; ?></td>
                        <td><?php echo $info['major']; ?></td>
                        <td><?php echo $info['chuyencan']; ?></td>
                        <td><?php echo $info['giuaky']; ?></td>
                        <td><?php echo $info['cuoiky']; ?></td>
                        <td><?php echo $info['status']; ?></td>
                        <td><?php echo "<button class='btn btn-danger'><a href='delete_result.php?course_has_student_code={$info['c_h_s_code']}' class='text-white'>Delete</a></button>"; ?></td>
                        <td><?php echo "<button class='btn btn-info'><a href='update.php?course_has_student_code={$info['c_h_s_code']}' class='text-white'>Update</a></button>"; ?></td>
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
    <script src="./js/view_student.js"></script>
</body>
</html>
