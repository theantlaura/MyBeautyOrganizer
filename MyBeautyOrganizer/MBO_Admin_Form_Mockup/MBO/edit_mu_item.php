<?php
// include function files for this application
require_once('mu_item_sc_fns.php');
session_start();
do_html_header("Updating item");
if (check_admin_user()) {
  if (filled_out($_POST)) {
    $oldupc = $_POST['oldupc'];
    $isbn = $_POST['upc'];
    $item_name = $_POST['item_name'];
    $brand = $_POST['brand'];
    $catid = $_POST['catid'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    if(update_book($oldupc, $upc, $item_name, $brand, $catid, $price, $description)) {
      echo "<p>Item was updated.</p>";
    } else {
      echo "<p>Item could not be updated.</p>";
    }
  } else {
    echo "<p>You have not filled out the form.  Please try again.</p>";
  }
  do_html_url("admin.php", "Back to administration menu");
} else {
  echo "<p>You are not authorised to view this page.</p>";
}
do_html_footer();
?>