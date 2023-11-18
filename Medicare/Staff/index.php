<?php
    session_start();
    if (isset($_SESSION['SuserName']))
    {
        $userName=$_SESSION['SuserName'];
        $con = mysqli_connect("localhost","id14960749_mani","88=A9QaV9S+iXu!W","id14960749_medicare");
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
    <title>Medicare | Staff</title>
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
                            <li><button onclick="openAddPAtient()">Add Patient</button></li>
                            <li><button onclick="openDashBoard()">Dashboard</button></li>
                            <li><button name="logOut" onclick="logOut()">Log out</button></li>
                        </ul>
                    </div>
                </div>
                <div class="Maincontent">
                    <ul>
                        <li><button onclick="openAddPAtient()">Add Patient</button></li>
                        <li><button onclick="openDashBoard()">Dashboard</button></li>
                        <li><button name="logOut" onclick="logOut()">Log out</button></li>
                    </ul>
                </div>
            </div>
        </section>
    </header>
    <main class="main">
        <section class="formUi">
            <div class="group">
                <div class="great brandName ">
                    <p class="brand"><span>&#128154;</span> Medicare</p>
                    <h1>Add Patient</h1>
                    <p>Let's India get immunization. <span>Join</span> your hands with us.</p>
                </div>
                <form action="" method="POST">
                    <div class="row">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="row">
                        <label for="branchname">Branch Name <span>*</span></label>
                        <input type="text" name="branchname" id="branchname" required>
                    </div>
                    <div class="row">
                        <label for="number">Number <span>*</span></label>
                        <input type="number" name="number" id="number" required>
                    </div>
                    <div class="row">
                        <label for="age">Age <span>*</span></label>
                        <input type="number" name="age" id="age" required>
                    </div>
                    <div class="row buttonGroup">
                        <button type="subimt" name="addpatient">Add</button>
                        <button type="clear">Clear</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="dashBoard" id="dashBoard">
            <div class="dash-body">
                <div class="dash-title">
                    <h1>Staff</h1>
                    <p>Find, Analyse, Fix</p>
                </div>
                <div class="dash-content">
                    <div class="dash-el">
                        <img src="img/patient.png" alt="">
                        <h1><?php echo $NoOfPatients;?></h1>
                        <p>No Of Patients</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="js/style.js"></script>
</body>
</html>
<?php  
    $query="";
    $staff=$_SESSION['SuserName'];
    if(isset($_POST["addpatient"]))
    {
        $name=$_POST["name"];
        $number=$_POST["number"];
        $branchname=$_POST["branchname"];
        $age=$_POST["age"];
        $userId="Patient_".$name;
        $query="INSERT INTO `patients`( `name`, `number`, `age`, `patient_id`,`staff_name`) VALUES ('$name','$number','$age','$userId','$staff')";
        if (mysqli_query($con, $query))
        {
            printf('<script>alert("Patient Added Sucessfully!")</script>');
        }
        else 
        {
            printf('<script>alert("Submission failed!")</script>');
        }
    }
    
?>