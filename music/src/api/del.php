<?php
include_once "conn.php";
if(isset($_SESSION['islogin'])){
$id=isset($_GET['id'])?$_GET['id']:'';
$del=$db->exec("delete from music where ID=$id");
if($del){
  echo '删除成功！一共删除了',$del,'条记录';
}else{
  echo '删除失败';
}; 
echo json_encode(['id'=>$id,]);
}else{
  echo '未登录';
}

?>