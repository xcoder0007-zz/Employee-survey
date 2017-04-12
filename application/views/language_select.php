<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('header'); ?>
</head>
<body>

<div id="envelope">
    <a class="exit-link" href="/auth/logout">Logout</a>
</div>
<div id="wrapper">
<div class="header-logo">
	<img src="/assets/uploads/logos/<?php echo $restaurant['logo'] ?>">
	<span><?php echo $restaurant['name'] ?> Survey </span>
	<div id="date">Date: <?php echo date("d-m-Y") ?></div>
	<div class="count">Count: <?php echo $restaurant['count'] ?></div>
</div>
	<div id="page-wrapper">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<?php foreach ($languages as $language): ?>
			<div class="flag-container">
				<legend><?php echo $language['name'] ?></legend>

				<form action="" method="POST" id="form-submit" class="form-div span12" accept-charset="utf-8" enctype="multipart/form-data">
					    	<input type="hidden" name="language" value="<?php echo $language['id'] ?>">
					    	<input name="submit" value=" " type="submit" class="btn btn-flag" style="background-image: url('/assets/flags/<?php echo $language['name'] ?>.gif')"></input>
				</form>
			</div>

		<?php endforeach ?>
		</div>
	</div>
	</div>
</div>
</body>
</html>
