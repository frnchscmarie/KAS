<!DOCTYPE html>
<div class="tab-content">
<?php echo validation_errors(); ?>
<div class="card-body" style="padding: 20px;">
<h3 style="text-align: center; text-decoration: bold;" >TRANSACTION DETAILS</h3>

	<br />
	<br />
	<p class="xxx text-center"><a href="<?php echo base_url('SalesAgent/addSched/'.$orderID) ?>"><span class="glyphicon glyphicon-plus"> </span>Schedule Delivery</a></a></p>
		<div class="searchLeft1">
			Search: <input type="text" id="myInput" onkeyup="Transaction()" placeholder="Type any value" title="Type ANY value" class="sround">
		</div>
		<div class="table-responsive table">
		<table class="table table-striped">
			<thead>
				<tr id="trHead">
					<th>Item Name <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Price <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Quantity <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Date <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Status <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$totalPrice = 0;
				 
					foreach($trans as $t){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
						echo "<tr><td>";
						foreach($items as $i)
						{
							if ($t['itemID'] == $i['itemID'])
							echo $i['item_desc'];
						}	
						echo '</td><td>&#x20B1;'.number_format($t['unit_price']).'</td><td>'.$t['quantity'].'</td><td>'.$t['date'].'</td><td>'.$t['status'].'</td><td><a href="'.base_url('SalesAgent/updateTransaction/'.$t['transID']).'">Edit</a> | <a href="'.base_url('SalesAgent/delTransaction/'.$t['transID']).'/'.$orderID.'">Delete</a></td></tr>';
						if($t['status'] == 'Purchased')
							$totalPrice = $totalPrice + $t['unit_price'] * $t['quantity'];
						elseif($t['status'] == 'Returned' || $t['status'] == 'Cancelled')
							$totalPrice = $totalPrice - $t['unit_price'] * $t['quantity'];
						//echo base_url('SalesAgent/delClient/'.c['clientID'])
						}

						echo '<p><b>Subtotal: &#x20B1;</b> '. number_format($totalPrice)."</p>";
				?>
				
				
				
			</tbody>
		</table>
		   <table class="table table-striped">
			<thead>
				<tr id="trHead">
					<th>Status</th>
					<th>Location</th>
					<th>Date</th>
					<th>Time</th>
					<th>Action</th>
				</tr>
			</thead>
			 <tbody>
				<?php
				if($ship != false ){
					foreach($ship as $s){
					if($s['status']=='Scheduled'){
					echo '<a href="'.base_url('SalesAgent/addDeliveryStatus/'.$orderID.'/'.$s['shipID'].'').'" class="sub">
					<span class="glyphicon glyphicon-plus"> </span>Add Delivery Updates</a>';}
					}
					
				
					 foreach($ship as $s){
					echo '<td>'.$s['status'].'</td><td>'.$s['location'].'</td><td>'.$s['date'].'</td><td>'.$s['time'].'</td>
					<td><a href="'.base_url('SalesAgent/updateDeliveryStatus/'.$s['statusID'].'/'.$orderID).'">Edit</a> | <a href="'.base_url('SalesAgent/delDeliveryStatus/'.$s['statusID'].'/'.$orderID).'">Delete</a></td></tr>';
					 }
				}
					
				?>
				
				<a href="<?php echo base_url('SalesAgent/addPurchase/'.$orderID.'') ?>" class="sub sround">
		<span class="glyphicon glyphicon-plus"> </span>Purchase items</a>	
		
		<a href="<?php echo base_url('SalesAgent/addRefund/'.$orderID.'') ?>" class="sub sround">
		<span class="glyphicon glyphicon-plus"> </span>Cancel/Return Orders</a>
			</tbody>
		</table>
		</div>
		

	</div>
	</div>
	
<!DOCTYPE html>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">

<div class="right_col" role="main">
          <div class="">
    
    <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaction</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a href="<?php echo base_url('SalesAgent/addSched')?>"><i class="fa fa-plus"></i> Schedule Delivery</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  
		<div class="col-md-6" style="padding: 10px; text-align: center; margin-left: 250px;">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group has-feedback">
                        <label><?php echo $cname?></label>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
		
                      <div class="form-group has-feedback">
                        <label><?php echo $cadd?></label>
                        <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					    <div class="form-group has-feedback">
                       <label><?php echo $cnum?></label>
                        <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                      </div>

                     
                      
  </form>
  </div>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                    <tr id="trHead">
						<th>Item Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($item as $c){  
                    echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']
                    .'</td><td><a href="'.base_url('SalesAgent/updateItem/'.$c['itemID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a><a href="'.base_url('SalesAgent/delItem/'.$c['itemID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</a></td></tr>';
                    //echo base_url('SalesAgent/delClient/'.c['clientID'])
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
</body>
</html>
