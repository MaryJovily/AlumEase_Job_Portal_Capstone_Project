<?php
  include "conn.php";
  session_start();

  
  if(!isset($_SESSION['sess_id'])){
    header("refresh: 2; url=login.php");
  }else{
    $browserId = $_SESSION['sess_id'];
    $accountStatement = "SELECT * FROM `users` t1 INNER JOIN `user_profile` t2 ON t1.`id`=t2.`id` WHERE t1.`id`=$browserId";
    $accountQuery = mysqli_query($conn, $accountStatement);
    $a = mysqli_fetch_array($accountQuery);
   
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALUMEASE</title>
    <link rel="stylesheet" href="astyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/postjob.css">
</head>
<body>


    <input type="checkbox" id="check">
    <!---header area start -->
    <header>
        <label for="check">
            <i class="fa-solid fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Alum<span>Ease<span></h3>
        </div>
        <div class="right_area">
            <a href="index.php" class="logout_btn"> Logout</a>
        </div>
    </header>
    <!---header area end -->


    <div class="container">
    <h1><b>Post a Job</b></h1>
    <p>Please fill in the details of the job you want to post.</p>
    <hr>

        <form action="process.php" method="POST">
     
        <label><b>Company Name</label></b>
        <input type="text" class="form-control" name="company_name" placeholder="Enter Company name" required>
        
        <label><b>Job Title</label></b>
        <input type="text" class="form-control" name="job_title" placeholder="Enter Job Title" required>


        <label><b>Job Description</b></label>
        <input type="text" class="form-control" name="job_des" placeholder="Enter Company name" required>

        <label><b>Job Type</b></label>
        <textarea name="description" name="job_type" placeholder="Enter Job Type" required>
       
        <label><b>Job Category</label></b>
        <input type="text" class="form-control" name="job_cat" placeholder="Enter Job Category" required>
      
        <label><b>Salary</label></b>
        <input type="text" class="form-control" name="salary" placeholder="Enter Salary" required>
   
        <label><b>Skills</b></label>
        <input type="text" placeholder="Enter Skills" name="skills" required>

        <label><b>Location</b></label> 
        <input type="text" placeholder="Location" name="location" required></p>

        <input type="submit" class="submit-btn" name = "add_jobs" value ="Post"> 
    </div>
  </form>

</body>

</html>

<?php } ?>