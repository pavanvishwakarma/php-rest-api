<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$product_name = $data['product_name'];
$requirement = $data['requirement'];
$units = $data['units'];
$remark = $data['remark'];
$party_name = $data['party_name'];
$company_name = $data['company_name'];
$phone = $data['phone'];
$email = $data['email'];
$location = $data['location'];
$country = $data['country'];
$state = $data['state'];
$city = $data['city'];


// $name = $_POST['name'];
// $age = $_POST['age'];
// $city = $_POST['city'];

include "config.php";
$sql = "INSERT INTO gla_well_inquiry(product_name, requirement, units, remark, party_name, company_name, phone, email, location, country, state, city) VALUES ('{$product_name}', '{$requirement}', '{$units}', '{$remark}', '{$party_name}', '{$company_name}', '{$phone}', '{$email}', '{$location}', '{$country}', '{$state}', '{$city}')";

if(mysqli_query($conn, $sql)){
	echo json_encode(array('message' => 'Student Record Inserted.', 'status' => true));

}else{

 echo json_encode(array('message' => 'Student Record Not Insert.', 'status' => false));

}
?>
