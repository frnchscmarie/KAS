<!DOCTYPE html>
<div class="tab-content">


  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/viewTransaction/'.$orderID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?>
<div class="right_col" role="main">
          <div class="">
           
    
    <div class="clearfix"></div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Order Purchased Details</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />
          <div class="col-md-4" style="padding: 10px; text-align: center; margin-left: 350px;">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="form-group has-feedback">
                                  <label>Order ID: </label>
                                  <label><span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span><?php echo $orderID?></label>
                                </div>

                                <div class="form-group has-feedback">
                                  <label>Client ID: </label>
                                  <label><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span><?php echo $clientID?></label>
                                </div>
              
                                <div class="form-group has-feedback">
                                  <label>Date: </label>
                                  <label><span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span><?php echo $date?></label>
                                </div>
                      
                               <div class="form-group has-feedback">
                                 <label>Time: </label>
                                  <label><span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span><?php echo $time?></label>
                                </div>

                                <div class="form-group has-feedback">
                                 <label>Due Date: </label>
                                  <label><span class="fa  fa-info form-control-feedback left" aria-hidden="true"></span><?php echo $due?></label>
                                </div>

                               
                                
            </form>
            </div>
			<div>&nbsp;</div>
			<div>&nbsp;</div>
              
            <div class="form-group" style="margin-left: 120px;">
                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary"><a href="<?php echo base_url('knoxville/returnItem/'.$orderID);?>" style="color: white;">Return Item</a></button>
                                    <button class="btn btn-success"><a data-toggle="modal" data-target="#squarespaceModal"  >Schedule for delivery</a></button>
                                  </div>
	 <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Schedule</h3>
		</div>
		<div class="modal-body">
		<div>&nbsp;</div>
					<div class="main_container">
			<?php echo validation_errors(); ?>
			<?php echo form_open('knoxville/addSched/'.$orderID,'id="delivery"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
											 //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
			?>
		
           
  
		<div class="col-sm-4" style="padding: 10px; text-align: center; margin-left: 200px;">
		
		<div class="ClientForm">
	
		<?php
		echo '<select name="deliverer" form="order" style="margin-left: -20px;">';
			echo '<option selected disabled hidden>Assigned Personnel</option>';
			foreach($deliverer as $c){
				echo '<option value="'.$c['delivererID'].'">'.$c['assigned'].'</option>';
			}
		echo '</select>';
		?>
    </div>
         <div>&nbsp;</div>
		

					<div class="form-group has-feedback">
					<label class="control-label col-md-4 col-sm-4 col-xs-12" for="date">Date: </label>
					<div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="date" class="form-control has-feedback-left" required="required" for="date" id="inputSuccess2" placeholder="Date" name="date" value="<?php echo date('Y-m-d'); ?>" id="date">
                        <span class="fa fa-calendar form-control-feedback left required" aria-hidden="true"></span><br />
                      </div>
                      </div>
					  
					<div class="form-group has-feedback">
					<label class="control-label col-md-4 col-sm-4 col-xs-12" for="time">Time: </label>
					<div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="time" class="form-control has-feedback-left" required="required" for="time" id="inputSuccess2" placeholder="Time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>" id="time">
                        <span class="fa fa-clock-o form-control-feedback left required" aria-hidden="true"></span><br />
                      </div>
                      </div>
					  
		<div class="">
		<label class="control-label col-sm-4">&nbsp;</label>
	
    </div>
	
	 <div class="form-group">
                        <div class="">
                          <button class="btn btn-primary" type="button"  style="margin-left: -60px;"><a href="<?php echo base_url('knoxville/index')?>" style="color: white;">Cancel</a></button>
                          <button type="submit" class="btn btn-success" value="submit" style="margin-right: 20px;">Submit</button>
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
            </div>
            
           
        
            
          

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>View Order Details</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />


<table class="table table-striped table-bordered">
<thead>
        <tr id="trHead">
          <th>Item Name <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
          <th>Price <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
          <th>Quantity <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>          
        </tr>
      </thead>
      <tbody>
        <?php
        $totalPrice = 0;
         if($purchased!=null){
          foreach($purchased as $t){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
            echo "<tr><td>";
            foreach($items as $i)
            {
              if ($t['itemID'] == $i['itemID'])
              echo $i['item_desc'];
            } 
            echo '</td><td>&#x20B1;'.number_format($t['unit_price']).'</td><td>'.$t['quantity'].'</td></tr>';
            //echo base_url('knoxville/delClient/'.c['clientID'])
            }
		 }

            echo '<p><b>Subtotal: &#x20B1;</b> '. number_format($totalPrice)."</p>";
        ?>
        
        
        
      </tbody>
    </table>

  </div>
</div>
</div>


  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>View Return Items</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />


<table class="table table-striped table-bordered">
<thead>
        <tr id="trHead">
          <th>Item Name <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
          <th>Quantity <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>   
          <th>Date<span class="glyphicon glyphicon-sort" style="color: white;"></span></th>   
          <th>Reason<span class="glyphicon glyphicon-sort" style="color: white;"></span></th>          
        </tr>
      </thead>
      <tbody>
        <?php
        $totalPrice = 0;
         
         if($returnI != false){
          foreach($returnI as $t){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
            echo "<tr><td>";
            foreach($items as $i)
            {
              if ($t['itemID'] == $i['itemID'])
              echo $i['item_desc'];
            } 
            echo '</td><td>'.$t['quantity'].'</td><td>'.$t['date'].'</td><td>'.$t['reason'].'</td></tr>';
            //echo base_url('knoxville/delClient/'.c['clientID'])
            }
          }
          else{
            echo '<tr><div>No results found.</div></tr>';
          }
        ?>
        
        
        
      </tbody>
    </table>

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
    </div>

</body>
</html>