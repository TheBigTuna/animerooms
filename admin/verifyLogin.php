<?php
    session_start();
    include('../resources/connection.php');

    // Search DB for admin credentials
    $VerifyAdminUser = "SELECT * FROM omoore94_animerooms.admincredentials";        
    $VerifyAdminUserResult = mysqli_query($conn, $VerifyAdminUser);
    while($row = mysqli_fetch_assoc($VerifyAdminUserResult)){
        // Checks for a  username and password
        if($_POST['adminUser'] == $row['User']){
            $Passwords = $row['Password'];
        }
    }

    // Redirects the user depending if the passwords match or not
    if($_POST['adminLogin'] === $Passwords){
        $_SESSION['IsAdmin'] = true;
        header('Location: /admin/main.php');
    }
    else{
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
?> 