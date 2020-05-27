<?php
class Install{
	public function server(){
		$host_db = $_POST['host'];
		$user_db = $_POST['user'];
		$pass_db = $_POST['password'];
		$db1 = $_POST['database1'];
		$db2 = $_POST['database2'];

		$content = '[';
		$content .= '{"host_db":"'.$host_db.'"},';
		$content .= '{"user_db":"'.$user_db.'"},';
		$content .= '{"pass_db":"'.$pass_db.'"},';
		$content .= '{"db1":"'.$db1.'"},';
		$content .= '{"db2":"'.$db2.'"}';

		$content .= "]";

		$fp = fopen("../database.txt","wb");
		fwrite($fp,$content);
		fclose($fp);
	}
}

?>
