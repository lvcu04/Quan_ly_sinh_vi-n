document.getElementById("icon-link-student").addEventListener("click",function(){
    window.location.href="view_student.php";
})
document.getElementById("title-link-student").addEventListener("click",function(){
    window.location.href="view_student.php";
})

// Lấy tham chiếu đến các canvas
var ctx1 = document.getElementById('chart1').getContext('2d');
var ctx2 = document.getElementById('chart2').getContext('2d');

// Dữ liệu cho biểu đồ tròn 1
var data1 = {
    labels: ['A', 'B', 'C'],
    datasets: [{
        data: [30, 40, 30],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
};

// Dữ liệu cho biểu đồ tròn 2
var data2 = {
    labels: ['X', 'Y', 'Z'],
    datasets: [{
        data: [20, 50, 30],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
};

// Cấu hình các biểu đồ tròn
var options = {
    responsive: false
};

// Tạo biểu đồ tròn 1
var chart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data1,
    options: options
});

// Tạo biểu đồ tròn 2
var chart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: data2,
    options: options
});