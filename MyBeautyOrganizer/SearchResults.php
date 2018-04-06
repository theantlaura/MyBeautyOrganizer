<?php
	  mysql_connect("localhost","mybeautyorganizer","") or die("Could not connect db");
	  mysql_select_db("my_mybeautyorganizer") or die("Could not find db!");
   	  $output = '';
  //collect 
  if(isset($_POST['search'])) {
	$searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
    
    $query = mysql_query("SELECT * FROM makeup_brands WHERE brand_name LIKE '%$searchq%'") or die("could not search!");
  	$count = mysql_num_rows($query); //This returns an integer of how many rows in your tabl
	
    if($count == 0) {
    	$output = 'There was no search results';
     else {
     	while($row = mysql_fetch_array($query)) {
        	$bname = $row['brandname'];
            $id = $row['id'];
            
            $output .='<div> ' .$bname.' </div> ';
     }
   }
 }
  
/*include("My_DB_Functions.php");
      $conn = My_Connect_DB();
  if (!isset($_GET['search'])) {
  	//header("Location:index.php");
  }
  //3 steps in running a query
   // prefix -> search indicates what you are looking for. Also creates a query
  $search_sql = "SELECT * FROM `makeup_brands`WHERE brand_name LIKE '%".$_GET['search']."%' OR description LIKE '%".$_GET['search']."%'";
  // Results from the query will be placed here(below)
  /*$sql = "SELECT * FROM `makeup_items`WHERE name LIKE '%".$_POST['search']."%' OR description LIKE '%".$_POST['search']."%'";
  // Results from the query will be placed here(below)
  $sql = "SELECT * FROM `Store_Information` WHERE store_name LIKE '%".$_POST['search']."%' OR description LIKE '%".$_POST['search']."%'";
  // Results from the query will be placed here(below)*/
 /* $search_query = My_SQL_EXE($conn, $search_sql);
  if(mysql_num_rows($search_query)!=0) { //if its true then below will run.
  //Organizes the $search_query in some kind of record set(rs)
  $search_rs=mysql_fetch_assoc($search_query);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    
   			<p> Search results <?php echo $_GET['search'] ?> </p> 	
      
  </head>
  
  <body>

    <?php if(mysql_num_rows($search_query) !=0) {
       do { ?>
       <p><?php echo $search_rs['name']; ?></p>
       	
    <?php  } while ($search_rs=mysql_fetch_assoc($search_query));
    } else {
    	echo "No results found";
        }
     ?> */ 