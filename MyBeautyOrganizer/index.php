<!DOCTYPE html>
<html>
  <head>
<link rel="icon" 
      type="image/png" 
      href="http://mybeautyorganizer.altervista.org/MyBeautyOrganizer/_/components/php/favicon.ico">
    <title>My Beauty Organizer --Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='http://fonts.googleapis.com/css?family=Bree+Serif|Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="_/css/mystyles.css" rel="stylesheet" media="screen">


  </head>
  <body id="home">

		<section class="container">
			<div class="content row">
          <?php include "_/components/php/header.php"; ?>
          <?php include "_/components/php/snippet-carousel.php"; ?>
				<section class="main col col-lg-8">
          <?php include "_/components/php/article-latest_beauty_news.php"; ?>
          <?php include "_/components/php/article-latest_MBO_video.php"; ?>
          <?php include "_/components/php/article-latest_review.php"; ?>
				</section><!-- main -->
				<section class="sidebar col col-lg-4">
          <?php include "_/components/php/aside-register-newsletter.php"; ?>
          <?php include "_/components/php/aside-weekly_steals_n_deals.php"; ?>
          <?php include "_/components/php/aside-accordion_swatches.php"; ?>
				</section><!-- sidebar -->
			</div><!-- content -->
    <?php include "_/components/php/footer.php"; ?>
		</section><!-- container -->

    <script src="_/js/bootstrap.js"></script>
    <script src="_/js/myscript.js"></script>
  </body>
</html>
