<?php session_start(); ?>
<?php 
if (isset($_SESSION['login_user_email']) && !empty($_SESSION['login_user_email'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cadre | Village Panchayat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <?php include('includes/dependencies.php'); ?>
    <style>
        body {
            background-color: white;
            margin: 0;
            padding: 0;
            /*display: flex;*/
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

       
.btn-primary:disabled,
.btn-primary[disabled] {
    background-color: #e0e0e0; 
    border-color: #e0e0e0;    
    color: #a0a0a0;          
    cursor: not-allowed;      
    pointer-events: none;     
}
        
    </style>
</head>
<body ng-app="myApp" ng-controller="myCtrl">
<?php include('includes/navbar.php'); ?>
<?php include('village_panchayat_db_connect/village_panchayat_db_connect.php'); ?>

<div class="container">
<br /><br /><br /><br /><br /><br />
<!--
<h6>Logged in as: <b><font color="maroon"><?php echo "Election User"; //echo $_SESSION['login_user_email']; ?></font></b></h6>
<h6>Role: <b><font color="green"><?php echo "Election User"; //echo $_SESSION['login_user_role']; ?></font></b></h6>
<hr>
    -->
<h2><u>Add Cadre</u></h2>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="village_panchayat.php">Village Panchayat List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Cadre</li>
  </ol>
</nav>
<!--
<h5>Year: <b><font color="#f9a114">2021 </font></b><br />
    State: <b><font color="#f9a114">Tamil Nadu </font></b><br />
    Election Type: <b><font color="#f9a114">MLA </font></b>
</h5>
-->
<hr>

<?php


$village_code = $_GET['village_code'];
if($village_code == "") { echo "<script>location.href='village_panchayat.php'</script>"; }
//echo "Village Code: " . htmlspecialchars($village_code);
//echo $village_code;


?>

<div style="overflow-x:auto;">
	  <table border='1' cellspacing='10' cellpadding='20p'>
      <tr>
            <th>District Code</th>
            <th>District Name</th>
            <th>Block Code</th>
            <th>Block Name</th>
            <th>Village Code</th>
            <th>Village Name</th>
            
        </tr>

      <?php

$sql = "SELECT * FROM list_of_village_pancahayat_csv WHERE lgd_village_code='$village_code'";
$sql2 = "SELECT Name FROM cadre_details WHERE lgd_village_code='$village_code'";

if($result=$conn->query($sql))
{
if($result->num_rows)
{
while($row=$result->fetch_object())
{
    echo "<tr><td>$row->lgd_district_code</td><td>$row->district_name</td><td>$row->lgd_block_code</td><td>$row->block_name</td><td>$row->lgd_village_code</td><td>$row->village_name</td></tr>";

}
}
}
?>
</table>
</div>

<br>

        <div class="row">
            
            <div class="col-md-8">
<div id="example1" style="background-image: url('images/design2.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
    <!--form action="add_cadre_process.php" method="POST" enctype="multipart/form-data"-->
    <form action="add_cadre_process.php" method="POST">
    <label for="name">Name:</label><br>
    <input type="text" name="name" class="form-control" required><br>

    <input type="hidden" name="lgd_village_code" value="<?php echo $village_code; ?>">

    <label for="relation_type">Relation Type:</label>
    <select id="relation_type" name="relation_type" class="form-control" required>
    <option value="Father">Father</option>
    <option value="Husband">Husband</option>
    </select>
    <br>

    <label for="father_husband_name">Father/Husband Name:</label><br>
    <input type="text" name="father_husband_name" class="form-control" required><br>

    <label for="dob">Date of Birth:</label><br>
    <input type="date" name="dob" class="form-control" required><br>

    <label for="gender">Gender:</label><br>
    <select name="gender" class="form-control" id="gender" required>
    <option value="">Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Others">Others</option>
</select> <br>

    <label for="marital_status">Marital Status:</label><br>
    <select name="marital_status" class="form-control" required>
    <option value="Single">Single</option>
    <option value="Married">Married</option>
    <option value="Divorced">Divorced</option>
    <option value="Widowed">Widowed</option>
    <option value="Separated">Separated</option>
    </select><br>

    <label for="community">Community:</label><br>
    <input type="text" name="community" class="form-control" required><br>

    <label for="caste">Caste:</label><br>
    <select name="caste" class="form-control" required>
    <option value="bc">Backward Class (BC)</option>
    <option value="mbc">Most Backward Class (MBC)</option>
    <option value="sc">Scheduled Caste (SC)</option>
    <option value="st">Scheduled Tribe (ST)</option>
    <option value="oc">Open Category (OC)</option>
    <option value="others">Others</option>
    </select><br>

    <label for="religion">Religion:</label><br>
    <select name="religion" class="form-control" required>
    <option value="Hindu">Hindu</option>
    <option value="Muslim">Muslim</option>
    <option value="Christian">Christian</option>
    <option value="Sikh">Sikh</option>
    <option value="Jain">Jain</option>
    <option value="Buddhist">Buddhist</option>
    <option value="Others">Others</option>
    </select><br>

    <label for="voter">Voter:</label><br>
    <input type="text" name="voter" class="form-control" required><br>

    <label for="aadhaar_id">Aadhaar ID:</label><br>
    <input type="text" name="aadhaar_id" class="form-control" required><br>

    <label for="phone_no">Phone No:</label><br>
    <input type="text" name="phone_no" class="form-control" required><br>

    <label for="mobile_no">Mobile No:</label><br>
    <input type="text" name="mobile_no" class="form-control" required><br>

    <label for="address1">Address 1:</label><br>
    <input type="text" name="address1" class="form-control" required><br>

    <label for="area">Area:</label><br>
    <input type="text" name="area" class="form-control" required><br>

    <label for="city">City:</label><br>
    <input type="text" name="city" class="form-control" required><br>

    <label for="district">District:</label><br>
    <input type="text" name="district" class="form-control" required><br>

    <label for="state">State:</label><br>
    <input type="text" name="state" class="form-control" required><br>

    <label for="pin_code">Pin Code:</label><br>
    <input type="text" name="pin_code" class="form-control" required><br>

    <label for="geo_location">GeoLocation (lat, long):</label><br>
    <input type="text" name="geo_location" class="form-control" required><br>

   

       
        

        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
    </div>
</div>
<div class="col-md-4">
<div id="example1">                
<h4>Existing Cadres</h4>
<ul>
<?php
if($result2 = $conn->query($sql2)) {
    if($result2->num_rows > 0) {
        while($row2 = $result2->fetch_object()) {
            echo "<li>$row2->Name</li>";
        }
    } else {
        echo "<li>No caders added</li>";
    }
} else {
    echo "<li>Error fetching data</li>";
}

?>
</ul>
                
</div>
            </div>
        </div>
   

<br><br><br>



<?php include('includes/dependencies_js.php'); ?>


</body>
</html>

<?php
} else {
    echo "<h3>Redirecting.. Please wait.. </h3>";
    echo "<script>alert('Session expired! Please login to continue.')</script>";
	echo "<script>location.href='index.php'</script>";
}

?>