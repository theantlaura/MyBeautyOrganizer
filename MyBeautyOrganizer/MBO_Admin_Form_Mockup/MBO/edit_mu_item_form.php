<?php
// include function files for this application
require_once('mu_item_sc_fns.php');
session_start();
do_html_header("Edit item details");
if (check_admin_user()) {
  if ($mu_item = get_mu_item_details($_GET['upc'])) {
    display_mu_item_form($mu_item);
  } else {
    echo "<p>Could not retrieve item details.</p>";
  }
  do_html_url("admin.php", "Back to administration menu");
} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}
do_html_footer();
?>