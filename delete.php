<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

// Kết nối tới cơ sở dữ liệu
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['student_code'])) {
    $user_code = $_GET['student_code'];

    // Bắt đầu giao dịch
    mysqli_begin_transaction($data);

    // Xóa trong bảng student
    $stmt_student = mysqli_prepare($data, "DELETE FROM student WHERE code = ?");
    mysqli_stmt_bind_param($stmt_student, 's', $user_code);
    $result_student = mysqli_stmt_execute($stmt_student);

    // Xóa trong bảng users
    $stmt_users = mysqli_prepare($data, "DELETE FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt_users, 's', $user_code);
    $result_users = mysqli_stmt_execute($stmt_users);
    
    //Xóa trong bảng course_has_student
    $stmt_course_has_student = mysqli_prepare($data, "DELETE FROM course_has_student WHERE student_code = ?");
    mysqli_stmt_bind_param($stmt_course_has_student, 's', $user_code);
    $result_course_has_student = mysqli_stmt_execute($stmt_course_has_student);
    
    // Nếu cả hai xóa đều thành công, commit giao dịch và chuyển hướng
    if ($result_student && $result_users && $result_course_has_student) {
        mysqli_commit($data);
        header("Location: view_student.php");
        exit;
    } 
    else {
        // Nếu bất kỳ thao tác nào thất bại, rollback giao dịch
        mysqli_rollback($data);
        echo "Lỗi khi xóa dữ liệu.";
    }
    

    // Đóng câu lệnh prepared statement
    mysqli_stmt_close($stmt_student);
    mysqli_stmt_close($stmt_users);
    mysqli_stmt_close($stmt_course_has_student);
    
} else {
    echo "Không tìm thấy mã sinh viên.";
}


?>
