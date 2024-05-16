<?php

session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    else if($_SESSION['usertype']!='admin')
    {
        header("location:login.php");
    }

$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

$data = mysqli_connect($host, $user, $password, $db);

$sql_result = "SELECT 
			SUM(CASE WHEN diemtongket > 8 THEN 1 ELSE 0 END) AS score_gt_8,
			SUM(CASE WHEN diemtongket BETWEEN 5 AND 8 THEN 1 ELSE 0 END) AS score_5_8,
			SUM(CASE WHEN diemtongket < 5 THEN 1 ELSE 0 END) AS score_lt_5
			FROM result";
		
$result = mysqli_query($data, $sql_result);
$row = $result -> fetch_assoc();

$total_score =$row['score_gt_8'] + $row['score_5_8'] + $row['score_lt_5'];

$percentage_gt_8 = ($row['score_gt_8'] / $total_score) * 100 ;
$percentage_5_8 = ($row['score_5_8'] / $total_score) * 100 ;
$percentage_lt_5 = ($row['score_lt_5'] / $total_score) * 100 ;

$sql_student = "SELECT 
					SUM(CASE WHEN major = 'Công nghệ thông tin' THEN 1 ELSE 0 END) AS cntt,
					SUM(CASE WHEN major = 'Hệ thống thông tin quản lý' THEN 1 ELSE 0 END) AS httt,
					SUM(CASE WHEN major = 'Mạng máy tính và truyền thông dữ liệu' THEN 1 ELSE 0 END) AS mmtt
					FROM student";
$result_student = mysqli_query($data,$sql_student);
$row_student = $result_student ->fetch_assoc();

$row_cntt = $row_student['cntt'];
$row_httt = $row_student['httt'];
$row_mmtt = $row_student['mmtt'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include('admin_css.php');
    ?>
    <title>Admin Dashboard</title>
</head>
<body>
<?php
     include('admin_sidebar.php');
    ?>
    <div class="content">
       <div class="container-fluid">
		
			<div class=" jumbotron container mt-5"  style="margin-top: 20px!important;margin-bottom:10px!important">
						<div class="row text-center">
							<!-- Sinh viên -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:gold ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-user-graduate fa-3x" style="color: rgb(113, 113, 8);" id="icon-link-student"></i>
										<h3 class="card-title" id="title-link-student">Sinh viên</h3>
									</div>
								</div>
							</div>

							<!-- Lớp -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:orange ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-users fa-3x" style="color: rgb(113, 77, 3);" id="icon-link-class"></i>
										<h3 class="card-title-class">Lớp</h3>
									</div>
								</div>
							</div>

							<!-- Môn học -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:darkred ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-book-open fa-3x" style="color: rgb(52, 4, 4)" id="icon-link-subject"></i>
										<h3 class="card-title-subject">Môn học</h3>
									</div>
								</div>
							</div>

							<!-- Giảng viên -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:darkgreen ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-chalkboard-teacher fa-3x" style="color: rgb(2, 54, 12)" id="icon-link-teacher"></i>
										<h3 class="card-title" id="title-link-teacher">Giảng viên</h3>
									</div>
								</div>
							</div>
						</div>

						<!-- Học tập -->
						<div class="row text-center mt-3">
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:darkblue ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-book fa-3x" style="color: rgb(1, 1, 70)" id="icon-link-result"></i>
										<h3 class="card-title" id="title-link-result">Học tập</h3>
									</div>
								</div>
							</div>

							<!-- Lịch học -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:cornflowerblue ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-calendar-alt fa-3x" style="color: rgb(28, 28, 80)" id="icon-link-schedule"></i>
										<h3 class="card-title" id="title-link-schedule">Lịch học</h3>
									</div>
								</div>
							</div>

							<!-- Học phí -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:lightslategray ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-money-bill-alt fa-3x" style="color: rgb(55, 55, 70);" id="icon-link-fee"></i>
										<h3 class="card-title" id="title-link-fee">Học phí</h3>
									</div>
								</div>
							</div>

							<!-- Hồ sơ -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:darkslateblue ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-file-alt fa-3x" style="color: rgb(36, 31, 63);" id="icon-link-profile"></i>
										<h3 class="card-title" id="title-link-profile">Hồ sơ</h3>
									</div>
								</div>
							</div>
						</div>
			
					</div>

					<div class="container mt-3"  style="padding: 0px !important;">
							<div class="row">
								<div class="col-md-6">
									<div class="jumbotron d-flex justify-content-center align-items-center" style="margin-top: 10px !important;">
										<div class="row">
											<div class="col-md-12 text-center">
												<h4>Thống kê điểm học tập</h4>
												<canvas id="chart1" width="300" height="300"></canvas>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="jumbotron d-flex justify-content-center align-items-center" style="margin-top: 10px !important;">
										<div class="row">
											<div class="col-md-12 text-center">
												<h4>Thống kê theo từng ngành</h4>
												<canvas id="chart2" width="300" height="300"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

				</div>
				<div class="container mt-1 title">
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="jumbotron d-flex justify-content-center align-items-center">
								<h3>ĐẠI HỌC GIAO THÔNG VÂN TẢI TP.HCM</h3>
							</div>
						</div>
                    </div>
                </div>
							
		        </div> 
			
        </div>
	<script src="./js/adminhome.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var percentage_gt_8 = <?php echo $percentage_gt_8; ?>;
        var percentage_5_8 = <?php echo $percentage_5_8; ?>;
        var percentage_lt_5 = <?php echo $percentage_lt_5; ?>;
        
        var myChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Điểm >= 8', 'Điểm >= 5 và <8', 'Điểm < 5'],
                datasets: [{
                    data: [percentage_gt_8, percentage_5_8, percentage_lt_5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Biểu đồ điểm số'
                }
            }
        });

        var ctx2 = document.getElementById('chart2').getContext('2d');

			var myChart2 = new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: ['CNTT', 'HTTT', 'MMTT'],
					datasets: [{
						label: 'Số lượng sinh viên',
						backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)'],
						borderColor: 'rgba(54, 162, 235, 1)',
						borderWidth: 1,
						data: [<?php echo $row_cntt; ?>, <?php echo $row_httt; ?>, <?php echo $row_mmtt; ?>,5,6,7,8,9,10]
					}]
				},
				options: {
					scales: {
						//truc y
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max:10
							}
						}]
					}
				}
			});

	});
    </script>


	
	
</body>
</html>