<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/paranoia1906/
 * @since      1.0.0
 *
 * @package    Wp_Pbf
 * @subpackage Wp_Pbf/admin/partials
 */
?>

<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include (plugin_dir_path(dirname(__DIR__)) . 'includes/wp-pbf-functions.php');
?>

<div class="row header-row">WordPress - Print Basic Facts</div>
<div class="row"> <!-- Row is for the basic facts cards. -->
  <div class="col s4"> <!-- 1st col -->
    <div class="function-block-container card hoverable z-depth-3">
      <span class="CpyConStrSoftware">
        <?php //open php block for info card.
        $conStringsArray = pbf_connection_strings();
        printf("<p class='card-heading'><b>Connection Strings</b></p><br />
              <b>Database Name: </b>%s<br />
              <b>Database User: </b>%s<br />
              <b>Database Password: </b> <span style='display: none;' id='passSpan'>%s</span><span id='fassSpan'> ******** </span><br />
              <b>Database Host: </b>%s<br />
              <b>Database Port: </b>%s<br />", 
              $conStringsArray[0],$conStringsArray[1],
              $conStringsArray[2],$conStringsArray[3],
              $conStringsArray[4]);

        $softwareArray = pbf_software_versions();
        printf("<p class='card-heading'><b>Software</b></p><br />
              <b>Current PHP Version: </b>%s<br />
              <b>Current WP Version: </b>%s<br />
              <b>Current DB Version: </b>%s<br />
              <b>PHP Sepcified OS: </b>%s<br />", 
              $softwareArray[0], $softwareArray[1], 
              $softwareArray[2], $softwareArray[3]); 
        ?> <!--Closing php block for info card -->
      </span>
      <label><input type="checkbox" id="passCheckBox" onclick="passToggle()">Show Password</label>
    </div>
    <button class="btn cpy-button waves-effect waves-yellow blue darken-2" data-clipboard-target=".CpyConStrSoftware"><i class="fa fa-clipboard"></i> Copy </button>
   </div> <!-- End 1st col -->
  <div class="col s4"> <!-- 2nd col -->
    <div class="function-block-container card hoverable z-depth-3">
      <span id="CpyWpElements"><?php 
      $wpDefinedArray = pbf_install_defined();
      printf("<p class='card-heading'><b>WordPress Defined</b></p><br />
            <b>WP Defined Absolute Path: </b>%s<br />
            <b>Current Wp-Content Dir: </b>%s<br />
            <b>Current Template (Theme): </b>%s<br />
            <b>Current Stylesheet (Child): </b>%s<br />
            <b>Current Upload_Path: </b>%s<br /><br />

            <b>Force_Ssl_Admin Status: </b>%s<br />
            <b>Disallow_File_Edit Status: </b>%s<br />
            <b>Wp_Debug Status: </b>%s<br />
            <b>Admin_Email: </b>%s<br />", 
            //Do not change array key order. 
            //Instead adjust value of keys at /includes/wp-pbf-functions.php.
            $wpDefinedArray[0],$wpDefinedArray[1],$wpDefinedArray[2],
            $wpDefinedArray[3],$wpDefinedArray[4],$wpDefinedArray[5],
            $wpDefinedArray[6],$wpDefinedArray[7],$wpDefinedArray[8]);
      ?>
      </span>
    </div>
    <button class="btn cpy-button waves-effect waves-yellow blue darken-2" data-clipboard-target="#CpyWpElements"><i class="fa fa-clipboard"></i> Copy </button>
  </div> <!-- End 2nd col -->
  <div class="col s4"> <!-- 3rd col -->
    <div class="function-block-container card hoverable z-depth-3">     
      <textarea placeholder="Use This Area For Notes" rows="14" id="info-block-textarea"></textarea>
    </div>    
    <button class="btn cpy-button waves-effect waves-yellow blue darken-2" data-clipboard-target="#info-block-textarea"><i class="fa fa-clipboard"></i> Copy </button>
  </div><!-- End 3rd col -->
</div> <!-- Close of the first row here -->

<div class="row"> <!-- This row will containt the collapasable accordian. -->
  <ul class="collapsible" data-collapsible="accordion">
    <li> <!-- Start of htaccess content  -->
      <div class="collapsible-header"> .htaccess</div> 
      <div class="collapsible-body">
        <span><pre><?php echo pbf_highlight_number(ABSPATH . '.htaccess');?></pre></span>
      </div> <!-- Close Colpasable Body -->
    </li> <!-- End htaccess content block -->

    <li> <!-- beginning of wp config content -->
      <div class="collapsible-header"> wp-config.php</div>
      <div class="collapsible-body">
        <span><pre><?php pbf_highlight_number(ABSPATH . 'wp-config.php'); ?></pre></span>
      </div> <!-- Close Colpasable Body -->
    </li> <!-- close of wp config content -->

    <li> <!-- Beginning of page and post block -->
      <div class="collapsible-header"> Pages / Posts </div>
      <div class="collapsible-body">
        <div class="row"> <!-- Row under a colapsable body so we can split the container -->
          <div class="col s6"> <!-- Left is pages -->
            <p>All Published Pages: <hr /></p>
            <?php echo pbf_page_ids();?>
          </div>
          <div class="col s6"> <!-- Right is posts -->
            <p>All Published Posts: <hr /></p>
            <?php echo pbf_post_ids();?>
          </div> 
        </div> <!-- Close of row to devide collapsible -->
      </div> <!-- Close Colpasable Body -->
    </li> <!-- Close of page and post block -->

    <li> <!-- Begin admin users / users count block -->
      <div class="collapsible-header"> Admin Users / All Users</div>
      <div class="collapsible-body">
        <div class="row"> <!-- Row under a colapsable body so we can split the container -->
          <div class="col s6"> <!-- Left is admin users list -->
            <?php echo pbf_admin_users();?>
          </div>
            <div class="col s6"> <!-- Right is total users count -->
              <?php 
              printf("Total Users Count: %s",pbf_user_count());
              ?>
            </div>
        </div> <!-- Close of row to devide collapsible -->
      </div> <!-- Close Colpasable Body -->
    </li> <!-- End admin users / user count blocks -->

    <li> <!-- Active Plugins Block Start + database contents-->
      <div class="collapsible-header"> Active Plugins / Database Contents</div>
      <div class="collapsible-body">
        <div class="row">
          <div class="col s6">
            <?php echo pbf_active_plugins_list();?>
          </div>
          <div class="col s6">
            <span id="CpyPluginsDatabase"><?php echo pbf_active_plugins_value();?></span>
            <p>Click Below To Copy The option_value For active_plugins Within Current Database</p>
            <button class="btn cpy-button waves-effect waves-yellow black" data-clipboard-target="#CpyPluginsDatabase"><i class="fa fa-clipboard"></i> Copy </button>
          </div>
        </div> <!-- Close of row to devide collapsible -->
      </div> <!-- Close Colpasable Body -->
    </li> <!-- End of Active Plugins Block Start + database contents-->

    <li> <!--Install Dir Contents Block -->
      <div class="collapsible-header"> Installed Directory Contents - <?php echo ABSPATH;?></div>
      <div class="collapsible-body"><span><?php echo pbf_read_install_dir();?></span></div>
    </li> <!-- End Install Dir Contents Block -->

    <li> <!-- Begin Inode Counter Loop Block -->
      <div class="collapsible-header"> WordPress File Count, File System Information, and Database Size</div>
      <div class="collapsible-body">
        <div class="center"> <!-- Creating the table with classes necessary for custom aesthetics. -->
          <table class='tableclass' style='width:100%'><tr class='tablerow'><th class='tablehead'>File Path Inspected</th><th class='tablehead'>Inode Count / File Count</th><th class='tablehead'>Total Size In Megabytes</th></tr>
            <?php 
              echo pbf_get_file_size(ABSPATH); // Running pbf_get_file_size against complete install
              echo pbf_get_file_size(WP_CONTENT_DIR); // Running pbf_get_file_size against content directory
              echo pbf_get_file_size(WP_PLUGIN_DIR); // Running pbf_get_file_size against plugins
              echo pbf_get_file_size(WP_CONTENT_DIR.DIRECTORY_SEPARATOR.'uploads'); // Running pbf_get_file_size against a default uploads folder location
              echo ("</table>"); // Closing the table from the start of the span. 
              echo pbf_database_size_query(); //pbf_database_size_query will create its own new table to use.
            ?>
        </div> <!-- Close of center class div -->
      </div> <!-- Close Colpasable Body -->
    </li> <!-- End Inode Counter Loop Block -->

    <li> <!-- Searchable info script -->
      <div class="collapsible-header"> PHP Info Script - CTRL + F Searchable</div>
      <div class="collapsible-body info-block">
        <?php echo pbf_php_info();?>
      </div> <!-- Close Colpasable Body -->
    </li><!-- End of php info script -->
  </ul> <!-- close unorderd list for colapsable accordian  -->
</div> <!-- close the row -->