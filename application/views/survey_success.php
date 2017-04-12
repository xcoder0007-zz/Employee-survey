<!DOCTYPE HTML>
<html>
<head>
<?php $this->load->view('header'); ?>
<title>A la Carte Restaurant Survey</title>
<?php if ($this->session->userdata['trial'] == 1): ?>
<script type="text/javascript">
  $(document).ready(
    $.ajax({
      url: "/auth/logout"
    })
  );
</script>
<?php else: ?>
<script type="text/javascript">
	$(document).ready(
		function(){
			setTimeout(function(){window.location = "/survey/language";}, 5000);
		});
</script>
<?php endif ?>

</head>
  <body>

<br />
<div class="masked inner-container">
            <h1 class="head-title">Thank you for your feedback.</h1>
</div>
</body>
</html>