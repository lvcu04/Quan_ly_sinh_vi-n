document.getElementById('view_schedule').addEventListener('click',function(){
    var table = document.getElementById('show_table');
    if(table.style.display === 'none'){
        table.style.display = 'table';
    }
    else{
        table.style.display = 'none';
    }
});
document.getElementById("add_schedule").addEventListener("click", function() {
    window.location.href = "add_schedule.php";
});
document.getElementById('search_schedule_btn').addEventListener('click', function() {
    
    var keyword = document.getElementById('input_search').value.trim().toUpperCase();
    
    // Lấy các hàng trong bảng sinh viên
    var rows = document.querySelectorAll('#show_table tbody tr');
    
    // Lặp qua từng hàng để kiểm tra và ẩn/hiển thị dựa vào từ khóa tìm kiếm
    rows.forEach(function(row) {
        var shouldDisplay = false;
        var cells = row.querySelectorAll('td');
        
        // Kiểm tra từng ô trong hàng
        cells.forEach(function(cell) {
            var cellText = cell.textContent.trim().toUpperCase();
            
            // Nếu từ khóa tìm kiếm xuất hiện trong bất kỳ ô nào của hàng
            if (cellText.includes(keyword)) {
                shouldDisplay = true;
            }
        });
        
        // Ẩn/hiển thị hàng dựa vào kết quả tìm kiếm
        if (shouldDisplay) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
