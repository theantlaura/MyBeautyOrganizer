<?php
// include function files for this application
require_once('mu_item_sc_fns.php');
session_start();
do_html_header("Deleting item");
if (check_admin_user()) {
  if (isset($_POST['upc'])) {
    $isbn = $_POST['upc'];
    if(delete_book($isbn)) {
      echo "<p>Item ".htmlspecialchars($upc)." was deleted.</p>";
    } else {
      echo "<p>Item ".htmlspecialchars($upc)." could not be deleted.</p>";
    }
  } else {
    echo "<p>We need an UPC to delete an item.  Please try again.</p>";
  }
  do_html_url("admin.php", "Back to administration menu");
} else {
  echo "<p>You are not authorised to view this page.</p>";
}
do_html_footer();
?>