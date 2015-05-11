<?php
// Configuration options
	$config['stripe_key_test_public']  = 'pk_test_iPsbqwtp1HXjrPLToiUAXgg3';
	$config['stripe_key_test_secret']  ='sk_test_FUDlaHrHvya5V0DO6i0SSns8';
	$config['stripe_key_live_public']  = '';
	$config['stripe_key_live_secret']  = '';
	$config['stripe_test_mode']     = TRUE;
	$config['stripe_verify_ssl']    = FALSE;

	// Create the library object
	$stripe = new Stripe( $config );

	// Run the required operations
	echo"<pre>";
	echo $stripe->customer_list();
	?>
