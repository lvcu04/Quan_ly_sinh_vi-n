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

$sql = "SELECT course.*,subject.*,teacher.*,users.*,course.code as course_code
        FROM course
        INNER JOIN subject ON  subject.code = course.subject_code
        INNER JOIN teacher ON  teacher.code = course.teacher_code
        INNER JOIN users ON users.username = teacher.code
        ";
        
$result = mysqli_query($data, $sql);
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
    #show_table{
        display: none;
    }
    </style>

</head>
<body>
    <?php include('admin_sidebar.php'); ?>
    <div class="content ">
        <center >
        <div class="jumbotron text-center my-8 py-4 "> <h1>Quản lý lịch học</h1></div>
       
        <div class="container">
                <div class="row my-1 py-2 mx-1 px-3 bg-custom align-items-center">
            <div class="col-md-4">
                <div class="btn btn-info ml-2">
                    <button class="btn btn-info btn-sm float-right" id="view_schedule">Hiển thị lịch học</button>
                </div> 
            </div>

            <div class="col-md-4">
                <div class="btn btn-warning ml-1">
                    <button class="btn btn-warning btn-sm float-right" id="add_schedule">Thêm lịch học</button>
                </div> 
            </div>
            
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" id="input_search" placeholder="Nhập thông tin sinh viên">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button" id="search_schedule_btn">Tìm kiếm</button>
                    </div>
                </div>
            </div>   
        </div>

    <div class="row my-1 py-2 mx-1 px-3" id="show_table">
    <div class="col">
        <table class="table table-bordered custom-border">
            <thead>
                <tr>
                    <th>Mã khóa học</th>
                    <th>Mã môn học</th>
                    <th>Tên môn học</th>
                    <th>Ngày học</th>
                    <th>Thời gian</th>
                    <th>Phòng học</th>
                    <th>Tiết học</th>
                    <th>Giáo viên</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($info = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $info['course_code']; ?></td>
                        <td><?php echo $info['subject_code']; ?></td>
                        <td><?php echo $info['subjectname']; ?></td>
                        <td><?php echo $info['start_time']; ?></td>
                        <td><?php echo $info['time']; ?></td>
                        <td><?php echo $info['room']; ?></td>
                        <td><?php echo $info['lesson']; ?></td>
                        <td><?php echo $info['name']; ?></td>
                        <td><?php echo "<button class='btn btn-danger'><a href='delete.php?student_code={$info['code']}' class='text-white'>Delete</a></button>"; ?></td>
                        <td><?php echo "<button class='btn btn-info'><a href='update.php?student_code={$info['code']}' class='text-white'>Update</a></button>"; ?></td>
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
    <script src="./js/view_schedule.js"></script>
</body>
</html>
