<?php
include_once "conn.php";
if(isset($_SESSION['islogin'])){
  $id=isset($_GET['id'])?$_GET['id']:'';
  $song=isset($_GET['song'])?$_GET['song']:'';
  $singer=isset($_GET['singer'])?$_GET['singer']:'';
  if($song!='' and $singer!=''){
    $update=$db->exec("update music set song='$song',singer='$singer' where id=$id");
  if($update){
    echo '修改成功！一共修改了',$update,'条记录';
  }else{echo '修改失败';}
    
  
  }else{
    echo json_encode([
      'code' => 0,
      'msg' => '输入歌名/输入歌手',
    ]);
  }; 
  
  
}else{
  echo '未登录';
}
