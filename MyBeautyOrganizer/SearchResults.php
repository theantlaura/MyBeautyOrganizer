<?php
	include("account_inventory.php");
    
  if (!isset($_POST['search'])) {
  	header("Location:account_inventory.php");
  }
  //3 steps in running a query
   // prefix -> search indicates what you are looking for. Also creates a query
  $search_sql=$sql = "SELECT * FROM `makeup_brands`WHERE name LIKE '&".$_POST['search']."%' OR description LIKE '%".$_POST['search']."%'";
  // Results from the query will be placed here(below)
  $sql = "SELECT * FROM `makeup_items`WHERE name LIKE '&".$_POST['search']."%' OR description LIKE '%".$_POST['search']."%'";
  // Results from the query will be placed here(below)
  $sql = "SELECT * FROM `Store_Information` WHERE name LIKE '&".$_POST['search']."%' OR description LIKE '%".$_POST['search']."%'";
  // Results from the query will be placed here(below)
  $search_query=mysql_query($search_sql);
  if(mysql_num_rows($search_query)!=0) { //if its true then below will run.
  //Organizes the $search_query in some kind of record set(rs)
  $search_rs=mysql_fetch_assoc($search_query);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    
   			<p> Search results</p> 	
      
  </head>
  
  <body>

    <?php if(mysql_num_rows($search_query) !=0) {
       do { ?>
       <p><?php echo $search_rs['name']; ?></p>
       	
    <?php  } while ($search_rs=mysql_fetch_assoc($search_query));
    } else {
    	echo "No results found";
        }
    
    ?>