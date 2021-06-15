<?php
/**
 * Plugin Name: Hippo Form
 * Plugin URI: 
 * Description: Just Hippo Request Form Plugin.
 * Version: 1.0
 * Author: 
 * Author URI: 
 */
 
 
 // Add Admin Menu
function hippo_add_menu() {
	add_menu_page("Hippo Request", "Hippo Request","manage_options", "hippo-request", "hippo_request_page");
	add_submenu_page( "hippo-request","API Settings", "API Settings","manage_options",  'api-setting', 'api_setting_page', 'dashicons-groups', 6 );
    add_submenu_page( "hippo-request","All Requests", "All Requests","manage_options",  'allRequests', 'entries_api_request_page', 'dashicons-groups', 6 );
}
add_action("admin_menu", "hippo_add_menu");


// Add Style Sheet 
add_action( 'wp_enqueue_scripts', 'stylesheet');
function stylesheet() {
    wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) .'css/style.css' );
          
}

// Create a new table
function api_request_table(){

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $tablename = $wpdb->prefix."hippo_request";

  $sql = "CREATE TABLE $tablename (
  id mediumint(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(80) NOT NULL,
  middle_name varchar(80) NOT NULL,
  last_name varchar(80) NOT NULL,
  email varchar(80) NOT NULL,
  phone varchar(80) NOT NULL,
  street varchar(80) NOT NULL,
  city varchar(80) NOT NULL,
  state varchar(80) NOT NULL,
  unit varchar(80) NOT NULL,
  date_of_birh  date DEFAULT '0000-00-00' NOT NULL,
  zip_code varchar(80) NOT NULL,
  house_type varchar(80) NOT NULL,
  Submit_Time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  PRIMARY KEY  (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

}
register_activation_hook( __FILE__, 'api_request_table' );

function hippo_request_page()
{
?>
<div class="wrap">
	<div class="shortcode-block">This is Short Code : [hippo_request_form]</div>
</div>
 
<?php
}
 
add_shortcode('hippo_request_form' , 'render_hippo_request_form');
function render_hippo_request_form(){ 
$default_atts = array(
'recaptcha_option' => '',
);
$params = shortcode_atts( $default_atts, $atts );
global $content;
    ob_start();
    include('hippo-request-form-fields.php');
    $output = ob_get_clean();
    return $output;

}

function api_setting_page() { 

$api_url = "api_url";
$auth_code = "auth_code";
 
if(isset($_POST["submit"])){ 
    $api_url1 = $_POST[$api_url];
    update_option($api_url, $api_url1);
    $auth_code1 = $_POST[$auth_code];
    update_option($auth_code, $auth_code1);
     
    echo '<div id="message" class="updated fade"><p>Options Updates</p></div>';
}
else{
    $api_url1 = get_option($api_url);
    $auth_code1 = get_option($auth_code);
}
?>
<div class="wrap">
<?php screen_icon(); ?>
<h2>API Settings</h2>
<br />
<br />
<div class="Recaptcha-fields-block">
    <fieldset>
            
        <form method="post" action=""> 
            <span> API Url </span><input type="text" name="<?php echo $api_url; ?>" value="<?php echo $api_url1 ?>" /> 
            <br /><br />
            <span > Auth Code </span><input type="text" name="<?php echo $auth_code; ?>" value="<?php echo $auth_code1 ?>" /> 
            <p><input type="submit" value="Save" class="button button-primary" name="submit" /></p>
        </form>
    </fieldset>        
</div><?php }


function entries_api_request_page() {
 echo '<div class="contact-list-data">';
$ajax_url = admin_url('admin-ajax.php?action=csv_pull');

 global $wpdb;
 
  $tablename = $wpdb->prefix."hippo_request";
  
$results = $wpdb->get_results( "SELECT * FROM $tablename ORDER BY id DESC");

echo '<table class="member-table" cellpadding="0" cellspacing="0"><tr><th>First Name</th><th>Last Name </th><th>Email </th><th>Phone</th><th>Street Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Date</th></tr>';
foreach($results as $data){
		echo '<tr><td>'.$data->first_name.'</td><td>'.$data->last_name.'</td><td>'.$data->email.'</td><td>'.$data->phone.'</td><td>'.$data->street.'</td><td>'.$data->city.'</td><td>'.$data->state.'</td><td>'.$data->zip_code.'</td><td>'. date('Y-m-d g:i a',strtotime($data->Submit_Time)) .'  </td></tr>';
}
echo '</table>';
echo '</div>';
}


function myadmin_stylesheet_1() {
   wp_enqueue_style( 'admin_css', plugin_dir_url( __FILE__ ) . 'css/admin.css' );
}
add_action('admin_head', 'myadmin_stylesheet_1' );