<link rel="stylesheet" type="text/css" href=" <?php echo base_url();?>css/bootstrap.min.css" media="screen">
<link href="<?php echo base_url();?>css/bootstrap-theme.css" rel="stylesheet" media="screen">
<?php $add = base_url()."index.php/pages/logout";
?>
<div class="container">
	<div class="well">
		<center>
			<?php
			echo '<h2>Fail!</h2>';
             // Get error
            echo '<p class="text-center">' . $this->authorize_net->getError() . '</p>';
             // Show debug data
             $this->authorize_net->debug()
             ?>
            <a href="<?php echo $add;?>"><button class="btn btn-info">Back</button></a>
		</center>
	</div>
</div>