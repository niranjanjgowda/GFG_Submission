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
                <test alt="usericon"><a href="userlogin.html">Logout</a></test>
            </a>
        </nav>

        <?php
            $Aadhar_no = $_POST['Aadhar_number'];
            $con=mysqli_connect("Google_SQL_ID","USERNAME","PASSWORD");
            if(!($con))
            {
                die("error in connecting to DB");
            }

            $db=mysqli_select_db($con,"test");
            $query="select * from Patient,Doctor,Hospital,Disease where Patient.hos_id=Hospital.Hospital_id and Patient.doc_id=Doctor.Doctor_id and Patient.dis_id=Disease.Disease_id and Aaddhar_no='$Aadhar_no'";
            $result=mysqli_query($con,$query);
            $rows=mysqli_num_rows($result);
            if($rows)
            {
                for($row=1;$row<=$rows;$row++)
                {
                    $rowv=mysqli_fetch_array($result,MYSQLI_ASSOC); 
                    if($row==1){
                        echo "<div class=\"basicdetails card\">
                    <label>Name : </label>
                    <p>".$rowv['Patient_name']."</p>
                    <label>Aadhar number : </label>
                    <p>".$rowv['Aaddhar_no']."</p>
                    <label>Age : </label>
                    <p>".$rowv['age']."</p>
                    <label>Blood Group : </label>
                    <p>".$rowv['blood_group']."</p></div>";
                    echo "<div class=\"detailstable card\"> <table><tr><th>Hospital_name</th><th>Doctor_name</th><th>Disease_name</th><th>Cause</th></tr>";
                    }  
                    echo "<td>".$rowv['Hospital_name']."</td>";
                    echo "<td>".$rowv['Doctor_name']."</td>";
                    echo "<td>".$rowv['Disease_name']."</td>";
                    echo "<td>".$rowv['Cause']."</td></tr>";
                }
                echo "</table></div>";
            }
            else{
                echo "there are no patients available in the database";
            }
            mysqli_close($con);
        ?>
    </section>
</body>
</html>