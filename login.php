<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body> 
    
    <center>
        <div class="form_deg">
            <center class="title_deg">
                Login Form
                <h4>
                    <?php
                    error_reporting(0);
                    session_start();
                    session_destroy();

                echo $_SESSION['loginMessage'];
                    ?>
                </h4>
            </center>
            <form action="login_check.php"
            method="POST" class="login_form">
                
                <img src="img/avatar-icon.webp" width="150px">
                <h2 class="title_name">Welcome</h2>
        
        
                    <label class="label_deg">Username</label>
                    
                    <div class="div">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username">
                    </div>
        

                
                         <label class="label_deg">Password</label>
                    
                    <div class="div">
                       <i class="fas fa-lock"></i>
                        <input type="Password" name="password">
                    </div>
                
                <a class="forgot_pass" href="#">Forgot Password</a>
                <div >
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </center>

</body>
</html>