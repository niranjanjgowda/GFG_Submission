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
                <test alt="usericon"><a href="do.html">Logout</a></test>
            </a>
        </nav>
        <?php
    $con=mysqli_connect("34.131.230.83","root","admin@123");
    if(!($con))
    {
        die("error in connecting to DB");
    }
    $id = $_POST['username'];
    $db=mysqli_select_db($con,"test");
      $query="select * from Patient,Doctor,Hospital,Disease where Patient.hos_id=Hospital.Hospital_id and Patient.doc_id=Doctor.Doctor_id and Patient.dis_id=Disease.Disease_id and Doctor_id='$id'";
      $result=mysqli_query($con,$query);
      $rows=mysqli_num_rows($result);
      if($rows)
      {
      for($row=1;$row<=$rows;$row++)
      {
        $rowv=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($row==1){
            echo "<div class=\"basicdetails card\">
        <label>Doctor : </label>
        <p>".$rowv['Doctor_name']."</p>
        <label>Works at : </label>
        <p>".$rowv['Hospital_name']."</p></div>";
        echo "<div class=\"detailstable card\"> <table><tr><th>Patient_name</th><th>sex</th><th>age</th><th>blood_group</th><th>Disease_name</th></tr>";
        }  
        echo "<td>".$rowv['Patient_name']."</td>";
        echo "<td>".$rowv['sex']."</td>";
        echo "<td>".$rowv['age']."</td>";
        echo "<td>".$rowv['blood_group']."</td>";         
        echo "<td>".$rowv['Disease_name']."</td></tr>";
      }
      echo "</table></div>";
      }
      else{
      echo "there are no patients available in the database";
      }
    mysqli_close($con);
?>
    <!--Doctor search want to implement but not enough patients-->
    <!--form action="http://localhost/GFG-with-f/dashboardDoctor.php" method="post">
        <label>Search Patient:</label>
        <input type="text" placeholder="Enter Aadhaar number"/>
        <button type="submit">Search</button>
    </form-->


    </section>
</body>
</html>