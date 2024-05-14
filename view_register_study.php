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
    <div class="content">
        <center>
        <div class="jumbotron text-center my-8 py-4 "> <h1>Quản lý đăng ký học phần</h1></div>
       
       <div class="container">
               <div class="row my-1 py-2 mx-1 px-3 bg-custom align-items-center">
           <div class="col-md-4">
               <div class="btn btn-info ml-2">
                   <button class="btn btn-info btn-sm float-right" id="view_register">Hiển thị đăng ký</button>
               </div> 
           </div>

           <div class="col-md-4">
               <div class="btn btn-warning ml-1">
                   <button class="btn btn-warning btn-sm float-right" id="add_student">Thêm đăng ký</button>
               </div> 
           </div>
           
           <div class="col-md-4">
               <div class="input-group">
                   <input type="text" class="form-control" id="input_search" placeholder="Nhập thông tin sinh viên">
                   <div class="input-group-append">
                       <button class="btn btn-success" type="button" id="search_student_btn">Tìm kiếm</button>
                   </div>
               </div>
           </div>   
       </div>
            <div class="container" id="show_table">
                <?php
                //  Lấy danh sách các môn học
                $sql_subjects = "SELECT * FROM subject";
                $result_subjects = mysqli_query($data, $sql_subjects);
                $sql_teachers = "SELECT course.*,subject.*,teacher.code AS teacher_code,users.*
                FROM course
                INNER JOIN subject ON subject.code = course.subject_code 
                INNER JOIN teacher ON teacher.code = course.teacher_code 
                INNER JOIN users ON users.username = teacher.code ";
                $result_teachers = mysqli_query($data, $sql_teachers);
                while (($subject = mysqli_fetch_assoc($result_subjects)) && ($teacher = mysqli_fetch_assoc($result_teachers))) {
                    ?>
                    <div class="row my-1 py-2 mx-1 px-3 bg-custom align-items-center" >
                        <table class="table table-bordered custom-border">
                            <thead>
                                <tr>
                                    <th colspan="4">Tên môn học: <?php echo $subject['subjectname']; ?></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Tên giáo viên: <?php echo $teacher['name']; ?></th>
                                </tr>
                                <tr>
                                    <th style="width: 5%;">STT</th>
                                    <th>Tên sinh viên</th>
                                    <th>Mã sinh viên</th>
                                    <th>Ngành</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Lấy danh sách sinh viên đã đăng ký môn đó
                                $sql_students = "SELECT users.*, student.code AS studentcode ,student.major AS student_major, course_has_student.*, course.*, subject.*
                                                FROM course_has_student
                                                INNER JOIN student ON student.code = course_has_student.student_code
                                                INNER JOIN course ON course.code = course_has_student.course_code
                                                INNER JOIN users ON users.username = student.code 
                                                INNER JOIN subject ON subject.code = course.subject_code
                                                WHERE course.subject_code = '{$subject['code']}' AND course.teacher_code = '{$teacher['teacher_code']}'";
                                $result_students = mysqli_query($data, $sql_students);

                                $stt = 1;
                                while ($info = mysqli_fetch_assoc($result_students)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $stt++; ?></td>
                                        <td><?php echo $info['name']; ?></td>
                                        <td><?php echo $info['studentcode']; ?></td>
                                        <td><?php echo $info['student_major']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </center>
    </div>
    <script src="./js/view_register_study.js"></script>
</body>
</html>
