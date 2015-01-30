<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>FTPlus</title>
	<script src="<?php echo base_url('js/jquery-2.1.3.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
	<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('css/cssload.css'); ?>">
	<?php if ($pagina): ?>
		<link rel="stylesheet" href="<?php echo base_url("css/{$pagina}.css"); ?>">
	<?php endif ?>
</head>
<body>