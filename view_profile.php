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

$sql = "SELECT users.*, student.*
        FROM users
        INNER JOIN student ON users.username = student.code";
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
        <div class="jumbotron text-center my-8 py-4 "> <h1>Quản lý hồ sơ sinh viên</h1></div>
       
        <div class="container">
                <div class="row my-1 py-2 mx-1 px-3 bg-custom align-items-center">
            <div class="col-md-6">
                <div class="btn btn-info ml-2">
                    <button class="btn btn-info btn-sm float-right" id="view_student">Hiển thị hồ sơ sinh viên</button>
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

    <div class="row my-1 py-2 mx-1 px-3" id="show_table">
    <div class="col">
        <table class="table table-bordered custom-border">
            <thead>
                <tr>
                    <th>Họ và tên</th>
                    <th>Mã sinh viên</th>
                    <th>ảnh thẻ 3x4</th>
                    <th>Giấy báo trúng tuyển</th>
                    <th>Học bạ THPT</th>
                    <th>Giấy khai sinh</th>
                    <th>Sổ hộ khẩu</th>
                    <th>Giấy chứng nhận đối tượng ưu tiên</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($info = $result->fetch_assoc()) { 
                    $bao_trung_tuyen = './img/giaybaotrungtuyen.jpg';
                    $hoc_ba_thpt = './img/hocba.jpg';
                    $giay_khai_sinh='./img/giaykhaisinh.jpg';
                    $so_ho_khau = './img/sohokhau.webp';
                    $anh_the ='./img/anhthe.jpg';
                    ?>

                    <tr>
                        <td><?php echo $info['name']; ?></td>
                        <td><?php echo $info['code']; ?></td>
                        <td><a href="<?php echo $anh_the; ?>" target="_blank">Xem</a></td> 
                        <td><a href="<?php echo $bao_trung_tuyen; ?>" target="_blank">Xem</a></td> 
                        <td><a href="<?php echo $hoc_ba_thpt; ?>" target="_blank">Xem</a></td>
                        <td><a href="<?php echo $giay_khai_sinh; ?>" target="_blank">Xem</a></td>
                        <td><a href="<?php echo $so_ho_khau; ?>" target="_blank">Xem</a></td>
                        <td>Không có</td>
                       
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
