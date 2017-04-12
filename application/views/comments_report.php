<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('header'); ?>
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
			<legend class="title-table">Comments report  ( <?php echo $meal[0]->name; ?> )</legend>
			<?php $this->load->view('report_form'); ?>
			</fieldset>
		</div>
		
		<?php if (!isset($posting)): ?>
			
			<div class="page-breaker summarial col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<table class="report-view rowlial">
			<thead>
				<tr>
					<th>Room N#</th>
					<th>Nationality</th>
					<th>comment</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($records as $key => $record): ?>
				<tr>
					<td class="searchable"><?php echo $record['room'] ?></td>
					<td><?php echo $record['country_name'] ?></td>
					<td class="goes-left"><?php echo $record['comments'] ?></td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="row-end">
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
	<?php endif; ?>
	</div>
	</div>

		</div>
	</div>
</div>
</body>
</html>
