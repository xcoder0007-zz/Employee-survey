<!DOCTYPE HTML>
<html>
<head>
<?php $this->load->view('header'); ?>
<title>A la Carte Restaurant Survey</title>
</head>
  <body>
<div class="whole-container">
<br />

</div>
<br />
      <div id="envelope">
            <a class="back-link" href="/survey/language">Back</a>
            <a class="exit-link" href="/auth/logout">Exit</a>


<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="language" value="<?php echo $this->session->userdata['language_id'] ?>">
<input type="hidden" name="restaurant" value="<?php echo $this->session->userdata['restaurant_id'] ?>">
      
      <span class="myfont">
      Room #.:
</span><br /><input name="room" class="input_guest" type="number" placeholder="Please Enter your Room Number" /><br />
      <span class="myfont">
      Nationality.:
</span><br />
    <select name="country" id="country-selector" autofocus="autofocus" autocorrect="off" autocomplete="off">
      <option value="" selected="selected">Select Country</option>
      <?php foreach ($countries as $country): ?>
            <option value="<?php echo $country['id'] ?>" data-alternative-spellings="<?php echo $country['code'] ?>"><?php echo $country['name'] ?></option>
      <?php endforeach ?>
    </select>
<br />



      <br /><br />
<label class="myfont"><?php echo $questions[0]['question'] ?></label>
<br />

<div class="radios">
    <input id="excellent" value="1" name="offer" type="radio">
    <label for="excellent">Excellent <img style="width: 37px;height: 33px;" src="assets/emo/excellent.png" /> </label>
       <input id="vgood" value="2" name="offer" type="radio">
    <label for="vgood">Very Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="good" value="3" name="offer" type="radio">
    <label for="good">Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="fair" value="4" name="offer" type="radio">
    <label for="fair">Fair   <img style="width: 37px;height: 33px;" src="assets/emo/Fair.png" /></label>
      
       <input id="poor" value="5" name="offer" type="radio">
    <label for="poor">Poor   <img style="width: 37px;height: 33px;" src="assets/emo/Poor.png" /></label>
</div>      
<br /><br />

<label class="myfont"><?php echo $questions[1]['question'] ?></label>
<div class="radios">
    <input id="excellent" value="1" name="dishes" type="radio">
    <label for="excellent">Excellent <img style="width: 37px;height: 33px;" src="assets/emo/excellent.png" /> </label>
       <input id="vgood" value="2" name="dishes" type="radio">
    <label for="vgood">Very Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="good" value="3" name="dishes" type="radio">
    <label for="good">Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="fair" value="4" name="dishes" type="radio">
    <label for="fair">Fair   <img style="width: 37px;height: 33px;" src="assets/emo/Fair.png" /></label>
      
       <input id="poor" value="5" name="dishes" type="radio">
    <label for="poor">Poor   <img style="width: 37px;height: 33px;" src="assets/emo/Poor.png" /></label>
</div>      

<br /><br />



<label class="myfont"><?php echo $questions[2]['question'] ?></label>
<div class="radios">
    <input id="excellent" value="1" name="service" type="radio">
    <label for="excellent">Excellent <img style="width: 37px;height: 33px;" src="assets/emo/excellent.png" /> </label>
       <input id="vgood" value="2" name="service" type="radio">
    <label for="vgood">Very Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="good" value="3" name="service" type="radio">
    <label for="good">Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="fair" value="4" name="service" type="radio">
    <label for="fair">Fair   <img style="width: 37px;height: 33px;" src="assets/emo/Fair.png" /></label>
      
       <input id="poor" value="5" name="service" type="radio">
    <label for="poor">Poor   <img style="width: 37px;height: 33px;" src="assets/emo/Poor.png" /></label>
</div>      

<br /><br />



<label class="myfont"><?php echo $questions[3]['question'] ?></label>
<div class="radios">
    <input id="excellent" value="1" name="atmosphere" type="radio">
    <label for="excellent">Excellent <img style="width: 37px;height: 33px;" src="assets/emo/excellent.png" /> </label>
       <input id="vgood" value="2" name="atmosphere" type="radio">
    <label for="vgood">Very Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="good" value="3" name="atmosphere" type="radio">
    <label for="good">Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="fair" value="4" name="atmosphere" type="radio">
    <label for="fair">Fair   <img style="width: 37px;height: 33px;" src="assets/emo/Fair.png" /></label>
      
       <input id="poor" value="5" name="atmosphere" type="radio">
    <label for="poor">Poor   <img style="width: 37px;height: 33px;" src="assets/emo/Poor.png" /></label>
</div>      

<br /><br />






<label class="myfont"><?php echo $questions[4]['question'] ?></label>
<div class="radios">
    <input id="excellent" value="1" name="drinks" type="radio">
    <label for="excellent">Excellent <img style="width: 37px;height: 33px;" src="assets/emo/excellent.png" /> </label>
       <input id="vgood" value="2" name="drinks" type="radio">
    <label for="vgood">Very Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="good" value="3" name="drinks" type="radio">
    <label for="good">Good   <img style="width: 37px;height: 33px;" src="assets/emo/Good.png" /></label>
      
       <input id="fair" value="4" name="drinks" type="radio">
    <label for="fair">Fair   <img style="width: 37px;height: 33px;" src="assets/emo/Fair.png" /></label>
      
       <input id="poor" value="5" name="drinks" type="radio">
    <label for="poor">Poor   <img style="width: 37px;height: 33px;" src="assets/emo/Poor.png" /></label>
</div>
<br /><br />
<br /><br />
<label class="myfont"><?php echo $texts[0]['text'] ?></label>
<br />
<textarea name="comments" placeholder="<?php echo $texts[1]['text'] ?> "></textarea><br /><br />
<span class="btn btn-default btn-file">
<?php echo $texts[2]['text'] ?> *
  <input type="file" name="picture" accept="video/*,audio/*" capture="">
</span>
<br /><br />
<label >* <?php echo $texts[3]['text'] ?></label>
<br />
<br /><br />
<br /><br />
<br />
<input name="submit" type="submit" class="survey-submit" value="<?php echo $texts[4]['text'] ?>" />
</form>

      <script>
            (function($) {
                  $(function() {
                        $('select').selectToAutocomplete();

                  });
            })(jQuery);
            $(document).ready(function() {

                  $(".radios").radiosToSlider();

            });

      </script>

      </body>
      </html>