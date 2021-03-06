<html>

<head>
<link href="https://fonts.googleapis.com/css?family=Alex+Brush|Cookie" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
* {
  box-sizing: border-box
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
                  float: right;
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
</head>
<header class="clearfix" style="focus: background-color: none;">

	<section id="branding" >
		<h1><a href="http://mybeautyorganizer.altervista.org/MyBeautyOrganizer/index.php" style="margin-top: 1px;
        margin-bottom: 1px;
	margin-bottom: 1px;
	font-family: 'Cookie', cursive;
	font-family: 'Alex Brush', cursive;
	font-size: 4em;
	color:#f998ca;
	text-shadow: 3px 2px black;
	margin-left: 10px;">My Beauty Organizer</a><h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      			
			     
    </section><!-- branding -->

	<section class="navbar">  
		<ul class="nav navbar-nav"> 
			<li><a href="index.php">HOME</a></li>
			<li><a href="steals_n_deals.php">STEALS N DEALS</a></li>
			<li><a href="whats_new.php">WHAT'S NEW</a></li>
			<li><a href="swatches.php">SWATCHES</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">COMMUNITY <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="community.php#MBO_Reviews">REVIEWS</a></li>
					<li><a tabindex="-1" href="community.php#MBO_Videos">MBO VIDEOS</a></li>
				  	<li><a tabindex="-1" href="community.php#Share_A_Look">SHARE A LOOK</a></li>
				  	<li><a tabindex="-1" href="community.php#Beauty_Advice">BEAUTY ADVICE</a></li>
                    
				</ul><!-- dropdown menu -->
			
			<li><script>
  (function() {
    var cx = '004966597396845221278:56jkzwceztm';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search><!--<form class="example" action="SearchResults.php" style="margin:left;max-width:250px;">
		  	<input type="text" placeholder="Search.." name="search">
  			<button type="submit"><i class="fa fa-search"></i></button>
			</form></li>
              -->
        
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