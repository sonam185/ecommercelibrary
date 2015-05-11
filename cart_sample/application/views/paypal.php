<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css" media="screen">
<link href="<?php echo base_url();?>css/bootstrap-theme.css" rel="stylesheet" media="screen">

<div class="container">
    <div class="well">
<label align="left"><b>Payment Methods:</b></label><BR><BR>
<label align="left"><b class="text-primary">Pay Via Paylal:</b></label>
<table border="0" align="center" height="200px" width="350px">
    <tr><td><b>Your Total Purchased Items Are:</b></td>
        <td><?php echo $items;?></td>
    </tr>
    <tr>
        <td><b>Tatal Amount:</b></td>
        <td> $<?php echo $total; ?>&nbsp;(USD)</td>
    </tr>
    
</table>



<?php 

$act = base_url()."index.php/pages/paypal"; ?>
<form class="paypal" action="<?php echo $act; ?>" method="post" id="paypal_form">    
	<input type="hidden" name="cmd" value="_xclick" /> 
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="lc" value="USA" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
    <input type="hidden" name="first_name" value="Customer's First Name"  />
    <input type="hidden" name="last_name" value="Customer's Last Name"  />
    <input type="hidden" name="payer_email" value="customer@example.com"  />
    <input type="hidden" name="item_number" value="<?php rand(0,9); ?>" / >
    <input type="hidden" name="amount" value="<?php echo $total; ?>">
    <center>
        <button class="btn btn-success" type="submit" value="Submit Payment">Submit Payment</button>
    </center>
</form>
</div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
