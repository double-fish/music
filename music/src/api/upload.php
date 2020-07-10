
<?php
error_reporting(0);
header("Content-Type: text/html; charset=UTF-8");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin:http://localhost:8080');;
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
// 获取上传文件data
$fileData = $_FILES['fileData'];
// 文件名
$fileName = $fileData['name'];

// 服务器临时文件
$tmp_name = $fileData['tmp_name'];

// 转码为GB2312（防止文件夹名称为中文时乱码）
$fileName = iconv('UTF-8', 'GB2312', $fileName);
// 目标地址
$desUrl = 'uploadmusic/'.$fileName;
// 将服务器上的临时文件移动至指定的目录 (move_uploaded_file函数)
$status = move_uploaded_file($tmp_name, $desUrl);

if ($status === true) {
    // 转码为UTF-8
    $fileName = iconv('GB2312', 'UTF-8', $fileName);
    // 输出语句
    echo json_encode(array('code' => '1', 'msg' => '上传成功！', 'fileName' => $fileName));
} else {
    // 输出语句
    echo json_encode(array('code' => '0', 'msg' => '上传失败！', 'fileName' => ''));
}
