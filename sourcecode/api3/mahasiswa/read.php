<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../config/database.php';
include_once '../objects/mahasiswa.php';
 
// instantiate database and mahasiswa object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$mahasiswa = new Mahasiswa($db);

$stmt = $mahasiswa->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // mahasiswa array
    $mahasiswa_arr=array();
    $mahasiswa_arr["records"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
 
        $mahasiswa_item=array(
            "nim" => $nim,
            "nama" => $nama,
            "prodi" => $prodi,
            "alamat" => $alamat,
        );
 
        array_push($mahasiswa_arr["records"], $mahasiswa_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show address data in json format
    echo json_encode($mahasiswa_arr);
}