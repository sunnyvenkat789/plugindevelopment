<?php

require( '../../../wp-load.php' );

	global $wpdb;

if (($_POST['hippo_email']!="")){
	$hippo_email = $_POST['hippo_email'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$street = $_POST['street'];
	$unit = $_POST['unit'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip_code = $_POST['zip_code'];
	$date_of_birth = $_POST['date_of_birth'];
	$date_of_birth1 = date('Y-m-d',strtotime($date_of_birth));
	$phone = $_POST['phone'];
	$house_type = $_POST['house_type'];
	$curl = curl_init();
 $api_url = get_option("api_url");
 $auth_code = get_option("auth_code");
 curl_setopt_array($curl, array(
   CURLOPT_URL => $api_url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => "{ \n  id:\"\",\n  street: \"$street\",\n  city: \"$city\",\n  state: \"$state\",\n  zip: \"$zip_code\",\n  first_name: \"$first_name\",\n  last_name: \"$last_name\",\n  email: \"$hippo_email\",\n  phone: \"$phone\",\n  date_of_birth: \"$date_of_birth\" }",
   CURLOPT_HTTPHEADER => array(
     'auth_token: ' . $auth_code,
	 "cache-control: no-cache",
	 "content-type: application/json",
   ),
 ));
 
 $response = curl_exec($curl);
 $err = curl_error($curl);
 
 curl_close($curl);
 
 if ($err) {
   echo "cURL Error #:" . $err;
 } else {
   echo $response; 
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