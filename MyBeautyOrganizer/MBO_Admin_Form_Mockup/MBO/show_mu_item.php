<?php
  include ('mu_item_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();
  $isbn = $_GET['isbn'];
  // get this book out of database
  $mu_item = get_mu_item_details($upc);
  do_html_header($mu_item['item_name']);
  display_book_details($mu_item);
  // set url for "continue button"
  $target = "index.php";
  if($mu_item['catid']) {
    $target = "show_cat.php?catid=". urlencode($mu_item['catid']);
  }
  // if logged in as admin, show edit book links
  if(check_admin_user()) {
    display_button("edit_mu_item_form.php?upc=". urlencode($upc), "edit-item", "Edit Item");
    display_button("admin.php", "admin-menu", "Admin Menu");
    display_button($target, "continue", "Continue");
  } else {
    display_button("show_cart.php?new=". urlencode($isbn), "add-to-cart",
                   "Add ". htmlspecialchars($book['title']) ." To My Shopping Cart");
    display_button($target, "continue-shopping", "Continue Shopping");
  }
  do_html_footer();
?>