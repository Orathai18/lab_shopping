<script language="javascript">

	Function closewin(){
		window.opener.location.reload();
	}
	
	$close = closewin();

</script>

<?php
session_start();
require('config/config.php');
$orderid = $_SESSION["Orders"];
$name1 = $_POST["name1"];
$name2 = $_POST["name2"];
$tel = $_POST["tel"];
$address = $_POST["address"];
$muser = $_COOKIE["muser"];

if(isset($_POST['orderok'])){
	if(isset($_SESSION["cart_item"])){
		$item_total = 0;
	foreach ($_SESSION["cart_item"] as $item){
		$item_total +=($item["price"]*$item["quantity"]);
		$pricetotal = $item_total +($item_total*0.07);
		$procode = $item["code"];
		$unit = $item["quantity"];
		$sqlin = "INSERT INTO orderproduct (id, ordersid, procode, unit, price)  VALUES('','$orderid','$procode','$unit','$item_total')";
		mysqli_query($link, $sqlin) or die (mysqli_error($link));
		$sqlup = "UPDATE tblproduct SET unit=(unit-$unit) WHERE code ='$procode'";
		mysqli_query($link, $sqlup) or die(mysqli_error($link));
		
	}
	}
	$sql = "INSERT INTO `orders` (`ordersid`, `pricetal`, `tel`, `address`, `fname`, `lname`, `muser`) VALUES ('$orderid', '$pricetotal', '$tel', '$address', '$name1', '$name2', '$muser');";
	mysqli_query($link, $sql) or die (mysqli_error($link));
	unset($_SESSION["cart_item"]);
	unset($_SESSION["Orders"]);
	echo "<script>";
	echo "alert('ชำระเงินแล้วกำลังจัดส่งสินค้า');";
	echo "window.location='index.php'";
	echo "</script>";
	
}
	mysqli_close($link);
?>