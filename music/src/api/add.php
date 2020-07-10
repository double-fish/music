<?php
include_once "conn.php";
if(isset($_SESSION['islogin'])){ 
$song=isset($_GET['song'])?$_GET['song']:'';
$singer=isset($_GET['singer'])?$_GET['singer']:'';
$filename=isset($_GET['filename'])?$_GET['filename']:'';
$url='api/uploadmusic/'.$filename;
if($song!='' and $singer!='' and $filename!=''){
  $add=$db->exec("insert into music(song,singer,url) values('$song','$singer','$url')");
if($add){
  echo '添加成功！一共添加了',$add,'条记录';
}else{
  echo '添加失败';
}
}else{
	echo json_encode([
    'code' => 0,
    'msg' => '请上传音乐/输入歌名/输入歌手',
  ]);
}


}else{
  echo '未登录';
}
