
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
										<h3 class="card-title">Lớp</h3>
									</div>
								</div>
							</div>

							<!-- Môn học -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:darkred ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-book-open fa-3x" style="color: rgb(52, 4, 4)" id="icon-link"></i>
										<h3 class="card-title">Môn học</h3>
									</div>
								</div>
							</div>

							<!-- Giảng viên -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:darkgreen ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-chalkboard-teacher fa-3x" style="color: rgb(2, 54, 12)" id="icon-link"></i>
										<h3 class="card-title">Giảng viên</h3>
									</div>
								</div>
							</div>
						</div>

						<!-- Học tập -->
						<div class="row text-center mt-3">
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:darkblue ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-book fa-3x" style="color: rgb(1, 1, 70)" id="icon-link-learning"></i>
										<h3 class="card-title">Học tập</h3>
									</div>
								</div>
							</div>

							<!-- Lịch học -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:cornflowerblue ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-calendar-alt fa-3x" style="color: rgb(28, 28, 80)" id="icon-link-schedule"></i>
										<h3 class="card-title">Lịch học</h3>
									</div>
								</div>
							</div>

							<!-- Học phí -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:lightslategray ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-money-bill-alt fa-3x" style="color: rgb(55, 55, 70);" id="icon-link-fee"></i>
										<h3 class="card-title">Học phí</h3>
									</div>
								</div>
							</div>

							<!-- Hồ sơ -->
							<div class="col-md-3" style="height:150px">
								<div class="card" style="background-color:darkslateblue ; color:white ; height:150px">
									<div class="card-body">
										<i class="fas fa-file-alt fa-3x" style="color: rgb(36, 31, 63);" id="icon-link-profile"></i>
										<h3 class="card-title">Hồ sơ</h3>
									</div>
								</div>
							</div>
						</div>
			
					</div>
					<div class="jumbotron container mt-5 " style="margin-top: 10px !important;">
						<div class="row">
							<div class="col-md-9 text-center">
								<canvas id="chart1" width="200" height="200"></canvas>
							</div>
							<div class="col-md-3 text-center ">
								<canvas id="chart2" width="200" height="200"></canvas>
							</div>
						</div>
                    </div>

				</div>
					
        </div>
	        
		</div>	

	         

	</div>
			<!-- <div class="jumbotron" style="padding-left:550px ">
				<h3>ĐẠI HỌC GIAO THÔNG VÂN TẢI TPHCM</h3>
			</div> -->
		</div>
    </div>   
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script src="./js/adminhome.js"></script>
	
</body>
</html>