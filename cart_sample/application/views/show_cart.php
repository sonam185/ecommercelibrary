<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css" media="screen">
<link href="<?php echo base_url();?>css/bootstrap-theme.css" rel="stylesheet" media="screen">

<?php 
$act = base_url()."index.php/pages/checkout";
$del = base_url()."index.php/pages/delete_items";
$add = base_url()."index.php/pages/show_items";
$clear = base_url()."index.php/pages/destroy_cart";

?>


	<div class="container">
		<div class="well" width="200px">
 	  <a href= "<?php echo $add; ?>" ><button class="btn btn-primary">Add More Items To Cart</button></a>&nbsp;&nbsp;
	  <a href= "<?php echo $clear; ?>" ><button class="btn btn-primary">Clear Cart</button></a> 
		<form name="show" method="post" action="<?php echo $act; ?>">
	 
	 		<?php if($this->cart->contents(TRUE)){ ?>
				<table border="0" align="center" height="300px" width="500px">
					<tr>
						<th align="center">Remove Item From Cart</th>
						<th align="center">Id</th>
						<th align="center">Name</th>
						<th align="center">Price</th>
					</tr>
					<?php 
					
					foreach($items as $item){
					?>
					<tr>

						<td align="center"><a href="<?php echo $del; ?>/<?php echo $item['rowid']; ?>" >remove</a></td>
						<td align="center"><?php echo $item['id']; ?></td>
						<td align="center"><?php echo $item['name']; ?></td>
						<td align="center">$&nbsp;<?php echo $item['price']; ?></td>
					</tr>

					<?php } ?>
					<tr>
						<td colspan="4" align="center">
							<label>Please Choose Payment Method</label>
			
							<select name="payment_method">
								<option value="paypal">paypal</option>
								<option value="authorize.net">authorize.net</option>
							</select>
						</td>
					<tr>
						<td align="center" colspan="4"><button class="btn btn-success" type="submit" name="confirm" value="Checkout">Checkout</button></td>

					</tr>
		
				</table>

		</form>
			<?php } 
				else { 
						
					echo "<div style='color:#000' align='center'><h3>No items remaining in the cart</h3></div>";

					}?>
</div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
