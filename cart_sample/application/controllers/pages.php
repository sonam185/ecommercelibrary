<?php

class Pages extends CI_Controller {

	public function pages()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('cart');
		$this->load->library('session');
		
	}

	public function show_items()
	{
		$data['name'] = $this->input->post('name');
	
		$this->load->view('show_details',$data);

	}
		
	public function add_to_cart()
	{ 
		$id = $this->input->post('id');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$item_data = array(
							'id' => $id,
							'qty' => 1,
							'name' => $name,
							'price' => (int)$price
						 );
			$this->cart->insert($item_data);
			$this->show_cart();
	
	}

	public function show_cart()
	{
		$data['items'] = $this->cart->contents();
		$this->load->view('show_cart',$data);


	}

	public function delete_items($rowid)
	{
		$data = array("rowid" => $rowid,'qty' => 0);
		$this->cart->update($data);		
		
		redirect("pages/show_cart");exit;
		
	}
	
	public function destroy_cart()
	{
	 	$this->cart->destroy();
	 	if($this->cart->total_items() == 0){
	 		
	 		redirect("pages/show_cart");
	 	}
	}

	public function checkout()
	{
	 	$amount['total']=$this->cart->total();
	 	$amount['contents']=$this->cart->contents();
	 	$amount['items']=$this->cart->total_items();
	 		if($_POST['payment_method'] == 'paypal')
	 			$this->load->view('paypal',$amount);
	 		else
	 			$this->load->view('authorize',$amount);
	 		
	}

	public function paypal()
	{
	 	// PayPal settings
		$paypal_email = 'info-facilitator@softe.us';
		$return_url = base_url()."/index.php/pages/paypal";
		$cancel_url = base_url()."/index.php/pages/Cancelled";
		$notify_url = base_url()."/index.php/pages/paypal";

		$item_name = 'Test Item';
		$item_amount = 5.00;

		
		// Check if paypal request or response
			if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"]))
			{

				// Firstly Append paypal account to querystring
				$querystring .= "?business=".urlencode($paypal_email)."&";	
	
				// Append amount& currency (£) to quersytring so it cannot be edited in html
	
				//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
				$querystring .= "item_name=".urlencode($item_name)."&";
				$querystring .= "amount=".urlencode($item_amount)."&";
	
				//loop for posted values and append to querystring
				foreach($_POST as $key => $value){
					$value = urlencode(stripslashes($value));
					$querystring .= "$key=$value&";
				}
	
				// Append paypal return addresses
				$querystring .= "return=".urlencode(stripslashes($return_url))."&";
				$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
				$querystring .= "notify_url=".urlencode($notify_url);
	
				// Append querystring with custom field
				//$querystring .= "&custom=".USERID;
	
				// Redirect to paypal IPN
				header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
				exit();

			}
			else{
					// Response from Paypal
					// read the post from PayPal system and add 'cmd'
					$req = 'cmd=_notify-validate';
					foreach ($_POST as $key => $value) {
						$value = urlencode(stripslashes($value));
						$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
						$req .= "&$key=$value";
					}

					// assign posted variables to local variables
					$data['item_name']			= $_POST['item_name'];
					$data['item_number'] 		= $_POST['item_number'];
					$data['payment_status'] 	= $_POST['payment_status'];
					$data['payment_amount'] 	= $_POST['mc_gross'];
					$data['payment_currency']	= $_POST['mc_currency'];
					$data['txn_id']				= $_POST['txn_id'];
					$data['receiver_email'] 	= $_POST['receiver_email'];
					$data['payer_email'] 		= $_POST['payer_email'];
					$data['custom'] 			= $_POST['custom'];
		
					//print_r($data);
	 				//echo 'hi';die();
					// post back to PayPal system to validate
					$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
					$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
					$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	
					$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);	
	
						if (!$fp) {
								// HTTP ERROR
						} 
						else {	

								fputs ($fp, $header . $req);
								while (!feof($fp)) {
								$res = fgets ($fp, 1024);
									if (strcmp($res, "VERIFIED") == 0) {
				
										// Used for debugging
										//@mail("you@youremail.com", "PAYPAL DEBUGGING", "Verified Response<br />data = <pre>".print_r($post, true)."</pre>");
										// Validate payment (Check unique txnid & correct price)
										//$valid_txnid = check_txnid($data['txn_id']);
										//$valid_price = check_price($data['payment_amount'], $data['item_number']);

										$valid_txnid = $data['txn_id'];
										$valid_price = $data['payment_amount'];
										// PAYMENT VALIDATED & VERIFIED!
										if($valid_txnid && $valid_price){
									 		$orderid = $this->updatePayments($data);
											if($orderid){					
												// Payment has been made & successfully inserted into the Database								
											}
											else{								
												// Error inserting into DB
												// E-mail admin or alert user
											}
										}
										else{					
										// Payment made but data has been changed
										// E-mail admin or alert user
										}						
			
									}
									else if (strcmp ($res, "INVALID") == 0) {
			
									// PAYMENT INVALID & INVESTIGATE MANUALY! 
									// E-mail admin or alert user
				
									// Used for debugging
									//@mail("you@youremail.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
									}
									
									
								}
								fclose ($fp);
								
								$this->load->view('show_data',$data);
								
 							}	
				}
		 	}


	public function updatePayments($data)
	{	
    	//global $link;
		if(is_array($data)){	
			
        	$this->db->insert('payment',$data);
        	
       	}
	}

	public function authorize()
	{

		$this->load->library('authorize_net');

		$auth_net = array(
                        'x_card_num'  	=> $_POST['card_number'], // Visa
                        'x_exp_date'  	=> $_POST['expiry_date'],
                        'x_card_code'   => $_POST['cvv'],
                        'x_description' => 'A test transaction',
                        'x_amount'      => $_POST['total'] ,
                        'x_first_name'  => $_POST['name_on_card'] ,
                        'x_last_name'   => 'Doe',
                        'x_address'     => '123 Green St.',
                        'x_city'        => 'Lexington',
                        'x_state'       => 'KY',
                        'x_zip'       	=> '40502',
                        'x_country'     => 'US',
                        'x_phone'      	=> '555-123-4567',
                        'x_email'       => 'test@example.com',
                        'x_customer_ip' => $this->input->ip_address(),
                        );
		  	
                $this->authorize_net->setData($auth_net);
				
		if( $this->authorize_net->authorizeAndCapture() )
        {
          
        	$this->load->view('success');
        }
        else
        {
           
        	$this->load->view('failure');
        }
		
	}

	

	public function logout(){
		$this->session->sess_destroy(true);
		redirect('pages/show_items');
	}
	
}
?>
