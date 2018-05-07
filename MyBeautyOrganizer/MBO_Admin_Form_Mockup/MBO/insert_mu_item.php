<?php
// include function files for this application
require_once('mu_item_sc_fns.php');
session_start();
do_html_header("Adding an item");
if (check_admin_user()) {
  if (filled_out($_POST)) {
    $upc = $_POST['upc'];
    $item_name = $_POST['item_name'];
    $brand = $_POST['brand'];
    $catid = $_POST['catid'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    if(insert_mu_item($upc, $item_name, $brand, $catid, $price, $description)) {
      echo "<p>Item <em>".htmlspecialchars($item_name)."</em> was added to the database.</p>";
    } else {
      echo "<p>Item <em>".htmlspecialchars($item_name)."</em> could not be added to the database.</p>";
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