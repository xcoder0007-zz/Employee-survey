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

<div class="masked inner-container">
	<h1 class="head-title">Welcome To Restaurant Survey</h1>

</div>
<div id="date">Date: <?php echo date("d-m-Y") ?></div>
      <br />
	<div id="page-wrapper">
	<div class="container">
		<div class="rest-selector col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<fieldset>
			<legend class="title-table">Select Restaurant</legend>

			<form action="" method="POST" id="form-submit" class="form-div span12" accept-charset="utf-8" enctype="multipart/form-data">

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
							<select class="form-control" name="hotel" id="hotel">
								<option value="">Select Hotel</option>
								<?php foreach ($hotels as $hotel): ?>
									<option value="<?php echo $hotel['id'] ?>"><?php echo $hotel['name']; ?></option>
								<?php endforeach ?>
							</select>
						</div>					
				</div>
				
				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
							<select class="form-control" name="restaurant" id="restaurant">
								<option value="">Select Restaurant</option>
								<?php foreach ($restaurants as $restaurant): ?>
									<option data-hotel="<?php echo $restaurant['hotel_id'] ?>" value="<?php echo $restaurant['id'] ?>"><?php echo $restaurant['name']; ?></option>
								<?php endforeach ?>
							</select>
						</div>					
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
							<select class="form-control" name="meal" id="meal">
								<option value="">Select meal</option>
								<?php foreach ($meals as $meal): ?>
									<option data-hotel="<?php echo $meal['hotel_id'] ?>" value="<?php echo $meal['id'] ?>"><?php echo $meal['name']; ?></option>
								<?php endforeach ?>
							</select>
						</div>					
				</div>
				
				<div class="form-group">
				    <div class="col-lg-offset-3 col-lg-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
				    	<input name="submit" value="Submit" type="submit" class="btn btn-success"></input>
				    </div>
				</div>

			</form>
			</fieldset>
		</div>
	</div>
	</div>
</div>
</body>
</html>
