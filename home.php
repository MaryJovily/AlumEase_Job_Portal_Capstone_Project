<?php
    session_start();
    include "conn.php";
    if(!isset($_SESSION['sessionID'])){
        include "login.php";
    }else{
        $loggedInID = $_SESSION['sessionID'];
        $fetchUserInfoStatement = "SELECT * FROM `users` WHERE `id`=$loggedInID";
        $fetchUserQuery = mysqli_query($conn, $fetchUserInfoStatement);
        $sessionData = mysqli_fetch_assoc($fetchUserQuery);
        $sessionEmail = $sessionData['email'];

?>

        Hello <?= $sessionEmail; ?>

        <h1> This Page is For Registered Users Only </h1>

        <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>

        <?php
            include "conn.php";

            $fetchUserStatement = "SELECT * FROM `users`";
            $fetchUserQuery = mysqli_query($conn, $fetchUserStatement);

            while($userData = mysqli_fetch_array($fetchUserQuery)){    
                $userDataID = $userData['id'];
                $userDataEmail = $userData['email'];
                $userDataPassword = $userData['password'];
        ?>
                <tr>
                    <td><?= $userDataID ?></td>
                    <td><?= $userDataEmail ?></td>
                    <td><?= $userDataPassword ?></td>
                </tr>
        <?php
            }  
        ?>
        </table>

        <?php } ?>
