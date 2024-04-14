<?php
    include "conn.php";
    session_start();


    if (isset($_POST['loginform'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $accountStatement = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`= '$email'");
        $row = mysqli_fetch_array($accountStatement);

        $status = $row['user_status'];

        $accountStatement2 = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`= '$email'");
        $accountQuery = mysqli_num_rows($accountStatement2);

        if($accountQuery == 1){
            $_SESSION['user_status'] = $row['user_status'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            if($status == "1"){
                echo "<script>
                alert('Login Success!);
                window.location.href='alumni_page.php';
            </script>";
            }elseif($status == 3){
                echo "<script>
                alert('Your account is still pending!);
                window.location.href='index.php';
            </script>";
            }
        }

        
                //Login Validation for admin
                if(isset($_POST['loginform'])){
                    $process_email = $_POST['email'];
                    $process_password = $_POST['password'];
        
                    $checkAccountStatement = "SELECT * FROM `users` WHERE `email`= '$process_email' AND `password` = '$process_password'";
                    $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
                    $countAccount = mysqli_num_rows($checkAccountQuery);
        
                    if($countAccount > 0){
                        $rowData = mysqli_fetch_assoc($checkAccountQuery);
                        $databasePassword = $rowData['password'];
                        if($databasePassword == $process_password){
                            $_SESSION['sess_id'] = $rowData['id'];
                                if($rowData['user_type']== "1" ){
                                header("refresh: 2; url=SuperAdmin/superadmin.php");
                                }elseif($rowData['user_type']== "2" ){
                                    header("refresh: 2; url=Admin/admin_page.php");
                                }elseif($rowData['user_type']== "3" ){
                                    header("refresh: 2; url=Dean/dean_page.php");
                                }elseif($rowData['user_type']== "4" ){
                                    header("refresh: 2; url=Company/company_page.php");
                                }elseif($rowData['user_type']== "5" ){
                                    header("refresh: 2; url=Alumni/alumni_page.php");
                                }
                            }else{
                                echo "Please create an account";
                            }
                    }else{
                        ?>
                        <script>
                            alert("Incorrect Password!");
                            window.location.href="login.php";
                        </script>
                        <?php
                    }
                }
     
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >
    <link rel="stylesheet" href="css/forms.css">

</head>
<body>
    

  
        <h1><b>LOGIN</b></h1>
            
        <hr>  
        <form action="login.php" method ="POST">
                 
            <label><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required></p>
                      
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter password" name="password" required></p>
           
            <input type="submit" class="btn" name = "loginform" value ="LOGIN"></p>

            <p>Don't have an account? <a href="reg.php">REGISTER</a></p>                
        
        </form>
   


</body>
</head>

<?php } ?>