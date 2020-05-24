<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="" type="image/gif" sizes="16x16">
	<title>Vision Solution</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- AdminLTE Skins -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<!-- Google Font -->
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script>var base_url = '<?php echo site_url() ?>';</script>
</head>
<body class="fixed sidebar-mini sidebar-mini-expand-feature skin-purple" style="height: auto; min-height: 100%;" onload="startTime()">
<!-- Site wrapper -->
<div class="wrapper">

	<!-- ================== Start Header ============================= -->
	<header class="main-header fixed">
		<!-- Logo -->
		<a href=""
		   class="logo">
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>VISION</b>solution</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li>
						<p class="navbar-text" style="color: #fff;" href="#" id="datetime"></p>
					</li>
					<li>
						<a href=""> <i class="fa fa-user-circle"
									   style="margin-right: 3px; vertical-align: bottom; font-size: 18px;"></i><?php echo $this->session->userdata('name')  ?> </a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#logout_modal"><i class="fa fa-sign-out"></i>
							Logout</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- ================== End Header ============================= -->

	<!-- ================== Start Side Bar ============================ -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<ul class="sidebar-menu">
				<li>
					<a href="<?php echo base_url(); ?>dashboard">
						<i class="fa fa-tachometer"></i> &nbsp;&nbsp;<span>Dashboard</span>
						<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
				</li>
				<li>

					<a href="<?php echo base_url(); ?>users/users">
						<i class="fa fa-users"></i> &nbsp;&nbsp;<span>Users</span>
						<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>doctors/doctors">
						<i class="fa fa-user-md"></i> &nbsp;&nbsp;<span>Doctors</span>
						<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>patients/patients">
						<i class="fa fa-user-circle-o"></i> &nbsp;&nbsp;<span>Patients</span>
						<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
				</li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
	<!-- ================== End Side Bar =========================== -->

	<!-- ================== Start content =========================== -->
	<div class="content-wrapper">
