<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$website = $data['website'];
$company_name = $data['company_name'];
$country = implode(",",$data['country']);
$project_type = implode(",",$data['project_type']);
$project_stage = implode(",",$data['project_stage']);
$price = implode(",",$data['price']);
$project_description = $data['project_description'];
$communication = implode(",",$data['communication']);
$upload_file = $data['upload_file'];



include "config.php";
$sql = "INSERT INTO highen_inquiry(name, email, phone, website, company_name, country, project_type, project_stage, price, project_description, communication, upload_file) VALUES ('{$name}', '{$email}', '{$phone}', '{$website}', '{$company_name}', '{$country}', '{$project_type}', '{$project_stage}', '{$price}', '{$project_description}', '{$communication}', '{$upload_file}')";

if(mysqli_query($conn, $sql)){
	// echo json_encode(array('data' => $data, 'status' => true));
	echo json_encode(array('message' => 'Student Record Inserted.', 'data' => $data, 'status' => true));

}else{
// echo json_encode(array('data' => $data, 'status' => false));
 echo json_encode(array('message' => 'Student Record Not Insert.', 'data' => $data, 'status' => false));

}
?>
