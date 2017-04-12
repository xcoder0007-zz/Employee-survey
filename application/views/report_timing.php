<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('header'); ?>
<style type="text/css">
	@media print{@page {size: portrait}}
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
			<legend class="title-table">Surving time report  ( <?php echo $meal[0]->name; ?> )</legend>
			<?php $this->load->view('report_form'); ?>
			</fieldset>
		</div>
		
		<?php if (!isset($posting)): ?>
			<?php foreach ($scores as $key => $score): ?>
			<div class="<?php echo(intval($key) == 0)? "page-breaker" : ""; ?> summarial col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="title-table"><?php echo $score['language'] ?></div>
				<table class="report-view onecell">
				<thead>
					<tr>
						<th>Yes</th>
						<th>No</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span class="green"><i></i><?php echo $score['yes'] ?> %</span></td>
						<td><span class="red"><i></i><?php echo $score['no'] ?> %</span></td>
					</tr>
					<tr>
						<td colspan="2">Total votes: <?php echo $score['count'] ?></td>
					</tr>
				</tbody>
				</table>
			</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
	</div>
</div>
</body>
</html>
