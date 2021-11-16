<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../assets/images/favicon.png" type="image/x-icon" />
	<meta charset="utf-8">
	<title><?=$page_title ?></title>
	

</head>
<body>

	


	<?php $this->load->view('template/header'); ?>
	<?php $this->load->view($view,$data_view); ?>
	<?php $this->load->view('template/footer'); ?>
</body>
</html>