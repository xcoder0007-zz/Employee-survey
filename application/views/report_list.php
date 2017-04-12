<!DOCTYPE HTML>
<html>
<head>
  <?php $this->
  load->view('header'); ?>
  <title>Reports</title>
</head>
<body>
  <div id="envelope">
    <a class="back-link" href="/">Exit</a>
    <a class="exit-link" href="/auth/logout">Logout</a>
  </div>
  <div class="container petit">
    <legend class="title-table">Restaurant survey reports</legend>
    <div class="report-variant">
      <span class="legen">Surving time report</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/timing/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/timing/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/timing/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">Summary report</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/summary/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/summary/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/summary/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">Detailed report</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/detailed/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/detailed/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/detailed/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">Comments report</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/comments/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/comments/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/comments/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">YTD per restaurant</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_ytd/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_ytd/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_ytd/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">YTD language consolidation</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_ytd_lang/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_ytd_lang/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_ytd_lang/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">MTD language consolidation</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_lang_mtd/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_lang_mtd/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_lang_mtd/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">YTD per language per restaurant</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_ytd_lang/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_ytd_lang/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_ytd_lang/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">MTD per language per restaurant</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_mtd_lang/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_mtd_lang/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/restaurant_mtd_lang/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">YTD consolidation</span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_ytd/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_ytd/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file">
        <a class="rprt-lnk" href="/reports/hotel_ytd/3">Dinner</a>
      </span>
    </div>
    <?php if ($is_admin): ?>
    <div class="report-variant">
      <span class="legen">MTD per language per hotel</span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_lang/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_lang/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_lang/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">MTD per question per hotel</span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_question/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_question/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_question/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">MTD per restaurant per hotel</span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">MTD per language per restaurant per hotel</span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_restaurant/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_restaurant/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_mtd_restaurant/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">YTD per language per hotel</span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_ytd_lang/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_ytd_lang/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_ytd_lang/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">YTD per hotel</span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_ytd/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_ytd/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/con_ytd/3">Dinner</a>
      </span>
    </div>
    <div class="report-variant">
      <span class="legen">Survey Count</span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/survey_count/1">Breakfast</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/survey_count/2">Lunch</a>
      </span>
      <span class="btn btn-default btn-file gway">
        <a class="rprt-lnk" href="/reports/survey_count/3">Dinner</a>
      </span>
    </div>
    <?php endif ?></div>
</body>
</html>