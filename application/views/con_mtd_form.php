<form action="" method="POST" id="form-submit" class="form-div span12" accept-charset="utf-8" enctype="multipart/form-data">
	
	<div class="dates form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<label for="month" class="date-lbl col-lg-3 col-md-3 col-sm-3 col-xs-3  control-label">Select month</label>
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