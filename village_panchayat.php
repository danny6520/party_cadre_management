<?php session_start(); ?>
<?php 
if (isset($_SESSION['login_user_email']) && !empty($_SESSION['login_user_email'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village Panchayat List</title>
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
<h2><u>Village Panchayat List</u></h2>
<!--
<h5>Year: <b><font color="#f9a114">2021 </font></b><br />
    State: <b><font color="#f9a114">Tamil Nadu </font></b><br />
    Election Type: <b><font color="#f9a114">MLA </font></b>
</h5>
-->
<hr>

<?php

        
        
        $sql = "SELECT * FROM list_of_village_pancahayat_csv";
        
        $result = $conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        ?>
        <div style="overflow-x:auto;">
	  <table border='1' cellspacing='10' cellpadding='20p'>
      <tr>
            <th><input type="text" class="form-control" ng-model="search.lgd_district_code" placeholder="Search District Code"></th>
            <th><input type="text" class="form-control" ng-model="search.district_name" placeholder="Search District Name"></th>
            <th><input type="text" class="form-control" ng-model="search.lgd_block_code" placeholder="Search Block Code"></th>
            <th><input type="text" class="form-control" ng-model="search.block_name" placeholder="Search Block Name"></th>
            <th><input type="text" class="form-control" ng-model="search.lgd_village_code" placeholder="Search Village Code"></th>
            <th><input type="text" class="form-control" ng-model="search.village_name" placeholder="Search Village Name"></th>
            <!--th><input type="text" class="form-control" ng-model="search.assembly_constituency_name" placeholder="Search Assembly Constituency"></th>
            <th></th>
            <th></th-->
            <th></th>
        </tr>
       
        <tr>
            <th>District Code</th>
            <th>District Name</th>
            <th>Block Code</th>
            <th>Block Name</th>
            <th>Village Code</th>
            <th>Village Name</th>
            <!--th>District Number</th>
            <th>Assembly Constituency file Download</th>
            <th>Polling station file Download</th-->
            <th>Add/View Cadre</th>
            
        </tr>
   
        <tr ng-repeat="row in filteredUsers = (rows | filter:search) | startFrom:(currentPage-1)*pageSize | limitTo:pageSize">
            <td>{{ row.lgd_district_code }}</td>
            <td>{{ row.district_name }}</td>
            <td>{{ row.lgd_block_code }}</td>
            <td>{{ row.block_name }}</td>
            <td>{{ row.lgd_village_code }}</td>
            <td>{{ row.village_name }}</td>
            <!--td>{{ row.assembly_constituency_name }}</td>
            <td><a href='/constituency_display/constituency_files/{{ row.assembly_constituency_file_name }}' class='btn btn-primary' target='_blank'>Download</a></td>
            <td><a href='/constituency_display/polling_station_files/{{ row.polling_station_file_name }}' class='btn btn-primary' target='_blank'>Download</a></td-->
            <td>
         
            <form action="add_cadre.php" method="GET">
                <button type="submit" name="village_code" class="btn btn-primary" value="{{ row.lgd_village_code }}">
                Add/View Cadre
                </button>
            </form>

            </td>
            </tr>

        </table>
    </div>
    <br>
<div>
    <button ng-disabled="currentPage == 1" ng-click="prevPage()" class="btn btn-primary">Previous</button>
    Page {{currentPage}} of {{numberOfPages()}}
    <button ng-disabled="currentPage == numberOfPages()" ng-click="nextPage()" class="btn btn-primary">Next</button>
</div>
    
</div>
<br><br><br>
<script>
    
    var app = angular.module('myApp', []);

    
    app.filter('startFrom', function() {
        return function(input, start) {
            start = +start; 
            return input.slice(start);
        }
    });

    
    app.controller('myCtrl', function($scope) {
       
        $scope.currentPage = 1;
        $scope.pageSize = 10;

       
        $scope.rows = <?php echo json_encode($data); ?>;

        
        $scope.numberOfPages = function() {
            return Math.ceil($scope.filteredUsers.length / $scope.pageSize);
        };

        
        $scope.prevPage = function() {
            if ($scope.currentPage > 1) {
                $scope.currentPage--;
            }
        };

       
        $scope.nextPage = function() {
            if ($scope.currentPage < $scope.numberOfPages()) {
                $scope.currentPage++;
            }
        };
    });
    </script>
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