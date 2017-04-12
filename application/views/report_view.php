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
			<legend class="title-table">Summary report  ( <?php echo $meal[0]->name; ?> )</legend>
			<?php $this->load->view('report_form'); ?>
			</fieldset>
		</div>
		
		<?php if (!isset($posting)): ?>
			<?php foreach ($scores as $key => $score): ?>
			<div class="<?php echo(intval($key) == 0)? "page-breaker" : ""; ?> summarial col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="title-table"><?php echo $score['language'] ?></div>
			<table class="report-view">
			<thead>
				<tr>
					<th>Question</th>
					<th><?php echo $score['head'][1] ?></th>
					<th><?php echo $score['head'][2] ?></th>
					<th><?php echo $score['head'][3] ?></th>
					<th><?php echo $score['head'][4] ?></th>
					<th><?php echo $score['head'][5] ?></th>
					<th>Total Answers</th>
					<th>Satisfactory by question</th>
					<th>Satisfactory by department</th>
					<th>Satisfactory Overall</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="first"><?php echo $score['offer']['question'] ?></td>
					<td><?php echo $score['offer']['scores'][1] ?></td>
					<td><?php echo $score['offer']['scores'][2] ?></td>
					<td><?php echo $score['offer']['scores'][3] ?></td>
					<td><?php echo $score['offer']['scores'][4] ?></td>
					<td><?php echo $score['offer']['scores'][5] ?></td>
					<td><?php echo $score['offer']['scores']['total'] ?></td>
					<?php
						$q1score = round($score['offer']['scores']['q_satsf'], 2)*100;
						if ($q1score >= 80) {
							$q1class = "green";
						} elseif ($q1score >= 70) {
							$q1class = "yellow";
						} else {
							$q1class = "red";
						}
					 ?>
					<td ><span class="<?php echo $q1class ?>"><i></i><?php echo $q1score ?> %</span></td>
					<?php
						$kitscore = round($score['kit'], 2)*100;
						if ($kitscore >= 80) {
							$kitclass = "green";
						} elseif ($kitscore >= 70) {
							$kitclass = "yellow";
						} else {
							$kitclass = "red";
						}
					 ?>
					<td rowspan="2" >Kitchen:&nbsp;<span class="<?php echo $kitclass ?>"><i></i><?php echo $kitscore ?> %</span></td>
					<?php
						$totscore = round($score['final'], 2)*100;
						if ($totscore >= 80) {
							$totclass = "green";
						} elseif ($totscore >= 70) {
							$totclass = "yellow";
						} else {
							$totclass = "red";
						}
					 ?>
					<td rowspan="5" ><span class="<?php echo $totclass ?>"><i></i><?php echo $totscore ?> %</span></td>
				</tr>
				<tr>
					<td class="first"><?php echo $score['dishes']['question'] ?></td>
					<td><?php echo $score['dishes']['scores'][1] ?></td>
					<td><?php echo $score['dishes']['scores'][2] ?></td>
					<td><?php echo $score['dishes']['scores'][3] ?></td>
					<td><?php echo $score['dishes']['scores'][4] ?></td>
					<td><?php echo $score['dishes']['scores'][5] ?></td>
					<td><?php echo $score['dishes']['scores']['total'] ?></td>
					<?php
						$q2score = round($score['dishes']['scores']['q_satsf'], 2)*100;
						if ($q2score >= 80) {
							$q2class = "green";
						} elseif ($q2score >= 70) {
							$q2class = "yellow";
						} else {
							$q2class = "red";
						}
					 ?>
					<td ><span class="<?php echo $q2class ?>"><i></i><?php echo $q2score ?> %</span></td>
				</tr>
				<tr>
					<td class="first"><?php echo $score['service']['question'] ?></td>
					<td><?php echo $score['service']['scores'][1] ?></td>
					<td><?php echo $score['service']['scores'][2] ?></td>
					<td><?php echo $score['service']['scores'][3] ?></td>
					<td><?php echo $score['service']['scores'][4] ?></td>
					<td><?php echo $score['service']['scores'][5] ?></td>
					<td><?php echo $score['service']['scores']['total'] ?></td>
					<?php
						$q3score = round($score['service']['scores']['q_satsf'], 2)*100;
						if ($q3score >= 80) {
							$q3class = "green";
						} elseif ($q3score >= 70) {
							$q3class = "yellow";
						} else {
							$q3class = "red";
						}
					 ?>
					<td ><span class="<?php echo $q3class ?>"><i></i><?php echo $q3score ?> %</span></td>
					<?php
						$fbscore = round($score['fb'], 2)*100;
						if ($fbscore >= 80) {
							$fbclass = "green";
						} elseif ($fbscore >= 70) {
							$fbclass = "yellow";
						} else {
							$fbclass = "red";
						}
					 ?>
					<td rowspan="3" >F&amp;B:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="<?php echo $fbclass ?>"><i></i><b><?php echo $fbscore ?> %</b></span></td>
				</tr>
				<tr>
					<td class="first"><?php echo $score['atmosphere']['question'] ?></td>
					<td><?php echo $score['atmosphere']['scores'][1] ?></td>
					<td><?php echo $score['atmosphere']['scores'][2] ?></td>
					<td><?php echo $score['atmosphere']['scores'][3] ?></td>
					<td><?php echo $score['atmosphere']['scores'][4] ?></td>
					<td><?php echo $score['atmosphere']['scores'][5] ?></td>
					<td><?php echo $score['atmosphere']['scores']['total'] ?></td>
					<?php
						$q4score = round($score['atmosphere']['scores']['q_satsf'], 2)*100;
						if ($q4score >= 80) {
							$q4class = "green";
						} elseif ($q4score >= 70) {
							$q4class = "yellow";
						} else {
							$q4class = "red";
						}
					 ?>
					<td ><span class="<?php echo $q4class ?>"><i></i><?php echo $q4score ?> %</span></td>
				</tr>
				<tr>
					<td class="first"><?php echo $score['drinks']['question'] ?></td>
					<td><?php echo $score['drinks']['scores'][1] ?></td>
					<td><?php echo $score['drinks']['scores'][2] ?></td>
					<td><?php echo $score['drinks']['scores'][3] ?></td>
					<td><?php echo $score['drinks']['scores'][4] ?></td>
					<td><?php echo $score['drinks']['scores'][5] ?></td>
					<td><?php echo $score['drinks']['scores']['total'] ?></td>
					<?php
						$q5score = round($score['drinks']['scores']['q_satsf'], 2)*100;
						if ($q5score >= 80) {
							$q5class = "green";
						} elseif ($q5score >= 70) {
							$q5class = "yellow";
						} else {
							$q5class = "red";
						}
					 ?>
					<td ><span class="<?php echo $q5class ?>"><i></i><?php echo $q5score ?> %</span></td>
				</tr>
			</tbody>
			</table>
			<?php if (intval($key) == 0): ?>
				<div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="title-table">Summary</div>
			<table class="report-view">
			<thead>
				<tr>
				<?php for ($i=1; $i <= 8; $i++): ?>
					<th><?php echo $scores[$i]['language'] ?></th>
				<?php endfor; ?>
					<th>Overall</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php for ($i=1; $i <= 8; $i++): ?>
						<?php
						$fscore = round($scores[$i]['final'], 2)*100;
						if ($fscore >= 80) {
							$fclass = "green";
						} elseif ($fscore >= 70) {
							$fclass = "yellow";
						} else {
							$fclass = "red";
						}
					 ?>
					<td rowspan="5" ><span class="<?php echo $fclass ?>"><i></i><?php echo $fscore ?> %</span></td>
					<?php endfor; ?>
					<?php
						$finscore = round($scores['totals']['final'], 2)*100;
						if ($finscore >= 80) {
							$finclass = "green";
						} elseif ($finscore >= 70) {
							$finclass = "yellow";
						} else {
							$finclass = "red";
						}
					 ?>
					<td rowspan="5" ><span class="<?php echo $finclass ?>"><i></i><?php echo $finscore ?> %</span></td>
				</tr>
			</tbody>
			</table>
				</div>
			<?php endif ?>
			</div>
			<?php if (intval($key) == 0): ?>
					<legend class="title-table section-title">Reports by language</legend>
				<?php endif; ?>
			<?php endforeach ?>
		<?php endif ?>
	</div>
	</div>
</div>
</body>
</html>
