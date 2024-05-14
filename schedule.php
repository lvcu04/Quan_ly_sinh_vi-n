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

$sql = "SELECT course.*, subject.*,teacher.*,users.*, course.code as code_course
        FROM course, subject,teacher, users
        where course.subject_code = subject.code
        and course.teacher_code = teacher.code
        and teacher.code = users.username";
        

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
        background-color: #9fffcb; /* Màu nền cho ca sáng */
    }

    .table-custom .odd {
        background-color: #9fffcb; /* Màu nền cho ca chiều */
    }
    </style>
   
</head>

<?php
// Đặt múi giờ của PHP
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Lấy ngày hiện tại
$currentDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
// Chuyển đổi sang định dạng ngày-tháng-năm
$currentDate = date('Y-m-d', strtotime($currentDate));

// Tính ngày đầu tiên của tuần
$firstDayOfWeek = date('Y-m-d', strtotime('last sunday', strtotime($currentDate)));
?>

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
                <!-- Thêm class cho th để tô màu -->
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
                <td style="text-align: center;background-color : rgba(246,248,206,1)"><strong>Ca sáng</strong></td>
                <?php $count = 0; ?>
                <?php while ($info = $result->fetch_assoc()) { ?>
                    <?php if ($info['time'] < '12:10') { ?>
                        <?php  if ($info['status_course'] == 1) { ?>
                        <td class = "jumbotron box-info">
                            <p>Tạm ngưng</p>
                            <p><strong><?php echo $info['subjectname']; ?></strong> - </p>
                            <p><?php echo $info['code_course']; ?></p>
                            <p>Tiết học: <?php echo $info['lesson']; ?></p>
                            <p>Giờ: <?php echo $info['time']; ?></p>  
                            <p>Phòng: <?php echo $info['room']; ?></p>
                            <p>GV: <?php echo $info['name']; ?> </p>  
                        </td> 
                         <?php  } else { ?>
                        <td class = "jumbotron box-info">
                            <p><strong><?php echo $info['subjectname']; ?></strong> - </p>
                            <p><?php echo $info['code_course']; ?></p>
                            <p>Tiết học: <?php echo $info['lesson']; ?></p>
                            <p>Giờ: <?php echo $info['time']; ?></p>  
                            <p>Phòng: <?php echo $info['room']; ?></p>
                            <p>GV: <?php echo $info['name']; ?> </p>  
                        </td> <?php } ?>
                        <?php $count++; ?>
                    <?php } ?>
                <?php } ?>
            </tr>  
            <tr>
                <td style="text-align: center; background-color : rgba(246,248,206,1)"><strong>Ca chiều</strong></td>
                <?php $result->data_seek(0); ?>
                <?php $count = 0; ?>
                <?php while ($info = $result->fetch_assoc()) { ?>
                    <?php if ($info['time'] >= '12:10') { ?>
                        <td class = "jumbotron box-info">
                            <p><strong><?php echo $info['subjectname']; ?></strong> - </p>
                            <p><?php echo $info['code_course'];?></p>
                            <p>Tiết học: <?php echo $info['lesson']; ?></p>
                            <p>Giờ: <?php echo $info['time']; ?></p>  
                            <p>Phòng: <?php echo $info['room'];?></p>
                            <p>GV: <?php echo $info['name']; ?> </p> 
                        </td>
                    <?php } ?>
                <?php } ?>
            </tr>  
        </tbody>
    </table>   
</div>

    <script src="./js/student_sidebar.js"></script>


</body> 
</html>
