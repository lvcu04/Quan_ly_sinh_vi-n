<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "sms";

// Kết nối tới cơ sở dữ liệu
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['student_id'])) {
    $user_id = $_GET['student_id'];

    // Xóa trong bảng student
    $stmt_student = mysqli_prepare($data, "DELETE FROM student WHERE id = ?");
    mysqli_stmt_bind_param($stmt_student, 'i', $user_id);
    $result_student = mysqli_stmt_execute($stmt_student);
    mysqli_stmt_close($stmt_student);

    // Nếu xóa thành công trong bảng student, mới tiếp tục xóa trong bảng users
    if ($result_student) {
        $stmt_users = mysqli_prepare($data, "DELETE FROM users WHERE id = ?");
        mysqli_stmt_bind_param($stmt_users, 'i', $user_id);
        $result_users = mysqli_stmt_execute($stmt_users);
        mysqli_stmt_close($stmt_users);

        if ($result_users) {
            header("Location: ./src/view_student.php");
            exit;
        } else {
            echo "Lỗi khi xóa từ bảng users.";
        }
    } else {
        echo "Lỗi khi xóa từ bảng student.";
    }
} else {
    echo "Không tìm thấy ID sinh viên.";
}

?>
