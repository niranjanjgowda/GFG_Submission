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
            $a = $_POST['Aa_no'];
            $b = $_POST['Pa_no'];
            $c = $_POST['sex'];
            $d = $_POST['age'];
            $e = $_POST['bg'];
            $f = $_POST['hos_id'];
            $g = $_POST['dis_id'];
            $h = $_POST['doc_id'];
            $con=mysqli_connect("Google_SQL_ID","USERNAME","PASSWORD");
            if(!($con))
            {
                die("error in connecting to DB");
            }
            $db=mysqli_select_db($con,"test");
            mysqli_query($con,"INSERT INTO Patient (Aaddhar_no,Patient_name,sex,age,blood_group,hos_id,doc_id,dis_id,Status)VALUES('$a','$b','$c',$d,'$e',$f,$g,$h,'Active');");
        ?>

        <div style="position: absolute;top:50%;width: 50%; transform: translate(39%,-200%) ;"class="basicdetails card">
            <label>Patient Admitted Sucessfully</label>
        </div>
    </section>
</body>
</html>