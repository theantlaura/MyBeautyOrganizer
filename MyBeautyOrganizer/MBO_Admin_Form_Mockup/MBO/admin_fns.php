<?php
// This file contains functions used by the admin interface
// for the Book-O-Rama shopping cart.
function display_category_form($category = '') {
// This displays the category form.
// This form can be used for inserting or editing categories.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_category.php.
// To update, pass an array containing a category.  The
// form will contain the old data and point to update_category.php.
// It will also add a "Delete category" button.
  // if passed an existing category, proceed in "edit mode"
  $edit = is_array($category);
  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>
  <form method="post"
      action="<?php echo $edit ? 'edit_category.php' : 'insert_category.php'; ?>">
  <table border="0">
  <tr>
    <td>Category Name:</td>
    <td><input type="text" name="catname" size="40" maxlength="40"
          value="<?php echo htmlspecialchars($edit ? $category['catname'] : ''); ?>" /></td>
   </tr>
  <tr>
    <td <?php if (!$edit) { echo "colspan=2";} ?> align="center">
      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"catid\" value=\"". htmlspecialchars($category['catid'])."\" />";
         }
      ?>
      <input type="submit"
       value="<?php echo $edit ? 'Update' : 'Add'; ?> Category" /></form>
     </td>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "<td>
                <form method=\"post\" action=\"delete_category.php\">
                <input type=\"hidden\" name=\"catid\" value=\"". htmlspecialchars($category['catid'])."\" />
                <input type=\"submit\" value=\"Delete category\" />
                </form></td>";
       }
     ?>
  </tr>
  </table>
<?php
}
function display_mu_item_form($mu_item = '') {
// This displays the item form.
// It is very similar to the category form.
// This form can be used for inserting or editing items.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_mu_item.php.
// To update, pass an array containing a book.  The
// form will be displayed with the old data and point to update_mu_item.php.
// It will also add a "Delete item" button.
  // if passed an existing item, proceed in "edit mode"
  $edit = is_array($mu_item);
  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>
  <form method="post"
        action="<?php echo $edit ? 'edit_mu_item.php' : 'insert_mu_item.php';?>">
  <table border="0">
  <tr>
    <td>UPC:</td>
    <td><input type="text" name="upc"
         value="<?php echo htmlspecialchars($edit ? $mu_item['upc'] : ''); ?>" /></td>
  </tr>
  <tr>
    <td>Item Name:</td>
    <td><input type="text" name="name"
         value="<?php echo htmlspecialchars($edit ? $mu_item['item_name'] : ''); ?>" /></td>
  </tr>
  <tr>
    <td>Brand:</td>
    <td><input type="text" name="brand"
         value="<?php echo htmlspecialchars($edit ? $mu_item['brand'] : ''); ?>" /></td>
   </tr>
   <tr>
      <td>Category:</td>
      <td><select name="catid">
      <?php
          // list of possible categories comes from database
          $cat_array=get_categories();
          foreach ($cat_array as $thiscat) {
               echo "<option value=\"".htmlspecialchars($thiscat['catid'])."\"";
               // if existing book, put in current catgory
               if (($edit) && ($thiscat['catid'] == $mu_item['catid'])) {
                   echo " selected";
               }
               echo ">".htmlspecialchars($thiscat['catname'])."</option>";
          }
          ?>
          </select>
        </td>
   </tr>
   <tr>
    <td>Price:</td>
    <td><input type="text" name="price"
               value="<?php echo htmlspecialchars($edit ? $mu_item['price'] : ''); ?>" /></td>
   </tr>
   <tr>
     <td>Description:</td>
     <td><textarea rows="3" cols="50"
          name="description"><?php echo htmlspecialchars($edit ? $mu_item['description'] : ''); ?></textarea></td>
    </tr>
    <tr>
      <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"oldupc\"
                    value=\"".htmlspecialchars($book['isbn'])."\" />";
         ?>
        <input type="submit"
               value="<?php echo $edit ? 'Update' : 'Add'; ?> Item" />
        </form></td>
        <?php
           if ($edit) {
             echo "<td>
                   <form method=\"post\" action=\"delete_mu_item.php\">
                   <input type=\"hidden\" name=\"upc\"
                    value=\"".htmlspecialchars($book['upc'])."\" />
                   <input type=\"submit\" value=\"Delete Item\"/>
                   </form></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>
<?php
}
function display_password_form() {
// displays html change password form
?>
   <br />
   <form action="change_password.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Old password:</td>
       <td><input type="password" name="old_passwd" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>New password:</td>
       <td><input type="password" name="new_passwd" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Repeat new password:</td>
       <td><input type="password" name="new_passwd2" size="16" maxlength="16" /></td>
   </tr>
   <tr><td colspan=2 align="center"><input type="submit" value="Change password">
   </td></tr>
   </table>
   <br />
<?php
}
function insert_category($catname) {
// inserts a new category into the database
   $conn = db_connect();
   // check category does not already exist
   $query = "select *
             from categories
             where catname='".$conn->real_escape_string($catname)."'";
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }
   // insert new category
   $query = "insert into categories values
            ('', '".$conn->real_escape_string($catname)."')";
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}
function insert_mu_item($upc, $name, $brand, $catid, $price, $description) {
// insert a new item into the database
   $conn = db_connect();
   // check item does not already exist
   $query = "select *
             from mu_items
             where upc='".$conn->real_escape_string($upc)."'";
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }
   // insert new item
   $query = "insert into mu_items values
            ('".$conn->real_escape_string($upc) ."', '". $conn->real_escape_string($brand) . 
             "', '". $conn->real_escape_string($name) ."', '". $conn->real_escape_string($catid) . 
              "', '". $conn->real_escape_string($price) ."', '" . $conn->real_escape_string($description) ."')";
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}
function update_category($catid, $catname) {
// change the name of category with catid in the database
   $conn = db_connect();
   $query = "update categories
             set catname='".$conn->real_escape_string($catname) ."'
             where catid='".$conn->real_escape_string($catid) ."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}
function update_mu_item($oldupc, $upc, $name, $brand, $catid,
                     $price, $description) {
// change details of item stored under $oldupc in
// the database to new details in arguments
   $conn = db_connect();
   $query = "update books
             set upc= '".$conn->real_escape_string($upc)."',
             item_name = '".$conn->real_escape_string($name)."',
             brand = '".$conn->real_escape_string($brand)."',
             catid = '".$conn->real_escape_string($catid)."',
             price = '".$conn->real_escape_string($price)."',
             description = '".$conn->real_escape_string($description)."'
             where upc = '".$conn->real_escape_string($oldupc)."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}
function delete_category($catid) {
// Remove the category identified by catid from the db
// If there are items in the category, it will not
// be removed and the function will return false.
   $conn = db_connect();
   // check if there are any items in category
   // to avoid deletion anomalies
   $query = "select *
             from mu_items
             where catid='".$conn->real_escape_string($catid)."'";
   $result = @$conn->query($query);
   if ((!$result) || (@$result->num_rows > 0)) {
     return false;
   }
   $query = "delete from categories
             where catid='".$conn->real_escape_string($catid)."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}
function delete_mu_item($upc) {
// Deletes the item identified by $upc from the database.
   $conn = db_connect();
   $query = "delete from mu_items
             where upc='".$conn->real_escape_string($upc)."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}
?>