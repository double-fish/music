<?php
if (!session_id()) session_start();
	header('Content-Type:application/json; charset=utf-8');
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Allow-Origin:http://localhost:8080');
	$username =  isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	if(	$username!=''&&	$password!='')
	{
		$dsn = "mysql:dbname=music;host=localhost";
		$db = new PDO($dsn,'root','990225');
		if ($db!= null) 
		{
			$result = $db->query("select * from user where username='$username'");
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
		}
	  	 	if($result_array["password"] == $password)
	  	 {
				$_SESSION['username'] = $username;
				$_SESSION['islogin'] = 1; 
				setcookie("username", $username, time() + 24 * 60 * 60);
				setcookie(
					"code",
					md5($username . md5($password)),
					time() + 1 * 24 * 60 * 60
				); 
			setcookie("username", $username, time()-1);
				setcookie(
					"code",
					md5($username . md5($password)),
					time()-1);
			echo json_encode([
				'code' => 1,
				'msg' => '登陆成功'
			]);
		} else {;
			echo json_encode([
				'code' => 0,
				'msg' => '用户名或密码输入错误'
			]);
		}
	}
 else {

	echo json_encode([
		'code' => 0,
		'msg' => '请输入用户名或密码'
	]);
}
