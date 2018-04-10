<!DOCTYPE html>
<html>
  <head>`
  <link rel="icon" 
      type="image/png" 
      href="http://mybeautyorganizer.altervista.org/MyBeautyOrganizer/_/components/php/favicon.ico">
    <title>My Beauty Organizer -- Steals n Deals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='http://fonts.googleapis.com/css?family=Bree+Serif|Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="_/css/mystyles.css" rel="stylesheet" media="screen">
  </head>
  <body id="steals_n_deals" data-spy="scroll" data-target=".scrollspy">
    <section class="container">
      <div class="content row">
          <?php include "_/components/php/header.php"; ?>
        <h1><center> Steals n' Deals: Makeup, Skincare Products, Makeup Set, Nail Polish </center></h1>
          <?php include "_/components/php/steals_carousels.php"; ?>
      </div><!-- content -->
    </section><!-- container --> 

    <script src="_/js/bootstrap.js"></script>
    <script src="_/js/myscript.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html>
  <body id="swatches" data-spy="scroll" data-target=".scrollspy">

    <section class="container">
      <div class="content row">
        <section class="main col col-lg-8">
          <?php include "_/components/php/article_swatches.php"; ?>
        </section><!-- main -->
        <section class="sidebar col col-lg-4">
          <?php include "_/components/php/aside-register_newsletter.php"; ?>
          <?php include "_/components/php/aside-latest_reviews.php"; ?>
          <?php include "_/components/php/aside-accordion.php"; ?>
        </section><!-- sidebar -->
      </div><!-- content -->
    <?php include "_/components/php/footer.php"; ?>
    </section><!-- container --> 

    <script src="_/js/bootstrap.js"></script>
    <script src="_/js/myscript.js"></script>
  </body>
</html>













