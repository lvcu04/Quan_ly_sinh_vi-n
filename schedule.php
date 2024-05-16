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

date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$currentDate = date('Y-m-d', strtotime($currentDate));
$firstDayOfWeek = date('Y-m-d', strtotime('last sunday', strtotime($currentDate)));

$sql = "SELECT course.*, subject.*, teacher.*, users.*, course.code as code_course
        FROM course, subject, teacher, users
        WHERE course.subject_code = subject.code
        AND course.teacher_code = teacher.code
        AND teacher.code = users.username";
$result = mysqli_query($data, $sql);

$courses = [];
while ($row = mysqli_fetch_assoc($result)) {
    $courses[$row['start_time']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="./css/student_sidebar.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php include('admin_css.php'); ?>
    <title>Kết quả học tập</title>
    <style>
    
        .container-main {
            padding:50px 0 0 300px; 
        }
        .col{
            margin-top: 30px;
        }
        th {
            text-align: center;
            font-size: 16px;
        }
        .box-info {
            text-align: center;
            font-size: 12px;
            width: 14px;
        }
        .table-custom {
        width: 90%;
        border-collapse: collapse;
        border:solid 3px;
    }

    .table-custom th,
    .table-custom td {
        padding: 8px;
        border: 0.5px solid black ;
        text-align: center;
        border-width: 3px;
    }

    .table-custom th {
        background-color: #f2f2f2;
    }

    .table-custom .even {
        background-color: #0099cc; 
    }

    .table-custom .odd {
        background-color: #0099cc;
    }
    .button-clicked {
    background-color: lightblue;
    transition: background-color 0.3s ease; /* Thời gian và kiểu chuyển đổi */
}
.button-group {
            margin-bottom: 10px;
        }

        .button-group button {
            margin-right: 5px;
        }
    
        .portlet-title{
            border: none!important;
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
    <div class="row">
        <div class="col-md-10 col-xs-12">
            <div class="box-df">
                <div class="portlet">
                    <div class="portlet-title"><span class="bold">Lịch học, Lịch thi</span> <br></div>
                    <div class="button-group">
                        <button id="beforeWeekButton" class="btn btn-info" onclick="beforeWeek()">Tuần trước</button>
                        <button id="nextWeekButton" class="btn btn-info" onclick="nextWeek()">Tuần tiếp theo</button>
                    </div>
                    <p class="mt-3">Ngày hiện tại: 
                        <span id="currentDate" data-date="<?php echo date('Y-m-d'); ?>" class="badge badge-primary">
                            <?php echo date('d/m/Y'); ?>
                        </span>
                    </p> 
                    <table class="table-custom" style="padding-top:100px">
        <thead>
            <tr style ="color:white">
                <th style = "background-color:#0099cc;width:70px">Ca học</th> 
                <th class="even">Thứ 2<br/><span class="week-date"><?php echo date('d/m/Y', strtotime($firstDayOfWeek . ' +1 day')); ?></span></th>
                <th class="odd">Thứ 3<br/><span class="week-date"><?php echo date('d/m/Y', strtotime($firstDayOfWeek . ' +2 day')); ?></span></th>
                <th class="even">Thứ 4<br/><span class="week-date"><?php echo date('d/m/Y', strtotime($firstDayOfWeek . ' +3 day')); ?></span></th>
                <th class="odd">Thứ 5<br/><span class="week-date"><?php echo date('d/m/Y', strtotime($firstDayOfWeek . ' +4 day')); ?></span></th>
                <th class="even">Thứ 6<br/><span class="week-date"><?php echo date('d/m/Y', strtotime($firstDayOfWeek . ' +5 day')); ?></span></th>
                <th class="odd">Thứ 7<br/><span class="week-date"><?php echo date('d/m/Y', strtotime($firstDayOfWeek . ' +6 day')); ?></span></th>
                <th class="even">Chủ nhật<br/><span class="week-date"><?php echo date('d/m/Y', strtotime($firstDayOfWeek)); ?></span></th>
            </tr>
        </thead>
        <tbody>
        <tr>
    <td style="text-align: center;background-color: rgba(246,248,206,1)"><strong>Ca sáng</strong></td>
    <?php
    for ($i = 1; $i <= 7; $i++) {
        $date = date('Y-m-d', strtotime($firstDayOfWeek . " +$i day"));
        echo "<td class = jumbotron style='height : 120px; width: 100px;'>";
        if (isset($courses[$date])) {
            foreach ($courses[$date] as $course) {
                if ($course['time'] < '12:10') {
                    echo "<p><strong>{$course['code_course']} - {$course['subjectname']}</strong></p>";
                    echo "<p>Tiết học: {$course['lesson']}</p>";
                    echo "<p>Giờ:  {$course['time']}</p>";
                    echo "<p>Phòng: {$course['room']}</p>";
                    echo "<p>GV: {$course['name']}</p>";
                }
            }
        }
        echo "</td>";
    }
    ?>
</tr>
<tr>
    <td style="text-align: center; background-color: rgba(246,248,206,1)"><strong>Ca chiều</strong></td>
    <?php
    for ($i = 1; $i <= 7; $i++) {
        $date = date('Y-m-d', strtotime($firstDayOfWeek . " +$i day"));
        echo "<td class = jumbotron style='height : 120px; width: 100px;'>";
        if (isset($courses[$date])) {
            foreach ($courses[$date] as $course) {
                if ($course['time'] >= '12:10') {
                    echo "<p><strong>{$course['code_course']} - {$course['subjectname']}</strong></p>";
                    echo "<p>Tiết học: {$course['lesson']}</p>";
                    echo "<p>Giờ:  {$course['time']}</p>";
                    echo "<p>Phòng: {$course['room']}</p>";
                    echo "<p>GV: {$course['name']}</p>";
                }
            }
        }
        echo "</td>";
    }
    ?>
</tr>


        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="./js/student_sidebar.js"></script>

<script>
function beforeWeek() {
    var beforeWeekButton = document.getElementById('beforeWeekButton');
    beforeWeekButton.classList.add('button-clicked'); // Thêm lớp khi click

    setTimeout(function() {
        beforeWeekButton.classList.remove('button-clicked'); // Loại bỏ lớp sau thời gian chuyển đổi
    }, 300); // 300ms là thời gian chuyển đổi trong CSS

    var nextWeekButton = document.getElementById('nextWeekButton');
    nextWeekButton.classList.remove('button-clicked'); // Loại bỏ lớp nếu có từ trước

    var currentDateElement = document.getElementById('currentDate');
    var currentDate = new Date(currentDateElement.getAttribute('data-date'));
    var beforeWeekDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() - 7);
    currentDateElement.innerHTML = formatDate(beforeWeekDate);
    currentDateElement.setAttribute('data-date', formatDate(beforeWeekDate));
    updateWeekDates(beforeWeekDate);
}

function nextWeek() {
    var nextWeekButton = document.getElementById('nextWeekButton');
    nextWeekButton.classList.add('button-clicked'); // Thêm lớp khi click

    setTimeout(function() {
        nextWeekButton.classList.remove('button-clicked'); // Loại bỏ lớp sau thời gian chuyển đổi
    }, 300); // 300ms là thời gian chuyển đổi trong CSS

    var beforeWeekButton = document.getElementById('beforeWeekButton');
    beforeWeekButton.classList.remove('button-clicked'); // Loại bỏ lớp nếu có từ trước

    var currentDateElement = document.getElementById('currentDate');
    var currentDate = new Date(currentDateElement.getAttribute('data-date'));
    var nextWeekDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() + 7);
    currentDateElement.innerHTML = formatDate(nextWeekDate);
    currentDateElement.setAttribute('data-date', formatDate(nextWeekDate));
    updateWeekDates(nextWeekDate);
}


function formatDate(date) {
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    return year + '-' + (month < 10 ? '0' + month : month) + '-' + (day < 10 ? '0' + day : day);
}

function updateWeekDates(currentDate) {
    var firstDayOfWeek = new Date(currentDate);
    firstDayOfWeek.setDate(currentDate.getDate() - currentDate.getDay() + 1);

    var weekDates = document.querySelectorAll('.week-date');

    for (var i = 0; i < weekDates.length; i++) {
        var day = new Date(firstDayOfWeek);
        day.setDate(firstDayOfWeek.getDate() + i);
        weekDates[i].innerHTML = formatDate(day);
    }
}
</script>
</body> 
</html>
