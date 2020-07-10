<?php
header("content-type:application/json;charset=UTF-8");
header('Access-Control-Allow-Origin:http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
$dsn = "mysql:dbname=music;host=localhost";
$db = new PDO($dsn,'root','990225');
$stmt = $db->query("select * from music order by ID desc");
$row=$stmt->fetchAll(PDO::FETCH_ASSOC); 
 echo json_encode([
  'data'=>$row,
  ]);
?>


