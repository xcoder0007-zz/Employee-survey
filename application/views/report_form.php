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
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
			<input id="monthly" name="monthly" type="checkbox" class="form-control" <?php echo set_checkbox('monthly', 'on', TRUE); ?> />
			<label for="monthly">Monthly</label>
		</div>
		<div class="month-picker form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<label for="month" class="date-lbl col-lg-3 col-md-3 col-sm-3 col-xs-3  control-label">Select Month</label>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<input type="text" class="form-control datemonth" name="month" id="month" data-date-format="YYYY-MM" value="<?php echo set_value('month'); ?>"></input>
			</div>
		</div>

		<div class="day-picker form-group col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<label for="from" class="date-lbl col-lg-1 col-md-1 col-sm-1 col-xs-1  control-label">From:</label>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<input type="text" class="form-control datetime" name="from" id="from" data-date-format="YYYY-MM-DD" value="<?php echo set_value('from'); ?>"></input>
			</div>

			<label for="to" class="date-lbl col-xs-offset-0 col-lg-1 col-md-1 col-sm-1 col-xs-1  control-label">To:</label>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<input type="text" class="form-control datetime" name="to" id="to" data-date-format="YYYY-MM-DD" value="<?php echo set_value('to'); ?>"></input>
			</div>
		</div>
	</div>
	
	<div class="noprint form-group">
	    <div class="col-lg-offset-3 col-lg-3 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
	    	<input name="submit" value="Submit" type="submit" class="btn btn-success"></input>
	    </div>
	</div>

</form>