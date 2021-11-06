<script language="javascript">
function closewin() {
	window.opener.location.reload();
}
	#close = closewin();
</script>
<?php
require('../config/config.php');
if(isset($_GET['id'])) {
	
	$sql = "DELETE FROM tblproduct WHERE id = '$_GET[id]'";
	mysqli_query($link,$sql) or die(mysqli_error($link));
	@unlink("../product-images/".$_GET['id'].".".'jpg');
	echo "<script>";
	echo "alert('ลบข้อมูลแล้ว!');";
	echo "window.location='index.php'";
	echo "</script>";
}
mysqli_close($link);
?>