<?php
require('../config/config.php');
$id = $_GET["id"];
$sl_product = "SELECT * FROM tblproduct WHERE id = $id";
$qr_product = mysqli_query($link, $sl_product);
$dt_product = mysqli_fetch_array($qr_product);

if (isset($_POST['edit_product'])) {
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$code = $_POST['code'];
	$type = $_POST['type'];
	$unit = $_POST['unit'];
	$sale = $_POST['sale'];
	
	$uploaddir = '../product-images/';
	$uploadfile = $uploaddir . basename($_FILES['image']['name']);
	
	if(move_uploaded_file($_FILES['image']['tmp_name'],$uploadfile)) {
	
	$image = "product-images/".$_FILES["image"]["name"];
	$str = "UPDATE tblproduct SET name = '$name', code = '$code', image='$image', price = '$price', tproid='$type', unit='$unit', sale ='$sale' WHERE id = $id";
	mysqli_query($link,$str);
		
	} else {
$str = "UPDATE tblproduct SET name = '$name', code = '$code', price = '$price', tproid='$type', unit='$unit', sale ='$sale' WHERE id = $id";
mysqli_query($link,$str);
	}
	echo '<script type="text/javascript">window. location="index.php";</script>';
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Orathai Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">Orathai Shop</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="เพิ่มสินค้า">
            <a class="nav-link" href="index.php">
              <i class="fa fa-fw fa-list"></i>
              <span class="nav-link-text">
                รายการสินค้า
              </span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="เพิ่มสินค้า">
            <a class="nav-link" href="add_product.php">
              <i class="fa fa-fw fa-plus"></i>
              <span class="nav-link-text">
                เพิ่มสินค้า
              </span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-envelope"></i>
              <span class="d-lg-none">Messages
                <span class="badge badge-pill badge-primary">12 New</span>
              </span>
              <span class="new-indicator text-primary d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">12</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">New Messages:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>David Miller</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>Jane Smith</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>John Doe</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all messages
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Alerts
                <span class="badge badge-pill badge-warning">6 New</span>
              </span>
              <span class="new-indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">6</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all alerts
              </a>
            </div>
          </li>
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="content-wrapper">

      <div class="container-fluid">

<!-- Breadcrumbs -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">สินค้า</li>
</ol>
<div class="container">
<form action="" method="post" enctype="multipart/form-data" 
      class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>เพิ่มสินค้าใหม่</legend>
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" 
       for="name">ประเภทสินค้า</label>
<div class="col-md-4">
<select class="form-control" name="type">
<?php
require('../config/config.php');
	$str = "SELECT * FROM typeproduct";
	$rs = mysqli_query($link,$str);
	$num=1;
while ($data = mysqli_fetch_array($rs)) {
?>
<option value="<?php echo $data['tproid'];?>">
<?php echo $data['tproname'];?></option>
<?php } ?>
</select>
<span class="help-block">กรอกรหัสสินค้า</span>
</div>
</div>
<div class="form-group">
     <label class="col-md-4 control-label" for="name">รหัสสินค้า</label>
     <div class="col-md-4">
     <input id="name" name="code" type="text" placeholder="LM520" 
            class="form-control input-md" required="" value="<?php 
			echo $dt_product["code"]; ?>">
     <span class="help-block">กรอกรหัสสินค้า</span>
	 </div>
</div>
<!-- Text input-->
<div class="form-group">
     <label class="col-md-4 control-label" for="name">ชื่อสินค้า</label>
     <div class="col-md-4">
     <input id="name" name="name" type="text" 
            placeholder="Logitech Mouse 520" class="form-control input-md" 
            required="" value="<?php echo $dt_product["name"]; ?>">
     <span class="help-block">กรอกชื่อสินค้า</span>
     </div>
</div>
<!-- Text input-->
     <div class="form-group">
     <label class="col-md-4 control-label" for="name">ราคา</label>
     <div class="col-md-4">
     <input id="name" name="price" type="text" placeholder="1000" 
            class="form-control input-md" required="" value="<?php 
			echo $dt_product["price"]; ?>">
     <span class="help-block">กรอกราคาสินค้าหน่วยบาท</span>
     </div>
</div>
	 <div class="form-group">
     <label class="col-md-4 control-label" for="name">จำนวน</label>
     <div class="col-md-4">
     <input id="name" name="unit" type="text" placeholder="1000" 
            class="form-control input-md" required="" value="<?php 
			echo $dt_product["unit"]; ?>">
              <span class="help-block">กรอกจำนวนสินค้า</span>
     </div>
</div>
	 <div class="form-group">
     <label class="col-md-4 control-label" for="name">ส่วนลด</label>
     <div class="col-md-4">
     <input id="name" name="sale" type="text" placeholder="1000" 
            class="form-control input-md" required="" value="<?php 
			echo $dt_product["sale"]; ?>">
            <span class="help-block">กรอกส่วนลดสินค้า</span>
     </div>
</div>
<!-- Text input-->
     <div class="form-group">
     <label class="col-md-4 control-label" for="name">รู
      ปภาพสินค้า(250 x 300 px)</label>
     <div class="col-md-4">
     <input id="name" name="image" type="file"     
            class="form-control input-md">
     <span class="help-block">เพิ่มรูปภาพ</span>
</div>
</div>
<!-- Button -->
<div class="form-group">
     <label class="col-md-4 control-label" for="submit"></label>
     <div class="col-md-4">
     <button id="submit" name="edit_product" 
             class="btn btn-success">บันทึกสินค้า</button>
     </div>
</div>
</fieldset>
</form>
</div>
</div>
<!-- /.container-fluid -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; TOP SHOP 2017</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
