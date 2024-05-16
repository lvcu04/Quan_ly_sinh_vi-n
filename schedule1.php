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

$sql = "SELECT course.*, subject.*,teacher.*,users.*, course.code as code_course
        FROM course, subject,teacher, users
        where course.subject_code = subject.code
        and course.teacher_code = teacher.code
        and teacher.code = users.username";
$result = mysqli_query($data, $sql);

$courses = [];
while ($row = mysqli_fetch_assoc($result)) {
    $courses[$row['start_time']][] = $row;
}

// Sau khi hiển thị môn học, tăng số lần hiển thị lên 1 và kiểm tra số lần hiển thị đã đủ hay chưa
$numWeeksToShow = 3; // Số tuần mà môn học nên được hiển thị
foreach ($courses as $date => $dayCourses) {
    foreach ($dayCourses as $course) {
        $updateSql = "UPDATE course SET display_count = display_count + 1 WHERE id = '{$course['id']}'";
        mysqli_query($data, $updateSql);

        if ($course['display_count'] >= $numWeeksToShow * 5) {
            unset($courses[$date]);
        }
    }
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
    <title>Kết quả học tập</title>
    <style>
        .container-main {
            padding:80px 0 0 250px; 
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
        width: 100%;
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
        background-color: #9fffcb; 
    }

    .table-custom .odd {
        background-color: #9fffcb;
    }

    </style>

</head>

<body>
    <header class="header">
        <a href="studenthome.php"><img src="./img/logo-uth.png" style="max-height: 40px;"></a>
        
        <div class="logout">
            <a class="notify" href="https://sv.ut.edu.vn/sinh-vien/dm-tin-tuc/thong-bao-chung.html"><i class="fa fa-bell"><div class="count">*</div>&nbsp;&nbsp;</i>
            Tin tức-Thông báo&nbsp;&nbsp;</a>
            <a href="logout.php" class="btn btn-primary">Đăng xuất</a>
        </div>
    </header>
    <?php include('student_sidebar.php'); ?>
<div class="container-main">
    <span class="bold">Lịch học, Lịch thi</span> <br>
    <button style = "background-color: skyblue; margin:10px 5px 0px 0px;"onclick = " beforeWeek()">Tuần trước</button>
    <button style = "background-color: skyblue; margin:10px 5px 0px 0px; "onclick="nextWeek()">Tuần tiếp theo</button>
    <p>Ngày hiện tại: <span id="currentDate" data-date="<?php echo date('Y-m-d'); ?>"><?php echo date('d/m/Y'); ?></span></p>
    <table class="table-custom">
        <thead>
            <tr>
                <th style = "background-color:#9fffcb">Ca học</th> 
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
        echo "<td style='height : 120px;'>";
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

<script src="./js/student_sidebar.js"></script>

<script>
function beforeWeek() {
    var currentDateElement = document.getElementById('currentDate');
    var currentDate = new Date(currentDateElement.getAttribute('data-date'));
    var beforeWeekDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() - 7);
    currentDateElement.innerHTML = formatDate(beforeWeekDate);
    currentDateElement.setAttribute('data-date', formatDate(beforeWeekDate));
    updateWeekDates(beforeWeekDate);
}

function nextWeek() {
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
