<?php

$generalContractor = $_POST["generalContractorName"];
$projectName = $_POST["projectName"];
$address =$_POST["address"];
$city=$_POST["city"];
$state=$_POST["state"];
$zip=  filter_input(INPUT_POST, "zip", FILTER_VALIDATE_INT);

$numberOfFloors = filter_input(INPUT_POST, "numberOfFloors", FILTER_VALIDATE_INT);
$numberOfUnitsPerFloor = filter_input(INPUT_POST, "numberOfUnitsPerFloor", FILTER_VALIDATE_INT);
$sameAppliances = $_POST["sameAppliances"];
$brands =$_POST["brands"];



if ( ! $sameAppliances) {
    die("For prototype purposes 'do units have the same appliances per unit?' needs to be checked yes" );
}   

$host = "localhost";
$dbname = "takeoff_db";
$username = "root";
$password = "";


$conn = mysqli_connect( $host,
                        $username,
                       $password,
                        $dbname);
            
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           

$sql = "INSERT INTO project_tbl (General_Contractor, Project_Name, Address, City,State,Zip,Number_Of_Floors,Number_Of_Units_Per_Floor,Same_Appliances,brand)
        VALUES (?, ?, ?, ?,?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssssiiiss",
                    $generalContractor,
                    $projectName,
                    $address,
                    $city,
                    $state,
                    $zip,
                    $numberOfFloors,
                    $numberOfUnitsPerFloor,
                    $sameAppliances,
                    $brands
                 );

mysqli_stmt_execute($stmt);



#executing python script command
$output = exec("C:/wamp64/www/takeoff/scraper.py 2>&1");

#redirecting to another html page
header("Location: output.php");
#killing php program
die();

?>
