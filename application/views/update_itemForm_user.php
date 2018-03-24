<!DOCTYPE html>
<div class="tab-content">
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('SalesAgent/updateItem/'.$itemID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/SalesAgent-Auto-Supply/SalesAgent/addClient">
                                     //to add attributes, edit to: echo form('SalesAgent/addClient','class="lala" id="lala"'); 
  ?> 
 <div class="right_col" role="main">
          <div class="">

    <div class="clearfix"></div>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Edit Item</h3>
                    
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />
<div class="col-sm-4" style="padding: 10px; text-align: center; margin-left: 350px;">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group has-feedback">
					  <label class="form" for="idesc">Item Description </label>
                        <input type="text" class="form-control " for="idesc" id="inputSuccess2" name="idesc" value="<?php echo $idesc; ?>" id="idesc">
						<span class="required"></span>
                      </div>
					  
					  
                      <div class=" form-group has-feedback">
					   <label class="form" for="idesc">Stocks </label>
                        <input type="text" class="form-control" for="price" id="inputSuccess2" placeholder="Price" name="price" value="<?php echo $price; ?>" id="price">
						<span class="required"></span>
                      </div>
		 
                      <div class="form-group">
                        <div class="">
                          <button class="btn btn-primary" type="button"><a href="<?php echo base_url('SalesAgent/viewItems')?>" style="color: white;">Cancel</a></button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" value="submit">Submit</button>
                        </div>
                      </div>
                     
                      
  </form>
  </div>
  </div>
 
   </div>
  </div>

      </div>
       </div>

  </div>
    </div>
</div>
 </div>
</body>
</html>