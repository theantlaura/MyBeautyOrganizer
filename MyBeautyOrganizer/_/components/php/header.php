<html>

<head>
<link href="https://fonts.googleapis.com/css?family=Alex+Brush|Cookie" rel="stylesheet">

<style> 
input[type=text] {
    width: 150px;
    box-sizing: border-box;
    border: 2px solid #FFC0CB;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url("images/misc/searchicon.png");
    background-repeat: no-repeat;
    position:  relative;
   
    
    
    
}

input[type=text]:focus {
border: 3px solid #FFC0CB;
    width: 100%;
}

</style>
</head>
<header class="clearfix" style="focus: background-color: none;">

	<section id="branding" >
		<h1 style="margin-top: 1px;
	margin-bottom: 1px;
	font-family: 'Cookie', cursive;
	font-family: 'Alex Brush', cursive;
	font-size: 4em;
	color:#ec93b0;
	text-shadow: 3px 2px black;
	margin-left: 180px;">My Beauty Organizer</h1>
     
  				
			     
    </section><!-- branding -->

	<section class="navbar">  
		<ul class="nav navbar-nav"> 
			<li><a href="index.php">Home</a></li>
			<li><a href="steals_n_deals.php">StealsnDeals</a></li>
			<li><a href="whats_new.php">What's New</a></li>
			<li><a href="swatches.php">Swatches</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Community <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="latest_videos.php">Community</a></li>
					<li class="divider"></li>
				  <li><a tabindex="-1" href="community.php#MBO_Videos">MBO Videos</a></li>
				  <li><a tabindex="-1" href="community.php#Share_A_Look">Share A Look</a></li>
				  <li><a tabindex="-1" href="community.php#Beauty_Advice">Beauty Advice</a></li>
				</ul><!-- dropdown menu -->
			<li><a href="reviews.php">Reviews</a></li>
			<li>
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
              <style>
              body {
                  font-family: Arial;
              }

              * {
                  box-sizing: border-box;
              }

              form.example input[type=text] {
                  padding: 10px;
                  font-size: 17px;
                  border: 1px solid grey;
                  float: left;
                  width: 80%;
                  background: #f2e3e3;
              }

              form.example button {
                  float: left;
                  width: 20%;
                  padding: 10px;
                  background: #fce0f0;
                  color: white;
                  font-size: 17px;
                  border: 1px solid grey;
                  border-left: none;
                  cursor: pointer;
              }

              form.example button:hover {
                  background: #f998ca;
              }

              form.example::after {
                  content: "";
                  clear: both;
                  display: table;
              }
              </style>
              <body>
			<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
		  	<input type="text" placeholder="Search.." name="search2">
  			<button type="submit"><i class="fa fa-search"></i></button>
			</form>

              </body>
              </li>
        
        <!-- nav -->
	</section><!-- navbar -->

	<!-- Modal -->
	<section id="modal" class="modal fade">
		<div class="modal-body">
			<img id="modalimage" src="" alt="Modal Photo">
		</div><!-- modal-body -->
	</section><!-- modal -->
</header><!-- header -->
</html>