<?php
include "conn.php";
session_start();

// Check if the form is submitted for user registration
if(isset($_POST['users_reg'])){
    $email = $_POST['email'];
    $password = $_POST['password']; // Assuming password is obtained from the form

    // Hash the password
    $encryptpass = password_hash($password, PASSWORD_BCRYPT);

    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (id, email, password) VALUES (0, '$email', '$encryptpass')";

    // Execute the SQL query
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Registered successfully!');</script>";
        header("Refresh:0; url=login.php");
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<div class="container">
        <h1><b>REGISTER</b></h1>
            <p>Please fill in this form to create an account.</p>
        <hr>  
        <form action="process.php" method ="POST">
                
                    <label><b>User Type</b></label>
                    <select class= "form-select" name="user_type">
                        <option selected> </option> 
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">Dean</option>
                        <option value="4">Company</option>
                        <option value="5">Alumni</option>
                    </select>
    
                        <label><b>User Status</b></label>
                        <select class="form-select" name="user_status">
                            <option selected> </option> 
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                
                          <label><b>Email</b></label>
                          <input type="email" placeholder="Enter Email" name="email" required>
                      
                          <label><b>Password</b></label>
                          <input id="password" type = "password" placeholder="Enter Password" name="password" 
                          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase 
                          letter, and at least 8 or more characters" required></br>
                          
                          <input type = "checkbox" onclick="myFunction()">Show Password
                          
                          <input type="submit" class="btn" name = "users_reg" value ="REGISTER">

                        <p>Already have an account? <a href="login.php">LOGIN</a></p>
                      
                    </div>           
            </form>
        </div>

        <script>
                function myFunction() {
                    var x = document.getElementByID("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    }else{
                        x.type = "password";
                    }
                }
            </script>
</body>
</html>