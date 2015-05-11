<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css" media="screen">
<link href="<?php echo base_url();?>css/bootstrap-theme.css" rel="stylesheet" media="screen">
<?php $add = base_url()."index.php/pages/logout";
?>
<div class="container">
	<div class="well">
		<center>
		<?php
			echo '<h2>Success!</h2>';
			echo '<p>Transaction ID: ' . $this->authorize_net->getTransactionId() . '</p>';
			echo '<p>Approval Code: ' . $this->authorize_net->getApprovalCode() . '</p>';
		?>
		
			<a href="<?php echo $add;?>"><button class="btn btn-info">Back</button></a>
		</center>
				
	</div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>