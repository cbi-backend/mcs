<?php

    session_start();
    if (isset($_SESSION['AuserName']))
    {
        echo '<script>location.replace("Admin");</script>';
    }
    if (isset($_SESSION['DuserName']))
    {
        echo '<script>location.replace("Doctor");</script>';
    }
    if (isset($_SESSION['SuserName']))
    {
        echo '<script>location.replace("Staff");</script>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicare | Log In</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
</head>
<body class="body">
    <main class="main">
        <section class="pageBanner">
            <div class="content">
                <h1>Revolution in Medical</h1>
                <ul>
                    <li>Test</li>
                    <li>Treat</li>
                    <li>Prevent</li>
                </ul>
            </div>
        </section>
        <section class="formUi">
            <div class="group">
                <div class="great brandName ">
                    <p class="brand"><span>&#128154;</span> Medicare</p>
                    <h1>Welcome</h1>
                    <p>Let's India get immunization. <span>Join</span> your hands with us.</p>
                </div>
                <form action="" method="POST">
                    <div class="row">
                        <label for="userId">User ID <span>*</span></label>
                        <input type="text" name="userId" id="userId" required>
                    </div>
                    <div class="row">
                        <label for="password">Password <span>*</span></label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="row buttonGroup">
                        <button type="subimt" name="login">Log In</button>
                        <a href="mailto:manimaranbhuwaneshwaran@gmail.com">Forgot password</a>
                    </div>
                </form>
                <div class="request">
                    <p>Still don't have account? <a href="mailto:manimaranbhuwaneshwaran@gmail.com">Send Request</a></p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
<?php
    if(isset($_POST['login']))
    {
        $userId=$_POST['userId'];
        $password=$_POST['password'];
        $con = mysqli_connect("localhost","id14960749_mani","88=A9QaV9S+iXu!W","id14960749_medicare");
        $query= "SELECT user_id,password,type FROM `users` WHERE user_id='$userId'";
        
        $result1 = mysqli_query($con,$query);
        $user1 = mysqli_fetch_row($result1);
        if($user1[0] === $userId && $user1[1]===$password)
        {
            if($user1[2]==="Admin")
            {
                $_SESSION['AuserName']=$userId;
                echo '<script>location.replace("Admin");</script>';
            }
            else if($user1[2]==="Doctor")
            {
                $_SESSION['DuserName']=$userId;
                echo '<script>location.replace("Doctor");</script>';
            }
            else if($user1[2]==="Staff")
            {
                $_SESSION['SuserName']=$userId;
                echo '<script>location.replace("Staff");</script>';
            }
            else 
            {
                printf("<script>alert('Malfunctions not allowed!')</script>");
            }
        }
        else if($user1[0] === $userId)
        {
            printf("<script>alert('Invaild Credentials')</script>");
        }
        else
        {
            printf("<script>alert('No user Account found')</script>");
        }
    }
?>