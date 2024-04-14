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

<h1> Search Page </h1>

<div class="container">
    <?php
        if(isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM add_jobs WHERE id LIKE '%$search%' OR job_title LIKE '%$search% '
            OR job_type LIKE '%$search%'  OR location LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);        
        

            if ($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<a href='searchjobs.php?company_name=".$row['company_name']."&date_posted=".$row['date_posted']."'>
                    <div class = 'container-box'>
                    <th>".$row['id']."</th>
                    <td>".$row['company_name']."</td>
                    <td>".$row['job_title']."</td>
                    <td>".$row['job_type']."</td>
                    <td>".$row['location']."</td>
                </div></a>";
                    }
                }else{
                    echo "No results found!";
                }
            }
?>
</div>

<?php } ?>