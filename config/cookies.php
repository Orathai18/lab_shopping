<meta charset="utf-8">
<?php
if(empty($_COOKIE['status'])){
	echo"<script>
	alert('กรุณาเข้าสู่ระบบ');
	window.location='account.html';
	</script>";
}
if ($_COOKIE['status']!='ADMIN'){
	echo"<script>
	alert('หน้านี้เฉพาะผู้ดูแลเท่านั้น');
	window.location='account.html';
	</script>";
	setcookie('status','',time()-(86400 * 30),"/");
	setcookie('username','',time()-(86400 * 30),"/");
}

?>