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
        $hos_id = $_POST["user"];
        $con=mysqli_connect("34.131.230.83","root","admin@123");
        if(!($con))
        {
            die("error in connecting to DB");
        }
        $db=mysqli_select_db($con,"test");
        $hospital_name = mysqli_query($con,"select Hospital_name from Hospital where Hospital_id=$hos_id");
        if(mysqli_num_rows($hospital_name)){
        $query="select * from Patient,Doctor,Hospital,Disease where Patient.hos_id=Hospital.Hospital_id and Patient.doc_id=Doctor.Doctor_id and Patient.dis_id=Disease.Disease_id and Hospital_id=$hos_id";
        $result=mysqli_query($con,$query);
        $rows=mysqli_num_rows($result);

        if($rows)
        {      
            for($row=1;$row<=$rows;$row++)
            {
                $rowv=mysqli_fetch_array($result,MYSQLI_ASSOC);
                if($row==1){
                echo " <div class=\"basicdetails card\">";
                echo "<label>Hospital name : ".$rowv['Hospital_name']."</label></div>";
                echo "<div class=\"detailstable card\"> <table><tr><th>Patient_id</th><th>Addhar_no</th><th>Patient_name</th><th>sex</th><th>age</th><th>Blood Group</th><th>Hospital_name</th><th>Doctor_name</th><th>Disease_name</th></tr>";
                }
                echo "<tr><td>".$rowv['Patient_id']."</td>";
                echo "<td>".$rowv['Aaddhar_no']."</td>";
                echo "<td>".$rowv['Patient_name']."</td>";
                echo "<td>".$rowv['sex']."</td>";
                echo "<td>".$rowv['age']."</td>";
                echo "<td>".$rowv['blood_group']."</td>";         
                echo "<td>".$rowv['Doctor_name']."</td>";
                echo "<td>".$rowv['Disease_name']."</td>";
                echo "<td>".$rowv['Status']."</td></tr>";
            }
            echo "</table></div>";
        }
        else{
            echo "there are no patients available in the database";
        }
        }
        else
            echo "Hospital you have selected doesn't exist contact admin to add you hospital";
        mysqli_close($con);
        ?>

        <div class="basicdetails card">
            <form action="http://localhost/GFG-with-f/PatientAdmitted.php" method="POST">
            <label>Admit patient :</label>
            <input type="text" placeholder="Enter Aadhaar number" name="Aa_no"/>
            <input type="text" placeholder="Patient name" name="Pa_no"/>
            <input type="text" placeholder="Gender" name="sex"/>
            <input type="number" placeholder="Age" name="age"/>
            <input type="text" placeholder="blood group" name="bg"/>
            <input type="text" placeholder="Hospital ID" name="hos_id"/>
            <input type="text" placeholder="Disease ID" name="dis_id"/>
            <input type="text" placeholder="Doctor ID" name="doc_id"/>
            <button type="submit">Submit</button>
        </div>

        <div class="basicdetails card">
            <form action="http://localhost/GFG-with-f/PatientDischarged.php" method="POST">
            <label style="display:inline;">Discharge patient :</label>
            <input type="text" name="patient_id" placeholder="Enter Patient number : "/>
            <button type="submit">Submit</button>
            </form>
        </div>

    </section>
</body>
</html>