<html>

<head>
  <script>
function showResult(str){
if(str.length==0){
document.getElementById("livesearch").innerHTML="";
document.getElementById("livesearch").style.border="0px";
return;
}
if(window.XMLHttpRequest){
// Code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{//Code for IE6, IE5
xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
document.getElementById("livesearch").style.border="1px solid #A5ACB2";
}
}
xmlhttp.open("GET", "livesearch.php?q="+str,true);
xmlhttp.send();
}
</script>

<link href="https://fonts.googleapis.com/css?family=Alex+Brush|Cookie" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<header class="clearfix" style="focus: background-color: none;">

	<section class = "branding">
    <table col-span:2>
		<tr><td><h1 style="margin-top: 1px;
        margin-bottom: 1px;
	margin-bottom: 1px;
	font-family: 'Cookie', cursive;
	font-family: 'Alex Brush', cursive;
	font-size: 3em;
	color:#f998ca;
	text-shadow: 3px 2px black;
	margin-left: 10px;">My Beauty Organizer</h1></td>
    
    <td><form>
<a class="btn btn-link" href="Login.php" style="	padding: 4px 6px; margin-left: 580px; background: white; color: black;
border-color: hotpink;">Login</a>
</form></td></tr>
</table>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
      		     
    </section><!-- branding -->

	<section class="navbar">  
		<ul class="nav navbar-nav"> 
			<li><a href="index.php">HOME</a></li>
			<li><a href="steals_n_deals.php">STEALS N DEALS</a></li>
			<li><a href="whats_new.php">WHAT'S NEW</a></li>
			<li><a href="swatches.php">SWATCHES</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">REVIEWS <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="reviews.php">ALL REVIEWS</a></li>
					<li class="divider"></li>
				  <li><a tabindex="-1" href="reviews.php#Urban_Decay">Urban Decay</a></li>
				  <li><a tabindex="-1" href="reviews.php#Too_Faced">Too Faced</a></li>
				  <li><a tabindex="-1" href="reviews.php#MAC">MAC</a></li>
				  <li><a tabindex="-1" href="reviews.php#Juvias_Place">Juvia's Place</a></li>
				  <li><a tabindex="-1" href="reviews.php#Morphe">Morphe</a></li>
				  <li><a tabindex="-1" href="reviews.php#Makeup_Geek">Makeup Geek</a></li>
				  <li><a tabindex="-1" href="reviews.php#Nabla_Cosmetics">Nabla Cosmetics</a></li>
				  <li><a tabindex="-1" href="reviews.php#Smashbox">Smashbox</a></li>
				  <li><a tabindex="-1" href="reviews.php#Dior">Dior</a></li>
				  <li><a tabindex="-1" href="reviews.php#Becca">Becca</a></li>
				  <li><a tabindex="-1" href="reviews.php#Cover_FX">Cover FX</a></li>
				 
				</ul><!-- dropdown menu -->
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
<form style="color:black;">
		  <input type="text" placeholder="Search.." size="30" onkeyup="showResult(this.value)"
          name="search" >
		  <div id="livesearch" ></div>
		  </form>
        
          
          
          
          
</html>