<form action="" method="POST" id="form-submit" class="form-div span12" accept-charset="utf-8" enctype="multipart/form-data">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<select class="form-control" name="hotel" id="hotel">
					<option value="">Select Hotel</option>
					<?php foreach ($hotels as $hotel): ?>
						<option value="<?php echo $hotel['id'] ?>"<?php echo set_select('hotel', $hotel['id']); ?>><?php echo $hotel['name']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<select class="form-control" name="restaurant" id="restaurant">
					<option value="">Select Restaurant</option>
					<?php foreach ($restaurants as $restaurant): ?>
						<option data-hotel="<?php echo $restaurant['hotel_id'] ?>" value="<?php echo $restaurant['id'] ?>"<?php echo set_select('restaurant', $restaurant['id']); ?>><?php echo $restaurant['name']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
	</div>
	
	<div class="dates form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<label for="month" class="date-lbl col-lg-3 col-md-3 col-sm-3 col-xs-3  control-label">Select Month</label>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<input type="text" class="form-control datemonth" name="month" id="month" data-date-format="YYYY-MM" value="<?php echo set_value('month'); ?>"></input>
			</div>
		</div>
	</div>
	
	<div class="noprint form-group">
	    <div class="col-lg-offset-3 col-lg-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
	    	<input name="submit" value="Submit" type="submit" class="btn btn-success"></input>
	    </div>
	</div>

</form>