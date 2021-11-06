<?php
class DBController {
	// กำหนดค่าต่างๆสำหรับการเชื่อมต่อฐานข้อมูล
	private $host = "localhost";
	private $user = "root";
	private $password = "18054218";
	private $database = "web";
	private $conn;

	// เริ่มต้นโหลดไฟล์ให้เรียกฟังชั่นเชื่อมต่อฐานข้อมูล
	function __construct() {
		$this->conn = $this->connectDB();
	}

	// ฟังชั่นสำหรับการเชื่อมต่อฐานข้อมูล
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	// ฟังชั่นสำหรับการคิวรี่ข้อมูล
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	// ฟังชั่นสำหรับการนับจำนวนแถว
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}
?>
