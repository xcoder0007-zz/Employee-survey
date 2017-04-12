<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('header'); ?>
<style type="text/css">
	@media print{@page {size: landscape}}
</style>
</head>
<body>
  <div id="envelope">
  	<a class="back-link" href="/reports">Back</a>
    <a class="exit-link" href="/auth/logout">Exit</a>
  </div>
<div id="wrapper">
	<div id="page-wrapper">
	<div class="container">
		<div class="rest-selector col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<fieldset>
			<legend class="title-table">Count report  ( <?php echo $meal[0]->name; ?> )</legend>
			<?php $this->load->view('con_mtd_form'); ?>
			</fieldset>
		</div>
		
		<?php if (!isset($posting)): ?>
			<table class="report-view cellular smallfont">
			<thead>
				<tr>
					<th>Hotel</th>
					<th>Restaurant</th>
					<?php for ($i=1; $i <= $month_days; $i++) : ?>
						<th class="count"><?php echo $i; ?></th>
					<?php endfor; ?>
					<th class="count">T</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($scores as $code => $hotel): ?>
					<?php foreach ($hotel as $restaurant_name => $restaurant): ?>
						<tr>
							<td class="even-smaller"><?php echo $code ?></td>
							<td class="even-smaller"><?php echo $restaurant_name ?></td>
							<?php foreach ($restaurant as $day): ?>
								<?php
								$colored = "";
								 if ($day <= 3) {
									$colored = "red";
								} ?>
								<td class="count <?php echo $colored; ?>"><?php echo $day ?></td>
							<?php endforeach ?>
						</tr>
					<?php endforeach ?>
						<tr class="total">
							<td class="even-smaller"><?php echo $code ?></td>
							<td class="even-smaller">Total</td>
							<?php foreach ($totals[$code] as $total): ?>
								<td class="count"><?php echo $total ?></td>
							<?php endforeach ?>
						</tr>
				<?php endforeach ?>
					<tr class="total">
						<td colspan="2">Grand Total</td>
						<?php foreach ($g_totals as $g_total): ?>
							<td class="count"><?php echo $g_total ?></td>
						<?php endforeach ?>
					</tr>
			</tbody>
			</table>
		<?php endif ?>
	</div>
	</div>
</div>
</body>
</html>
