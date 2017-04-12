<!DOCTYPE html>
<html lang="en">
<head>
		<?php foreach ($css_files as $css): ?>
			<link rel="stylesheet" href="<?php echo $css ?>" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<?php endforeach; ?>
		<link href="<?php echo base_url(); ?>assets/css/backend.css" rel="stylesheet">
		<?php foreach ($js_files as $js): ?>
			<script type="text/javascript" charset="utf-8" src="<?php echo $js; ?>"></script>
		<?php endforeach; ?>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>assets/js/backend.js"></script>
	</head>
	<body id="" onload="">
		<div>
			<?php $this->load->view('back_menu') ?>
	  		<?php echo $output; ?>
		</div>
	</body>
</html>