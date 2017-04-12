<!DOCTYPE HTML>
<html lang="en" class="no-js">
<head>
<?php $this->load->view('header'); ?>
<title>A la Carte Restaurant Survey</title>
</head>
  <body>
<div class="whole-container">

</div>
      <div>
            <a class="back-link" href="/survey/language">Back</a>
            <a class="exit-link" href="/auth/logout">Logout</a>
</div>

  <!-- Header -->
  <div class="intro-header">

      <div class="container">

          <div class="row">
              <div class="col-lg-12">
                  <div class="intro-message">



                      <section>


                          <h3>Welcome Home – at SUNRISE Resorts &amp; Cruises Egypt!  </h3>


                  <form id="theForm" class="simform" action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="language" value="<?php echo $this->session->userdata['language_id'] ?>">
                  <input type="hidden" name="restaurant" value="<?php echo $this->session->userdata['restaurant_id'] ?>">
                  <input type="hidden" name="meal" value="<?php echo $this->session->userdata['meal_id'] ?>">
                    <div class="simform-inner">
                      <ol class="questions">
                        <li>
                          <span><label for="name"><?php echo $texts[5]['text'] ?> </label></span>
                          <input class="input" id="name" name="room" type="number"/>
                        </li>
                        <li>
                          <span><label for="country-selector"><?php echo $texts[6]['text'] ?> </label></span>
                          <select class="input" name="country" id="country" autofocus="autofocus" autocorrect="off" autocomplete="off">
                          <option value="" selected="selected">Select Country</option>
                          <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['id'] ?>" data-alternative-spellings="<?php echo $country['code'] ?>"><?php echo $country['name'] ?></option>
                          <?php endforeach ?>
                        </select>
                        </li>
                        <li>
                          <span><label for="q4"><?php echo $questions[0]['question'] ?></label></span>
                            <div class="stars">

                              <input class="input star star-5" id="star-5-1" type="radio" name="offer" value="1" name="star"/>
                              <label class="star star-5" for="star-5-1"></label>
                              <input class="input star star-4" id="star-4-1" type="radio" name="offer" value="2" name="star"/>
                              <label class="star star-4" for="star-4-1"></label>
                              <input class="input star star-3" id="star-3-1" type="radio" name="offer" value="3" name="star"/>
                              <label class="star star-3" for="star-3-1"></label>
                              <input class="input star star-2" id="star-2-1" type="radio" name="offer" value="4" name="star"/>
                              <label class="star star-2" for="star-2-1"></label>
                              <input class="input star star-1" id="star-1-1" type="radio" name="offer" value="5" name="star"/>
                              <label class="star star-1" for="star-1-1"></label>
                            </div>
                        </li>

                        <li>
                            <span><label for="q5"><?php echo $questions[1]['question'] ?></label></span>
                            <div class="stars">

                              <input class="input star star-5" id="star-5-2" type="radio" name="dishes" value="1" name="star"/>
                              <label class="star star-5" for="star-5-2"></label>
                              <input class="input star star-4" id="star-4-2" type="radio" name="dishes" value="2" name="star"/>
                              <label class="star star-4" for="star-4-2"></label>
                              <input class="input star star-3" id="star-3-2" type="radio" name="dishes" value="3" name="star"/>
                              <label class="star star-3" for="star-3-2"></label>
                              <input class="input star star-2" id="star-2-2" type="radio" name="dishes" value="4" name="star"/>
                              <label class="star star-2" for="star-2-2"></label>
                              <input class="input star star-1" id="star-1-2" type="radio" name="dishes" value="5" name="star"/>
                              <label class="star star-1" for="star-1-2"></label>
                            </div>
                        </li>

                        <li>
                            <span><label for="q6"><?php echo $questions[2]['question'] ?></label></span>
                            <div class="stars">

                              <input class="input star star-5" id="star-5-3" type="radio" name="service" value="1" name="star"/>
                              <label class="star star-5" for="star-5-3"></label>
                              <input class="input star star-4" id="star-4-3" type="radio" name="service" value="2" name="star"/>
                              <label class="star star-4" for="star-4-3"></label>
                              <input class="input star star-3" id="star-3-3" type="radio" name="service" value="3" name="star"/>
                              <label class="star star-3" for="star-3-3"></label>
                              <input class="input star star-2" id="star-2-3" type="radio" name="service" value="4" name="star"/>
                              <label class="star star-2" for="star-2-3"></label>
                              <input class="input star star-1" id="star-1-3" type="radio" name="service" value="5" name="star"/>
                              <label class="star star-1" for="star-1-3"></label>
                            </div>
                        </li>

                        <li>
                            <span><label for="q7"><?php echo $questions[3]['question'] ?></label></span>
                            <div class="stars">

                              <input class="input star star-5" id="star-5-4" type="radio" name="atmosphere" value="1" name="star"/>
                              <label class="star star-5" for="star-5-4"></label>
                              <input class="input star star-4" id="star-4-4" type="radio" name="atmosphere" value="2" name="star"/>
                              <label class="star star-4" for="star-4-4"></label>
                              <input class="input star star-3" id="star-3-4" type="radio" name="atmosphere" value="3" name="star"/>
                              <label class="star star-3" for="star-3-4"></label>
                              <input class="input star star-2" id="star-2-4" type="radio" name="atmosphere" value="4" name="star"/>
                              <label class="star star-2" for="star-2-4"></label>
                              <input class="input star star-1" id="star-1-4" type="radio" name="atmosphere" value="5" name="star"/>
                              <label class="star star-1" for="star-1-4"></label>
                            </div>
                        </li>

                        <li>
                            <span><label for="q8"><?php echo $questions[4]['question'] ?></label></span>
                            <div class="stars">

                              <input class="input star star-5" id="star-5-5" type="radio" name="drinks" value="1" name="star"/>
                              <label class="star star-5" for="star-5-5"></label>
                              <input class="input star star-4" id="star-4-5" type="radio" name="drinks" value="2" name="star"/>
                              <label class="star star-4" for="star-4-5"></label>
                              <input class="input star star-3" id="star-3-5" type="radio" name="drinks" value="3" name="star"/>
                              <label class="star star-3" for="star-3-5"></label>
                              <input class="input star star-2" id="star-2-5" type="radio" name="drinks" value="4" name="star"/>
                              <label class="star star-2" for="star-2-5"></label>
                              <input class="input star star-1" id="star-1-5" type="radio" name="drinks" value="5" name="star"/>
                              <label class="star star-1" for="star-1-5"></label>
                            </div>
                        </li>

                        <li>
                            <span><label for="q9"><?php echo $questions[5]['question'] ?></label></span>
                            <div class="radiosteps">
                              <input class="input" id="yes" type="radio" name="timing" value="1" checked="checked" />
                              <label class="" for="yes"><span><?php echo $texts[8]['text'] ?></span></label>
                            </div>
                            <div class="radiosteps">
                              <input class="input" id="no" type="radio" name="timing" value="0"/>
                              <label class="" for="no"><span><?php echo $texts[9]['text'] ?></span></label>
                            </div>
                        </li>

                        <li>
                          <label><?php echo $texts[0]['text'] ?></label>
                          <textarea class="input harder" name="comments" placeholder="<?php echo $texts[1]['text'] ?>"></textarea>
                          <span class="btn btn-default btn-file">
                            <p><?php echo $texts[2]['text'] ?> *</p>
                            <input class="input" type="file" name="picture" accept="audio/*" capture="" >
                          </span>
                          <input class="input" type="email" placeholder="<?php echo $texts[7]['text'] ?>" id="email" name="email" />
                          <label class="claim">* <?php echo $texts[3]['text'] ?></label>
                          <br>
                          <input name="submit" type="submit" class="survey-submit" value="<?php echo $texts[4]['text'] ?>" />
                        </li>

                      </ol><!-- /questions -->
                      <div class="controls">
                        <button class="next"></button>
                        <button class="back"></button>
                        <div class="progress"></div>
                        <span class="number">
                      <span class="number-current"></span>
                      <span class="number-total"></span>
                    </span>
                    <span class="error-message"></span>
                       </div><!-- / controls -->
                    </div><!-- /simform-inner -->
                    <span class="final-message"></span>
                  </form><!-- /simform -->
                  
                </section>

                  </div>
              </div>
          </div>

      </div>
      <!-- /.container -->

  </div>
  <!-- /.intro-header -->





  <!-- Footer -->
  <footer>
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <p class="copyright text-muted small">© Property of SUNRISE Resorts &amp; Cruises. All rights reserved</p>
              </div>
          </div>
      </div>
  </footer>


  <script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stepsForm.js"></script>
  <script>
    var theForm = document.getElementById( 'theForm' );

    new stepsForm( theForm, {
      // onSubmit : function( form ) {
      //   // hide form
      //   // classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );


      //   // form.submit();

      //   // let's just simulate something...
      //   // var messageEl = theForm.querySelector( '.final-message' );
      //   // messageEl.innerHTML = 'Thank you! We will be in touch.';
      //   // classie.addClass( messageEl, 'show' );
      // }
    } );
  </script>


<script>
  (function($) {
        $(function() {
              $('select').selectToAutocomplete();

        });
  })(jQuery);

</script>

      </body>
      </html>
