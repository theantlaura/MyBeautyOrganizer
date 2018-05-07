<?php
function do_html_header($title = '') {
  // print an HTML header
  // declare the session variables we want access to inside the function
  if (empty($_SESSION['items'])) {
    $_SESSION['items'] = '0';
  }
  if (empty($_SESSION['total_price'])) {
    $_SESSION['total_price'] = '0.00';
  }
?>
  <html>
  <head>
    <title><?php echo htmlspecialchars($title); ?></title>
    <style>
      h2 { font-family: Arial, Helvetica, sans-serif; font-size: 22px; color: red; margin: 6px }
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #FF0000; width=70%; text-align=center}
      a { color: #000000 }
    </style>
  </head>
  <body>
  <table width="100%" border="0" cellspacing="0" bgcolor="#cccccc">
  <tr>
  <td rowspan="2">
  <a href="index.php"><img src="images/beauty.png" alt="mbo icon" border="0"
       align="left" valign="bottom" height="55" width="325"/></a>
  </td>
  <td align="right" valign="bottom">
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Items = " . htmlspecialchars($_SESSION['items']);
     }
  ?>
  </td>
  <td align="right" rowspan="2" width="135">
  <?php
     if(isset($_SESSION['admin_user'])) {
       display_button('logout.png', 'logout', 'Log Out');
     } else {
       display_button('show_cart.php', '', '');
     }
  ?>
  </tr>
  <tr>
  <td align="right" valign="top">
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Price = $".number_format($_SESSION['total_price'],2);
     }
  ?>
  </td>
  </tr>
  </table>
<?php
  if($title) {
    do_html_heading($title);
  }
}
function do_html_footer() {
  // print an HTML footer
?>
  </body>
  </html>
<?php
}
function do_html_heading($heading) {
  // print heading
?>
  <h2><?php echo htmlspecialchars($heading); ?></h2>
<?php
}
function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <a href="<?php echo htmlspecialchars($url); ?>"><?php echo htmlspecialchars($name); ?></a><br />
<?php
}
function display_categories($cat_array) {
  if (!is_array($cat_array)) {
     echo "<p>No categories currently available</p>";
     return;
  }
  echo "<ul>";
  foreach ($cat_array as $row)  {
    $url = "show_cat.php?catid=".urlencode($row['catid']);
    $title = $row['catname'];
    echo "<li>";
    do_html_url($url, $title);
    echo "</li>";
  }
  echo "</ul>";
  echo "<hr />";
}
function display_mu_items($mu_item_array) {
  //display all items in the array passed in
  if (!is_array($mu_item_array)) {
    echo "<p>No items currently available in this category</p>";
  } else {
    //create table
    echo "<table width=\"100%\" border=\"0\">";
    //create a table row for each item
    foreach ($mu_item_array as $row) {
      $url = "show_mu_item.php?upc=" . urlencode($row['upc']);
      echo "<tr><td>";
      if (@file_exists("images/{$row['upc']}.jpg")) {
        $title = "<img src=\"images/". htmlspecialchars($row['upc']) . ".jpg\"
                  style=\"border: 1px solid black\"/>";
        do_html_url($url, $title);
      } else {
        echo "&nbsp;";
      }
      echo "</td><td>";
      $title = htmlspecialchars($row['title']) . " by " . htmlspecialchars($row['brand']);
      do_html_url($url, $title);
      echo "</td></tr>";
    }
    echo "</table>";
  }
  echo "<hr />";
}
function display_mu_item_details($mu_item) {
  // display all details about this book
  if (is_array($mu_item)) {
    echo "<table><tr>";
    //display the picture if there is one
    if (@file_exists("images/{$mu_item['upc']}.jpg"))  {
      $size = GetImageSize("images/{$mu_item['upc']}.jpg");
      if(($size[0] > 0) && ($size[1] > 0)) {
        echo "<td><img src=\"images/".htmlspecialchars($mu_item['upc']).".jpg\"
              style=\"border: 1px solid black\"/></td>";
      }
    }
    echo "<td><ul>";
    echo "<li><strong>Brand:</strong> ";
    echo htmlspecialchars($mu_item['brand']);
    echo "</li><li><strong>UPC:</strong> ";
    echo htmlspecialchars($mu_item['upc']);
    echo "</li><li><strong>Our Price:</strong> ";
    echo number_format($mu_item['price'], 2);
    echo "</li><li><strong>Description:</strong> ";
    echo htmlspecialchars($mu_item['description']);
    echo "</li></ul></td></tr></table>";
  } else {
    echo "<p>The details of this item cannot be displayed at this time.</p>";
  }
  echo "<hr />";
}

 
function display_login_form() {
  // dispaly form asking for name and password
?>
 <form method="post" action="admin.php">
 <table bgcolor="#cccccc">
   <tr>
     <td>Username:</td>
     <td><input type="text" name="username"/></td></tr>
   <tr>
     <td>Password:</td>
     <td><input type="password" name="passwd"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="Log in"/></td></tr>
   <tr>
 </table></form>
<?php
}
function display_admin_menu() {
?>
<br />

<a href="insert_mu_form_form.php">Add a new item</a><br />
<a href="change_password_form.php">Change admin password</a><br />
<?php
}
function display_button($target, $image, $alt) {
  echo "<div align=\"center\"><a href=\"".htmlspecialchars($target)."\">
          <img src=\"images/".htmlspecialchars($image).".gif\"
           alt=\"".htmlspecialchars($alt)."\" border=\"0\" height=\"50\"
           width=\"135\"/></a></div>";
}
function display_button_png($target, $image, $alt) {
  echo "<div align=\"center\"><a href=\"".htmlspecialchars($target)."\">
          <img src=\"images/".htmlspecialchars($image).".png\"
           alt=\"".htmlspecialchars($alt)."\" border=\"0\" height=\"50\"
           width=\"135\"/></a></div>";
}
function display_form_button($image, $alt) {
  echo "<div align=\"center\"><input type=\"image\"
           src=\"images/".htmlspecialchars($image).".gif\"
           alt=\"".htmlspecialchars($alt)."\" border=\"0\" height=\"50\"
           width=\"135\"/></div>";
}
?>