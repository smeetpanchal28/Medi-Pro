<head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="Himanshu Thakkar" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.png">
	<!-- App css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style_dark.css" rel="stylesheet" type="text/css" />
	<?php
	if($page=="student" || $page == "branch" || $page == "subject" || $page=="semester"
	|| $page == "batch"){
		?>
		<!--SWEET ALERT CSS-->
		<link rel="stylesheet" href="plugins/sweet-alert/sweetalert2.min.css">
		<link rel="stylesheet" href="plugins/jquery-toastr/jquery.toast.min.css">
	<?php
	}
	?>
	<script src="assets/js/modernizr.min.js"></script>

</head>