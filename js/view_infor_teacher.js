document.getElementById('view_teacher').addEventListener('click', function(){
    var table1 = document.getElementById('show_table');
    var table2 = document.getElementById('show_table_relationship');
    if(table1.style.display === 'none'){
        table1.style.display = 'table'; 
        table2.style.display = 'none'; 
    } else {
        table1.style.display = 'none';
        table2.style.display = 'none'; 
    }
});
document.getElementById('view_relationship').addEventListener('click',function(){
    var table2 = document.getElementById('show_table_relationship');
    var table1 = document.getElementById('show_table');
    if( table2.style.display === 'none'){
        table2.style.display = 'table';
        table1.style.display = 'none'; 
    }
    else{
        table2.style.display = 'none';
        table1.style.display = 'none'; 
    }
});


document.getElementById("add_teacher").addEventListener("click", function() {
    window.location.href = "add_teacher.php";
});


document.getElementById('search_teacher_btn').addEventListener('click', function() {
    
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
