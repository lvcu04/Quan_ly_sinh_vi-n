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

$sql = "SELECT financial.*,course.*,subject.*,course_has_student.*,student.*,users.*,course.code as course_code,
        FORMAT(financial.tuition,0) AS tuition,
        FORMAT(financial.payment,0) AS payment,
        financial.tuition - financial.payment AS debt
        FROM financial
        INNER JOIN course_has_student ON course_has_student.c_h_s_code = financial.c_h_s_code
        INNER JOIN course ON course.code = course_has_student.course_code
        INNER JOIN subject ON subject.code = course.subject_code
        INNER JOIN student ON student.code = course_has_student.student_code
        INNER JOIN users ON users.username = student.code
        WHERE users.username = '$username';";

$result = mysqli_query($data, $sql);

$tonghocphi = 0;
$tongthanhtoan = 0;
$tongcongno = 0;

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
        .container-fluid{
          padding-left: 220px;
        }
        .custom-border {
            border-width: 3px; 
            border-color: rgba(101, 94, 97, 0.39);
        }
        .custom-border th{
            border-width: 3px;
            border-color: rgba(101, 94, 97, 0.39);
        }
        .custom-border td{
            border-width: 3px; 
            border-color: rgba(101, 94, 97, 0.39);
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
                <div class="jumbotron custom-jumbotron">
                    <div class="box-df">
                       <div class="portlet">
                        <div class="portlet-title row">
                            <div class="col-md-8">
                                <span class="caption-financial bold">Tra cứu công nợ</span>
                            </div>
                            <div class="col-md-4 payment text-center">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                <span style="color: red; font-weight: 500; cursor: pointer;" onclick="openModal()" >Thanh toán trực tuyến tại đây</span>
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </div>
                        </div>
                            <br>
                            <div class="row my-1 py-2 mx-1 px-1">
                                <div class="col">
                                    <table class="table table-bordered custom-border">
                                        <thead>
                                            <tr>
                                                <th>Mã khóa học</th>
                                                <th>Mã môn học</th>
                                                <th>Môn học</th>
                                                <th>Số tín chỉ</th>
                                                <th>Mức phí</th>
                                                <th>Mức nộp</th>
                                                <th>Công nợ</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($info = $result->fetch_assoc()) {
                                                $tuition = str_replace(',', '', $info['tuition']);
                                                $payment = str_replace(',', '', $info['payment']);
                                                $debt = $tuition - $payment;

                                                $tonghocphi += $tuition;
                                                $tongthanhtoan += $payment;
                                                $tongcongno += $debt;

                                                $status = ($debt == 0) ? './img/green-tick.png' : './img/X-red.png';
                                            ?>
                                            <tr>
                                                <td><?php echo $info['c_h_s_code']; ?></td>
                                                <td><?php echo $info['course_code']; ?></td>
                                                <td><?php echo $info['subjectname']; ?></td>
                                                <td><?php echo $info['num_credit']; ?></td>
                                                <td><?php echo number_format($tuition, 0); ?></td>
                                                <td><?php echo number_format($payment, 0); ?></td>
                                                <td><?php echo number_format($debt, 0); ?></td>
                                                <td><img src="<?php echo $status; ?>" alt="Trạng thái" width="20px" height="20px"></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="total">
                                <div class="col-md-4 btn">Tổng học phí: <span class="title-num"><?php echo number_format($tonghocphi, 0); ?></span></div>
                                <div class="col-md-4 btn">Tổng thanh toán: <span class="title-num"><?php echo number_format($tongthanhtoan, 0); ?></span></div>
                                <div class="col-md-3 btn">Tổng công nợ: <span class="title-num"><?php echo number_format($tongcongno, 0); ?></span></div>
                            </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Thanh toán trực tuyến</h4>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <span style="padding-left: 30px;">Quét mã qr</span><br>
                                                <img src="./img/qr.jpg" width="200px" height="200px" alt="hehe"><br>
                                                <span style="padding-left: 30px;">Chuyển khoản qua số tài khoản</span><br>
                                                <span style="padding-left: 30px;">Tài khoản:<strong>1100 0012 6050</strong>, Ngân hàng TMCP Công thương Việt Nam (<strong>Vietinbank</strong>) - Chi nhánh 7 - TP.HCM</span><br>
                                                <span style="padding-left: 30px;"></span>Tên tài khoản:<strong>Trường Đại học Giao thông vận tải Thành phố Hồ Chí Minh<strong></span>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
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
 
    <script>
        // Mở modal khi click vào nút "Thanh toán trực tuyến tại đây"
            function openModal() {
                $('#myModal').modal('show');
            }

            // Đóng modal khi click vào nút "Close"
            function closeModal() {
                $('#myModal').modal('hide');
            }

            // Đóng modal khi click ra ngoài modal
            window.onclick = function(event) {
                var modal = document.getElementById("myModal");
                if (event.target == modal) {
                    closeModal();
                }
            }
    </script>
    <script src="./js/student_sidebar.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
