<?php session_start(); ?>
<?php 
if (isset($_SESSION['login_user_email']) && !empty($_SESSION['login_user_email'])) {


    include('village_panchayat_db_connect/village_panchayat_db_connect.php');
    
$name = $_POST["name"];
$relation_type = $_POST["relation_type"];
$lgd_village_code = $_POST["lgd_village_code"];
$father_husband_name = $_POST["father_husband_name"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$marital_status = $_POST["marital_status"];
$community = $_POST["community"];
$caste = $_POST["caste"];
$religion = $_POST["religion"];
$voter = $_POST["voter"];
$aadhaar_id = $_POST["aadhaar_id"];
$phone_no = $_POST["phone_no"];
$mobile_no = $_POST["mobile_no"];
$address1 = $_POST["address1"];
$area = $_POST["area"];
$city = $_POST["city"];
$district = $_POST["district"];
$state = $_POST["state"];
$pin_code = $_POST["pin_code"];
$geo_location = $_POST["geo_location"];
$cadre_id = uniqid();

$sql = "INSERT INTO cadre_details (cadre_id, lgd_village_code, Name, relation_type, Father_Husband_Name, DOB, Gender, Marital_Status, Community, Caste, Religion, Voter, Aadhaar_ID, Phone_No, Mobile_No, Address1, Area, City, District, State, Pin_Code, GeoLocation) 
VALUES ('$cadre_id', '$lgd_village_code', '$name', '$relation_type', '$father_husband_name', '$dob', '$gender', '$marital_status', '$community', '$caste', '$religion', '$voter', '$aadhaar_id', '$phone_no', '$mobile_no', '$address1', '$area', '$city', '$district', '$state', '$pin_code', '$geo_location')";

//echo $sql;
if($conn->query($sql) === TRUE)
		{
            echo "<h3>Redirecting.. Please wait.. </h3>";
            echo "<script>alert('Cadre added successfully')</script>";
            echo "<script>location.href='village_panchayat.php'</script>";
        } else {
            echo "<h3>Redirecting.. Please wait.. </h3>";
            echo "<script>alert('Oops! Something went wrong. We are unable to process your request at the moment!. Please contact the admin')</script>";
            echo "<script>location.href='village_panchayat.php'</script>";
        }

 include('includes/dependencies_js.php'); ?>

<?php
} else {
    echo "<h3>Redirecting.. Please wait.. </h3>";
    echo "<script>alert('Session expired! Please login to continue.')</script>";
	echo "<script>location.href='index.php'</script>";
}

?>