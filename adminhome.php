
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
		<div class="jumbotron text-center my-6 py-4">
			<h2>PHẦN MỀM QUẢN LÝ SINH VIÊN</h2>
		</div>
		
				<!-- Quan ly danh sach mon hoc -->
				<div class="row border">
					<div class="col-6">
						<div  class="container-fluid bg-light my-5 py-2">
							<div class="jumbotron text-center my-2 py-2">
								<h4>QUẢN LÝ DANH SÁCH MÔN HỌC</h4>
							</div>
							<div class="row text-center mx-auto my-2 py-2">
								<div class="col-6">
									Tìm kiếm môn học: <input type="text" id="search_subject_input">
									<input type="button" id="search_subject_btn" value="SEARCH">
								</div>
								<div class="col-6">
									Xem toàn bộ môn học -> <input class="text-center mx-auto" style="width:200" type="button" value="VIEW" id="view_subjects_btn">
								</div>
							</div>
							<div class="row py-2 my-2">
								<input data-toggle="modal" data-target="#add_subject_div" id="add_subject_btn" type="button" value="THÊM MÔN HỌC" style="width:100%;">
								<table  class="w-100 my-2 mx-auto border" style="width: 100%"></table>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div  class="container-fluid bg-light border my-5 py-2">
							<div class="jumbotron text-center mx-auto my-2 py-2">
								<h4>QUẢN LÝ DANH SÁCH LỚP HỌC</h4>
							</div>
							<div class="row">
								<div class="col-6">
									Tìm kiếm lớp học: <input type="text" id="search_course_input">
									<button id="search_course_btn">SEARCH</button>
								</div>
								<div class="col-6">
									Xem toàn bộ lớp học -> <button id="view_courses_btn">VIEW</button>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<table  class="w-100 mx-auto border" style="width:100%"></table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="jumbotron" style="padding-left:550px">
			<h3>ĐẠI HỌC GIAO THÔNG VÂN TẢI TPHCM</h3>
		</div>
	</div>
	<div id="add_subject_div" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h6> THÊM MÔN HỌC MỚI</h6>
				</div>
					<div class="modal-body">
						<div class="form-group">
							<p>Mã môn học</p>
							<input type="text" id="subject_code_input" class="mx-auto" style="width:75%"><br>
						</div>
						<div class="form-group">
							<p>Tên môn học</p>
							<input type="text" id="subject_name_input" class="mx-auto" style="width:75%"><br>
						</div>
						<div class="form-group">
							<p>Số tín chỉ</p>
							<input type="number" id="subject_num_credit_input" class="mx-auto" style="width:75%"><br>
						</div>
						<div class="form-group">
							<p>Khoa</p>
							<input type="text" id="subject_major_input" class="mx-auto" style="width:75%"><br>
						</div>
					</div>
					<div class="modal-footer">
						<button id="add_subject_submit" type="submit">SUBMIT</button>
					</div>
			</div>
		</div>
	</div>
	<div id="add_course_div" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h6>THÊM LỚP HỌC MỚI</h6>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Mã môn học -> </label>
						<label for="" id="subject_code_lbl"></label>
					</div>
					<div class="form-group">
						<label>Tên môn học -> </label>
						<label for="" id="subject_name_lbl"></label>
					</div>
					<div class="form-group">
						<p>Giảng viên -> 
						<label for="" id="teacher_name_lbl"></label></p>
						<input type="text" id="teacher_search_input" placeholder="Gõ tên hoặc mã gv">
						<select id="teacher_select"></select>
					</div>
					<div class="form-group">
						<label>Học kỳ -> </label>
						<label for="" id="course_time">Fall2018</label>
					</div>
					<div class="form-group">
						<label>Phòng -> </label>
						<input type="text" id="room_input">
					</div>
					<div class="form-group">
						<label for="">Ngày</label>
						<select id="day_select">
							<option value="MONDAY">MONDAY</option>
							<option value="TUESDAY">TUESDAY</option>
							<option value="WEDNESDAY">WEDNESDAY</option>
							<option value="THURSDAY">THURSDAY</option>
							<option value="FRIDAY">FRIDAY</option>
							<option value="SATURDAY">SATURDAY</option>
							<option value="SUNDAY">SUNDAY</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Nhóm</label>
						<input type="text" id="group_input">
					</div>
					<div class="form-group">
						<label>Kíp bắt đầu -> </label>
						<input type="text" id="start_time_input">
					</div>
					<div class="form-group">
						<label>Số tiết -> </label>
						<input type="text" id="duration_time_input">
					</div>
				</div>
				<div class="modal-footer">
					<button id="add_course_submit" type="submit">SUBMIT</button>
				</div>
			</div>
		</div>
	</div>
	<div id="add_student_to_course_div" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h6>THÊM SINH VIÊN VÀO LỚP HỌC</h6>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Mã lớp học -> </label>
						<label for="" id="course_code_lbl"></label>
					</div>
					<div class="form-group">
						<p>
							<label for="">Sinh viên -> </label>
							<label for="" id="student_to_course_name_lbl"></label>
						</p>
						<input type="text" id="student_search_input" placeholder="Gõ tên hoặc mã sinh viên">
						<select id="student_select"></select>
					</div>
				</div>
				<div class="modal-footer">
					<button id="add_student_to_course_btn">SUBMIT</button>
				</div>
			</div>
		</div>
	</div>
	<div id="modify_result_div" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h6>SỬA ĐIỂM</h6>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<p><label for="">Mã điểm -> </label><label id="result_code_lbl"></label></p>
						<p><label for="">Chuyên cần -> </label><input type="text" id="chuyen_can_input"></p>
						<p><label for="">Giữa kỳ -> </label><input type="text" id="giua_ky_input"></p>
						<p><label for="">Bài tập -> </label><input type="text" id="bai_tap_input"></p>
						<p><label for="">Cuối kỳ -> </label><input type="text" id="cuoi_ky_input"></p>
						<p>
							Trạng thái -> 
							<select id="result_status_select">
								<option value="STUDYING">ĐANG HỌC</option>
								<option value="STUDIED">ĐÃ HỌC</option>
							</select>
						</p>
					</div>
				</div>
				<div class="modal-footer">
					<button id="modify_result_submit">SUBMIT</button>
				</div>
			</div>
		</div>
	</div>
    </div>   
</body>
</html>