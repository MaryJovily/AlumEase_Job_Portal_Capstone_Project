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

    if(isset($_POST['search'])){

    }else{
        $query = "SELECT * FROM `add_jobs`";
        $search_result = filterTable($query);
    }

    function filterTable($query){
        $conn = mysqli_connect("localhost", "root", "", "jobpostal");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }

   
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALUMEASE</title>
    <link rel="stylesheet" href="astyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="pstyle.css">
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

    <!---sidebar area start -->
    <div class="sidebar">
        <center>
            <img src="img/profile.jpg" class="profile_image" alt="">
            <h4>Admin</h4>
        </center>
        <a href="#"><i class="fa-solid fa-desktop"></i><span>Dashboard</span></a>
        <a href="#"><i class="fa-regular fa-user"></i><span>My Profile</span></a>
        <a href="job_search.php"><i class="fa-solid fa-briefcase"></i><span>Jobs</span></a>
        <a href="alumni_accounts.php"><i class="fa-solid fa-users"></i><span>User Accounts</span></a>
        <a href="#"><i class="fa-regular fa-chart-bar"></i><span>Statistics</span></a>
        <a href="#"><i class="fa-solid fa-rectangle-ad"></i><span>Advertisements</span></a>
        <a href="#"><i class="fa-solid fa-circle-info"></i></i><span>About</span></a>
        <a href="#"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
    </div>
    <!---sidebar area end -->

          <h1>Job Search</h1>

        <form>
            <input type="text" name="search" placeholder="Search">
            <button type="submit" name="submit-search" >Search</button>
        
         
          <table border = 3px solid>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Company Name</th>
                <th scope="col">Job Title</th>
                <th scope="col">Job Type</th>
                <th scope="col">Industry</th>
                <th scope="col">Salary</th>
                <th scope="col">Skills</th>
                <th scope="col">Experience</th>
                <th scope="col">Location</th>
                <th scope="col">Date Posted</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
              </tr>
            </thead>

            <?php 
            while($row = mysqli_fetch_array($search_result));
            ?>
            
            <tr>
                <th><?php echo $row['id'];?></th>
                <td><?php echo $row['company_name'];?></td>
                <td><?php echo $row['job_title'];?></td>
                <td><?php echo $row['job_type'];?></td>
                <td><?php echo $row['industry'];?></td>
                <td><?php echo $row['salary'];?></td>
                <td><?php echo $row['skills'];?></td>
                <td><?php echo $row['experience'];?></td>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['date_posted'];?></td>
          
              </tr>


            <tbody>
            </form>
      
          <a href="post_a_job.php"> Post a Job? Click Here!</a>

</body>
</html>
<?php } ?>