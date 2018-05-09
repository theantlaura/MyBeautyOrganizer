<?php

function get_categories() {
   // query database for a list of categories
   $conn = db_connect();
   $query = "select catid, catname from categories";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}
function get_category_name($catid) {
   // query database for the name for a category id
   $conn = db_connect();
   $query = "select catname from categories
             where catid = '".$conn->real_escape_string($catid)."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $row = $result->fetch_object();
   return $row->catname;
}
function get_mu_items($catid) {
   // query database for the items in a category
   if ((!$catid) || ($catid == '')) {
     return false;
   }
   $conn = db_connect();
   $query = "select * from mu_items where catid = '".$conn->real_escape_string($catid)."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}
function get_mu_item_details($upc) {
  // query database for all details for a particular book
  if ((!$upc) || ($upc=='')) {
     return false;
  }
  $conn = db_connect();
  $query = "select * from mu_items where upc='".$conn->real_escape_string($upc)."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

?>