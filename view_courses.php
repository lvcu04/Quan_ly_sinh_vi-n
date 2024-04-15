
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include('admin_css.php'); ?>
    <style type="text/css">

     .custom-border {
         border-width: 3px; 
    }
    .custom-border th{
        border-width: 3px; 
    }
    .custom-border td{
        border-width: 3px; 
    }
    .btn-sm{
        height: 27px;
    }
    </style>

</head>
<body>
    <?php include('admin_sidebar.php'); ?>
    <div class="content ">
        <center >
        <div class="jumbotron text-center my-8 py-4 "> <h1>Quản lý môn học</h1></div>
       
         <div class="container">
        
            
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="input_search" placeholder="Nhập thông tin sinh viên">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button" id="search_student_btn">Tìm kiếm</button>
                    </div>
                </div>
            </div>

         </div>
        </div>
       </div>
    </div>

     </center> 
  </div>
</body>
</html>
