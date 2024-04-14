<?php
    include "conn.php";

        //code for deleting company
        $company_id = $_GET['id'];
        $delete = mysqli_query($conn, "DELETE FROM `users` WHERE id ='$company_id'");
        //WHERE u.user_type = '4'";
    
        if($delete == true){
            ?> 
            <script>
                alert("1 data is deleted");
                window.location.href="Admin/company_accounts.php";
            </script>
            <?php
        }else{
            ?> 
            <script>
                alert("Error in Deleting");
                window.location.href="Admin/company_accounts.php";
            </script>
            <?php
        }

         //code for deleting alumni
         $alumni_id = $_GET['id'];
         $delete = mysqli_query($conn, "DELETE FROM `users` WHERE id ='$alumni_id'");
         //WHERE u.user_type = '5'";
     
         if($delete == true){
             ?> 
             <script>
                 alert("1 data is deleted");
                 window.location.href="Admin/alumni_accounts.php";
             </script>
             <?php
         }else{
             ?> 
             <script>
                 alert("Error in Deleting");
                 window.location.href="Admin/company_accounts.php";
             </script>
             <?php
         }
     
    


    //code for deleting events
    if(isset($_POST['add_jobs'])){
    $ref_id = $_GET['entry_id'];
    $delete = mysqli_query($conn, "DELETE FROM add_jobs WHERE entry_id='$ref_id'");

    if($delete == true){
        ?> 
        <script>
            alert("1 data is deleted");
            window.location.href="Admin/job_search.php";
        </script>
        <?php
    }else{
        ?> 
        <script>
            alert("Error in Deleting");
            window.location.href="Admin/job_search.php";
        </script>
        <?php
    }

}

    //code for deleting company
    $ref_id = $_GET['events'];
    $delete = mysqli_query($conn, "DELETE FROM events WHERE entry_id='$ref_id'");

    if($delete == true){
        ?> 
        <script>
            alert("1 data is deleted");
            window.location.href="Admin/events.php";
        </script>
        <?php
    }else{
        ?> 
        <script>
            alert("Error in Deleting");
            window.location.href="Admin/events.php";
        </script>
        <?php
    }

     //code for deleting company
     $ref_id = $_GET['add_jobs'];
     $delete = mysqli_query($conn, "DELETE FROM events WHERE entry_id='$ref_id'");

     if($delete == true){
         ?> 
         <script>
             alert("1 data is deleted");
             window.location.href="Admin/postjob.php";
         </script>
         <?php
     }else{
         ?> 
         <script>
             alert("Error in Deleting");
             window.location.href="Admin/postjob.php";
         </script>
         <?php
     }
 
            //code for unsaving job post
            $save_id = $_GET['add_jobs'];
            $delete = mysqli_query($conn, "DELETE FROM events WHERE entry_id='$save_id'");

            if($delete == true){
                ?> 
                <script>
                    alert("1 data is deleted");
                    window.location.href="Admin/postjob.php";
                </script>
                <?php
            }else{
                ?> 
                <script>
                    alert("Error in Deleting");
                    window.location.href="Admin/postjob.php";
                </script>
                <?php
            }










?>

