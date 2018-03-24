<!DOCTYPE html>
<div class="tab-content">
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('SalesAgent/updateTransaction/'.$transID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/SalesAgent-Auto-Supply/SalesAgent/addClient">
                                     //to add attributes, edit to: echo form('SalesAgent/addClient','class="lala" id="lala"'); 
  ?>
  <div>&nbsp;</div>
  <h2 class="text-center">UPDATE TRANSACTION</h2>
  <div class="container ClientForm">
  
    <div>
		<p class="font">Item Name: <?php echo $item_desc?></p><br />
    </div>
 
    <div>
		<label class="control-label col-sm-4" for="price">Price:</label>
		<input class="form-control col-sm-4"type="text" name="price" id="price" value="<?php echo $price?>" />
		<span class="required"></span>
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="qty">Quantity:</label>
		<input class="form-control col-sm-4"type="text" name="qty" id="qty" value="<?php echo $qty?>" />
		<span class="required"></span>
    </div>
    
	<div class="col-sm-6">
		<input class="subUpdate sround" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
  </div>
</body>
</html>