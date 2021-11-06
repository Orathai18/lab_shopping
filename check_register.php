<?php
require('config/config.php');
if (isset($_POST['register'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$chk_usr = "SELECT muser FROM member WHERE muser='$user'";
	$rs = mysqli_query($link,$chk_usr);
	$usr_row = mysqli_num_rows($rs);
	
	if ($usr_row > 0){
		//$usr_row ไม่ใช่ค่าว่างหรือ username มีอยู่แล้วจะทำการแจ้งเตือน
		echo"<script>
			alert('มีชื่อผู้ใช้งานนี้อยู่ในระบบแล้ว!');
			window.history.back();
		</script>";
		
	}else{
		//ถ้าไม่มี username นี้อยู่จะทำการบันทึกข้อมูลให้
		$str = 	"INSERT INTO `member`(`muser`, `mpassword`) VALUES 
		('$user','$pass')";
		mysqli_query($link, $str)or die("sqlsave error");		
		echo	"<script>";
		echo	"alert('สมัครสมาชิกเรียบร้อย');";
		echo	"window.location='login.php';";
		echo	"</script>";
	}
}
?>