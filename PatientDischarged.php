<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboardUser.css"/>
    <title>Dashboard</title>
</head>
<body>
    <section class="main">
        <nav>
            <a href="index.html" class="logo">
                <img src="assets/logo.png" alt="logo"/>
            </a>
            <a href="#" class="usericon">
                <test alt="usericon"><a href="hospitallogin.html">Logout</a></test>
            </a>
        </nav>
        <?php
        $pa_id = $_POST["patient_id"];
        $con=mysqli_connect("34.131.230.83","root","admin@123");
        if(!($con))
        {
            die("error in connecting to DB");
        }
        $db=mysqli_select_db($con,"test");
        mysqli_query($con,"update Patient set Status='Discharged' where Patient_id=$pa_id");
        ?>
        <div style="position: absolute;top:50%;width: 50%; transform: translate(39%,-200%) ;"class="basicdetails card">
            <label>Patient Discharged Sucessfully</label>
        </div>
    </section>
</body>
</html>