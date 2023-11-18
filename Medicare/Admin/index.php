<?php
    session_start();
    if (isset($_SESSION['AuserName']))
    {
        $userName=$_SESSION['AuserName'];
        $con = mysqli_connect("localhost","id14960749_mani","88=A9QaV9S+iXu!W","id14960749_medicare");
        $query='SELECT count(id) FROM `users` WHERE type="Doctor"';
        $result = mysqli_query($con,$query);
        $user = mysqli_fetch_row($result);
        $NoOfDoctors=$user[0];
        $query='SELECT count(id) FROM `users` WHERE type="Staff"';
        $result = mysqli_query($con,$query);
        $user = mysqli_fetch_row($result);
        $NoOfStaffs=$user[0];
        $query='SELECT count(id) FROM `patients`';
        $result = mysqli_query($con,$query);
        $user = mysqli_fetch_row($result);
        $NoOfPatients=$user[0];
    }
    else 
    {
        echo '<script>location.href="../"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicare | Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
</head>
<body class="body">
    <header>
        <section class="header">
            <div class="head-body">
                <div class="logo">
                    <div class="title">
                        <h1><a href="">Medicare</a></h1>
                    </div>
                    <div class="menu">
                        <img  onclick="openMenu()" src="img/menu.svg" alt="">
                    </div>
                </div>
                <div class="menuContent">
                    <div class="close">
                        <img onclick="closeMenu()" src="img/close.svg" alt="">
                    </div>
                    <div class="content">
                        <ul>
                            <li><button name="addUser" id="addUser" onclick="openaddUser()">Add User</button></li>
                            <li><button name="addBranch" id="addBranch" onclick="openaddbranch()">Add Branch</button></li>
                            <li><button name="dashBoardView" id="dashBoardView" onclick="opendashBoard()">Dashboard</button></li>
                            <li><button id="logOut" name="logOut" onclick="logOut()">Log out</button></li>
                        </ul>
                    </div>
                </div>
                <div class="Maincontent">
                    <ul>
                        <li><button name="addUser" id="addUser" onclick="openaddUser()">Add User</button></li>
                        <li><button name="addBranch" id="addBranch" onclick="openaddbranch()">Add Branch</button></li>
                        <li><button name="dashBoardView" id="dashBoardView" onclick="opendashBoard()">Dashboard</button></li>
                        <li><button id="logOut" name="logOut" onclick="logOut()">Log out</button></li>
                    </ul>
                </div>
            </div>
        </section>
    </header>
    <main class="main">
        <section class="formUi" id="addUser">
            <div class="group">
                <div class="great brandName ">
                    <p class="brand"><span>&#128154;</span> Medicare</p>
                    <h1>Add New User</h1>
                    <p>Let's India get immunization. <span>Join</span> your hands with us.</p>
                </div>
                <form action="" method="POST">
                    <div class="row row-2">
                        <label for="name">User Name <span>*</span></label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="row row-2">
                        <label for="number">Number <span>*</span></label>
                        <input type="number" name="number" id="number" required>
                    </div>
                    <div class="row row-2">
                        <label for="email">Email <span>*</span></label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="row row-2">
                        <label for="password">Password <span>*</span></label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="row">
                        <label for="type">Type of user <span>*</span></label>
                        <select name="type" id="type" required>
                            <option disabled="true" selected>Select your option</option>
                            <option value="Admin">Admin</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                    <div class="row">
                        <label for="securityQuestion">favorate color? <span>*</span></label>
                        <input type="text" name="securityQuestion" id="securityQuestion" placeholder="Security Question" required>
                    </div>
                    <div class="row buttonGroup">
                        <button type="subimt" name="addUserSubmit">Add</button>
                        <button type="clear">Clear</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="formUi" id="addbranch">
            <div class="group">
                <div class="great brandName ">
                    <p class="brand"><span>&#128154;</span> Medicare</p>
                    <h1>Add New Branch</h1>
                    <p>Let's India get immunization. <span>Join</span> your hands with us.</p>
                </div>
                <form action="" method="POST">
                    <div class="row row-2">
                        <label for="branchName">Branch Name<span>*</span></label>
                        <input type="text" name="branchName" id="branchName" required>
                    </div>
                    <div class="row row-2">
                        <label for="cost">Cost per Patient <span>*</span></label>
                        <input type="number" name="cost" id="cost" required>
                    </div>
                    <div class="row buttonGroup">
                        <button type="subimt" name="addBranchSubmit">Add</button>
                        <button type="clear">Clear</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="dashBoard" id="dashBoard">
            <div class="dash-body">
                <div class="dash-title">
                    <h1>Admin</h1>
                    <p>Find, Analyse, Fix</p>
                </div>
                <div class="dash-content">
                    <div class="dash-el">
                        <img src="img/doctor.png" alt="">
                        <h1><?php echo $NoOfDoctors;?></h1>
                        <p>No of Doctors</p>
                    </div>
                    <div class="dash-el">
                        <img src="img/user.png" alt="">
                        <h1><?php echo $NoOfStaffs;?></h1>
                        <p>No of Staffs</p>
                    </div>
                    <div class="dash-el">
                        <img src="img/patient.png" alt="">
                        <h1><?php echo $NoOfPatients;?></h1>
                        <p>No of Patients</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="js/script.js"></script>
</body>
</html>
<?php  
    $query="";
    if(isset($_POST["addUserSubmit"]))
    {
        $name=$_POST["name"];
        $number=$_POST["number"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $type=$_POST["type"];
        $securityQuestion=$_POST["securityQuestion"];
        $userId=$type."_".$name;
        $query="INSERT INTO `users`(`user_name`, `password`, `number`, `email`, `user_id`, `type`, `question`) VALUES ('$name','$password','$number','$email','$userId','$type','$securityQuestion')";
        if (mysqli_query($con, $query))
        {
            printf('<script>alert("User Added Sucessfully!")</script>');
        }
        else 
        {
            printf('<script>alert("Submission failed!")</script>');
        }
    }
    if(isset($_POST["addBranchSubmit"]))
    {
        $branchName=$_POST["branchName"];
        $cost=$_POST["cost"];
        $query="INSERT INTO `branch`(`name`, `cost_per_patient`) VALUES ('$branchName','$cost')";
        if (mysqli_query($con, $query))
        {
            printf('<script>alert("Branch Added Sucessfully!")</script>');
        }
        else 
        {
            printf('<script>alert("Submission failed!")</script>');
        }
    }
    
?>