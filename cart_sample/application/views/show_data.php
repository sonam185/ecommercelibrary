<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css" media="screen">
<link href="<?php echo base_url();?>css/bootstrap-theme.css" rel="stylesheet" media="screen">
<?php $add = base_url()."index.php/pages/logout";
?>
<div class="container">
	<div class="well">
		<table border="0" align="center" width="500">
			<tr style="font-size:24px">
				<th>Contents</th>
				<th>Values</th>
			</tr>
			<tr>
				<td>
					<label>Item Name</label>
				</td>
				<td>
					<?php echo $item_name; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Item Number</label>
				</td>
				<td>
					<?php echo $item_number; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Payment Status</label>
				</td>
				<td>
					<?php echo $payment_status; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Payment Amount</label>
				</td>
				<td>
					<?php echo $payment_amount; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Payment Currency</label>
				</td>
				<td>
					<?php echo $payment_currency; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Transaction Id</label>
				</td>
				<td>
					<?php echo $txn_id; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Receiver Email</label>
				</td>
				<td>
					<?php echo $receiver_email; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Payer Email</label>
				</td>
				<td>
					<?php echo $payer_email; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Custom</label>
				</td>
				<td>
					<?php echo $custom; ?>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="<?php echo $add;?>"><button class="btn btn-info">Back</button></a>
				</td>
			</tr>
		</table>
	</div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>