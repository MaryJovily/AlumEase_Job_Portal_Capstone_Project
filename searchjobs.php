<?php
  include "conn.php";
  session_start();

  
  if(!isset($_SESSION['sess_id'])){
    header("refresh: 2; url=login.php");
  }else{
    $browserId = $_SESSION['sess_id'];
    $accountStatement = "SELECT * FROM `users` t1 INNER JOIN `user_profile` t2 ON t1.`id`=t2.`id` WHERE t1.`id`=$browserId";
    $accountQuery = mysqli_query($conn, $accountStatement);
    $row = mysqli_fetch_array($accountQuery);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $regDate = $row['date_registered'];
    $readable_regDate = date("F j, Y", $regDate);

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asearch_data.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<h1>  Featured Jobs </h1>


<div class="container">
    <?php
    $sql = "SELECT t1.id, t2.fname, t3.entry_id, t3.job_title, t3.job_des, t3.job_type, t3.job_cat, t3.salary, t3.skills, t3.location, t3.date_posted
    FROM users t1
    LEFT OUTER JOIN user_profile t2
    ON t1.id = t2.id 
    LEFT OUTER JOIN add_jobs t3
    ON t1.id = t3.id
    WHERE t1.user_type = '4'";
    //$sql =  "SELECT * FROM add_jobs WHERE id = '$company_name' AND date_posted = '$date_posted'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if($queryResults > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo " <div class = 'container-box'>
            <td>".$row['id']."</td>
            <td>".$row['job_title']."</td>
            <td>".$row['job_type']."</td>
            <td>".$row['location']."</td>
         </div></a>";
        }
    }
    ?>
    </div>
</body>
</html>

<?php } ?>