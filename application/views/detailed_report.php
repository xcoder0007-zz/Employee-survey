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
			<legend class="title-table">Detailed report  ( <?php echo $meal[0]->name; ?> )</legend>
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
					<th>Question 1</th>
					<th>Question 2</th>
					<th>Question 3</th>
					<th>Question 4</th>
					<th>Question 5</th>
					<th>Uploads</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($records as $key => $record): ?>
				<tr>
					<td class="searchable"><?php echo $record['room'] ?></td>
					<td><?php echo $record['country_name'] ?></td>
					<?php $offer_score = ((abs($record['offer']-6))/5)*100;
					if ($offer_score >= 80) {
						$offer_class = "green";
					} elseif ($offer_score >= 70) {
						$offer_class = "yellow";
					} else {
						$offer_class = "red";
					} ?>
					<td><span class="<?php echo $offer_class ?>"><i></i><?php echo $offer_score ?> %</span></td>

					<?php $dishes_score = ((abs($record['dishes']-6))/5)*100;
					if ($dishes_score >= 80) {
						$dishes_class = "green";
					} elseif ($dishes_score >= 70) {
						$dishes_class = "yellow";
					} else {
						$dishes_class = "red";
					} ?>
					<td><span class="<?php echo $dishes_class ?>"><i></i><?php echo $dishes_score ?> %</span></td>

					<?php $service_score = ((abs($record['service']-6))/5)*100;
					if ($service_score >= 80) {
						$service_class = "green";
					} elseif ($service_score >= 70) {
						$service_class = "yellow";
					} else {
						$service_class = "red";
					} ?>
					<td><span class="<?php echo $service_class ?>"><i></i><?php echo $service_score ?> %</span></td>

					<?php $atmosphere_score = ((abs($record['atmosphere']-6))/5)*100;
					if ($atmosphere_score >= 80) {
						$atmosphere_class = "green";
					} elseif ($atmosphere_score >= 70) {
						$atmosphere_class = "yellow";
					} else {
						$atmosphere_class = "red";
					} ?>
					<td><span class="<?php echo $atmosphere_class ?>"><i></i><?php echo $atmosphere_score ?> %</span></td>

					<?php $drinks_score = ((abs($record['drinks']-6))/5)*100;
					if ($drinks_score >= 80) {
						$drinks_class = "green";
					} elseif ($drinks_score >= 70) {
						$drinks_class = "yellow";
					} else {
						$drinks_class = "red";
					} ?>
					<td><span class="<?php echo $drinks_class ?>"><i></i><?php echo $drinks_score ?> %</span></td>

					<td ><?php echo($record['picture'])? "<a class='noprint' href='".base_url()."assets/uploads/files/".$record['picture']."'><img class='media-img' src='".base_url()."assets/media.png' /></a>" : "None" ?></td>
				</tr>
				<tr>
					<td colspan="8">
						<div class="row-end">

							<div class="lbl">Comments:</div>
							<div class="goes-left"><?php echo $record['comments'] ?></div>
							<div class="needsadate">Date: <?php echo substr($record['date'], 5, 5) ?></div>
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
