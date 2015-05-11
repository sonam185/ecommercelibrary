<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css" media="screen">
<link href="<?php echo base_url();?>css/bootstrap-theme.css" rel="stylesheet" media="screen">
<?php 
	$url = base_url()."/images/";
	$act = base_url()."index.php/pages/add_to_cart";
	$val = $this->db->get('image');
	$row = ($val->result());
	
?>
<div class="container">
	<div class="well">
		<h3>Items</h3>
		<?php	foreach($row as $image){
	
 		?>
		<div class="table-responsive">
			<table class="table">
				<tr>
					<td width="60%">
						<img src ="<?php echo $url.$image->img_name; ?>" height="200" width="200" />
					</td>
					<td width="40%">
						<label for ="name">Name:-<?php echo $image->name ?></label><BR><BR>
						<label for ="price">Cost:-$ <?php echo $image->price ?></label><BR><BR>
					
 						<form name="details" method="post" action= "<?php echo $act; ?>" >
 							<input type="hidden" name = "id" value ="<?php echo $image->id; ?>" >
							<input type="hidden" name="name" value="<?php echo $image->name ?>" >
							<input type="hidden" name="price" value="<?php echo  $image->price ?>">				
							<button class="btn btn-info" type="submit" name="Add to Cart" value="Add to Cart" >Add To Cart</button>
						</form>
					</td>
					
				<?php  } ?>	

				</tr>		
			</table>
		</div>
</div>
</div>
		
<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
			




