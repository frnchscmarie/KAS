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
                    <h2>DELIVERER MANAGEMENT</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a data-toggle="modal" data-target="#squarespaceModal" class="butt5" ><i class="fa fa-plus"></i> Add Deliverer </a>
					  
					  	

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Deliverer</h3>
		</div>
		<div class="modal-body">
		<div>&nbsp;</div>
  <div class="container">
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addDeliverer'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div class="ClientForm">
    <label class="control-label col-sm-4" for="vehicle">Deliverer ID:</label>
    <input class="form-control col-sm-4" type="text" name="delivererID" id="delivererID"  required="required" value="<?php echo date("y").'-003-'.str_pad($id, 3, '0', STR_PAD_LEFT) ?>" readonly="readonly"/>
    </div>

	 <div class="ClientForm">
		<label class="control-label col-sm-4" for="assigned">Assigned personnel </label>
	    <input class="form-control col-sm-4" type="text" name="assigned" id="assigned" required="required"  placeholder="Name of personnel" />
	</div>
	
    <div class="ClientForm">
	 	<label class="control-label col-sm-4" for="vehicle">Vehicle:</label>
		<select class="form-control col-sm-4" name="vehicle" id="vehicle">
			<option value="Motor bike">Motor bike</option>
			<option value="Jeep">Jeep</option>
			<option value="Light duty truck">Light duty truck</option>
			<option value="Heavy duty truck">Heavy duty truck</option>
			<option value="Pick-up Truck">Pick-up Truck</option>
			<option value="Delivery Truck">Delivery Truck</option>
		</select>
    </div>
    
    <div class="ClientForm">
		<label class="control-label col-sm-4" for="cnum">Contact Number:</label>
		<input class="form-control col-sm-4" type="text" name="cnum" id="cnum" required="required"  placeholder="09-XXX-XXX-XXX" />
    </div>
    
	
	<div class="">
		<label class="control-label col-sm-4">&nbsp;</label>
	
    </div>
	
	 <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button" style="margin-left: 50px;"><a href="<?php echo base_url('knoxville/viewDeliverer')?>" style="color: white;">Cancel</a></button>
                          
                          <button type="submit" class="btn btn-success" value="submit">Submit</button>
                        </div>
      </div>
	  
  </div>
  </form>
  
 </div>
  </div>
  </div>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Manage all the deliverers.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                    <tr id="trHead">
						<th>Deliverer ID <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Vehicle <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Contact Number <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>Assigned <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
						<th>ACTION </th>
					</tr>
				</thead>
        <tbody>
            <?php
            if($deliverer != false){
                foreach($deliverer as $c){  
                    echo "<tr><td>".$c['delivererID']."</td><td>".$c['vehicle']."<td>".$c['contact_no']."</td><td>".$c['assigned']

                    .'</td><td><a href="'.base_url('knoxville/updateDeliverer/'.$c['delivererID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a><a href="'.base_url('knoxville/delDeliverer/'.$c['delivererID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';

                    //echo base_url('knoxville/delClient/'.c['clientID'])
                }
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
<script>
    function confirmDelete(delivererID){
        var choice=confirm("Delete this deliverer?");
        if(choice)
            window.location.assign("<?php echo base_url('knoxville/delDeliverer'); ?>"+"/"+delivererID);
    }
    </script>
</body>
</html>