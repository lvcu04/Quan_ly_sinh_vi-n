<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

// Kết nối tới cơ sở dữ liệu
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['c_h_s_code'])) {
    $course_has_student_code = $_GET['c_h_s_code'];

   mysqli_begin_transaction($data);

   //Xóa trong bảng result
   $stmt_result = mysqli_prepare($data,"DELETE FROM result WHERE c_h_s_code = ?");
    mysqli_stmt_bind_param($stmt_result,'s',$course_has_student_code);
    $result_result = mysqli_stmt_execute($stmt_result);
    //Xóa trong bảng course_has_student
    $stmt_course_has_student = mysqli_prepare($data,"DELETE FROM course_has_student WHERE  student_code = ?" );
    mysqli_stmt_bind_param($stmt_course_has_student,'s',$course_has_student_code);
    $result_course_has_student = mysqli_stmt_execute($stmt_course_has_student);
    
    if($result_result && $result_course_has_student){
        mysqli_commit($data);
        header("Location: view_result.php");
        exit;
    }
    else{
        mysqli_rollback($data);
        echo "Lỗi khi xóa dữ liệu";
    }

    // Đóng câu lệnh prepared statement
    mysqli_stmt_close($stmt_result);
    mysqli_stmt_close($stmt_course_has_student);
}
   else{
      echo"Không tìm thấy mã."; 
   }
?>
