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
			<legend class="title-table">MTD per language per hotel  ( <?php echo $meal[0]->name; ?> )</legend>
			<?php $this->load->view('con_mtd_form'); ?>
			</fieldset>
		</div>
		
		<?php if (!isset($posting)): ?>
			<div class="summarial col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="title-table"></div>
				<table class="report-view cellular">
				<thead>
					<tr>
						<th></th>
						<?php foreach ($hotels as $hotel): ?>
							<th><?php echo $hotel['code'] ?></th>
						<?php endforeach ?>

					</tr>
				</thead>
				<tbody>
				<?php foreach ($scores as $key => $score): ?>
					<tr>
						<td><?php echo $key ?></td>
						<?php for ($i=1; $i <= count($hotels) ; $i++): ?> 
							<?php
							$value = $score[$i];
							if ($value >= 80) {
								$score_class = "green";
							} elseif ($value >= 70) {
								$score_class = "yellow";
							} else {
								$score_class = "red";
							} ?>
							<td>
							<?php if ($value || $value === 0): ?>
								<span class="smalli <?php echo $score_class ?>"><i></i><?php echo $value ?> %</span>
							<?php endif; ?>
							</td>
						<?php endfor; ?>
					</tr>
				<?php endforeach; ?>
				</tbody>
				</table>
			</div>
			<pre><?php print_r($scores) ?></pre>
		<?php endif; ?>

		</div>
	</div>
	</div>
</div>
</body>
</html>
