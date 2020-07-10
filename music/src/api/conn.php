<?php
if (!session_id()) session_start();
header("content-type:application/json;charset=UTF-8");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin:http://localhost:8080');
if(isset($_COOKIE['username'])){ 
  $_SESSION['username']=$_COOKIE['username'];
  $_SESSION['islogin']=1; 
}
if(isset($_SESSION['islogin'])){ 
  $dsn = "mysql:dbname=music;host=localhost";
  $db = new PDO($dsn,'root','990225');
}
