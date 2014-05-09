<?php

  function edex_admin_menu() {
    add_submenu_page('themes.php',
      'Site Options', 'Site Options', 'manage_options',
      'edex-settings', 'edex_settings');

      // Check that the user is allowed to update options
      if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page. Thanks.');
      }
  }

  function edex_settings() {
    // SAVE THE FORM
    if (isset($_POST["update_settings"])) {
      $feedback_text = stripslashes($_POST["edex_book_copy"]);
      update_option("edex_book_copy", $feedback_text);
      echo '<div id="message" class="updated"><p>Settings saved</p></div>';
    }


    ?>
    <div class="wrap">
      <?php screen_icon('themes'); ?>
      <h2>Site Options</h2>

      <form method="POST" action="">
        <input type="hidden" name="update_settings" value="Y" />
        <table class="form-table">
          <tr valign="top">
            <th scope="row">
              <label for="edex_book_copy">
                Book Copy
              </label>
            </th>
            <td>
              <textarea name="edex_book_copy" rows="8" cols="40"><?php echo stripslashes(get_option("edex_book_copy")); ?></textarea>
            </td>
          </tr>
        </table>
        <p><input type="submit" value="Save settings" class="button-primary"/></p>
      </form>

    </div>

  <?php
  }




  // This tells WordPress to call the function named "setup_theme_admin_menus"
  // when it's time to create the menu pages.
  add_action("admin_menu", "edex_admin_menu");

?>
