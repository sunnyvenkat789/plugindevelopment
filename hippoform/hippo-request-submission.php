<?php

require( '../../../wp-load.php' );

	global $wpdb;
if (($_POST['hippo_email']!="")){
	$hippo_email = $_POST['hippo_email'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$street = $_POST['street'];
	$street = str_replace(' ', '%20', $street);
	$unit = $_POST['unit'];
	$city = $_POST['city'];
	$city = str_replace(' ', '%20', $city);
	$state = $_POST['state'];
	$zip_code = $_POST['zip_code'];
	$date_of_birth = $_POST['date_of_birth'];
	$date_of_birth1 = date('dmY',strtotime($date_of_birth));
	$phone = $_POST['phone'];
	$house_type = $_POST['house_type'];
	$curl = curl_init();
 $api_url = get_option("api_url");
 $auth_code = get_option("auth_code");
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $api_url.'?auth_token='.$auth_code.'&street='.$street.'&city='.$city.'&zip='.$zip_code.'&first_name='.$first_name.'&last_name='.$last_name.'&email='.$hippo_email.'&phone='.$phone.'&state='.$state.'&date_of_birth='.$date_of_birth1,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	$result = json_decode($response, true);
	echo 'Quote Premium: ' . $result['quote_premium'] . '<br />';
 
}
 
  $tablename = $wpdb->prefix."hippo_request";
	$wpdb->insert(
		$tablename,
		array(
		        
		        'first_name'=>$first_name,
				'middle_name' => $middle_name,
				'last_name' => $last_name,
				'email'=>$hippo_email,
				'phone' => $phone,
				'street' => $street,
				'city' => $city,
				'state' => $state,
				'unit' => $unit,
				'date_of_birh' => $date_of_birth1,
				'zip_code' => $zip_code,
				'house_type' => $house_type,
				'Submit_Time' => current_time( 'mysql' ), 
			),
		array( '%s','%s' )
	 );

	echo "<span style='color:green; font-weight:bold;'>
	We received your request. Thank you for your submission.
	</span>";

}



?>
