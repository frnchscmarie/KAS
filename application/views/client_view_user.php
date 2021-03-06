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
                    <h2>Client Management</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a data-toggle="modal" data-target="#squarespaceModal" class="butt5" ><i class="fa fa-plus"></i> Add Client </a>
                      </li>
					  <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Clients</h3>
		</div>
		<div class="modal-body">
		<div>&nbsp;</div>
  <div class="container">
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('SalesAgent/addClient'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/SalesAgent-Auto-Supply/SalesAgent/addClient">
                                     //to add attributes, edit to: echo form('SalesAgent/addClient','class="lala" id="lala"'); 
  ?> 
  
					<div class="form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" required="required" for="cname" id="inputSuccess2" placeholder="Company Name" name="cname" value="<?php echo set_value('cname'); ?>" id="cname">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					  <div class="form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" required="required" for="caddress" id="inputSuccess2" placeholder="Company Address" name="caddress" value="<?php echo set_value('caddress'); ?>" id="caddress">
                        <span class="fa fa-thumb-tack form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					  <div class="form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" required="required" for="cnum" id="inputSuccess2" placeholder="Contact Number" name="cnum" value="<?php echo set_value('cnum'); ?>" id="cnum">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

    
	
	<div class="">
		<label class="control-label col-sm-4">&nbsp;</label>
	
    </div>
	
	 <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button" style="margin-left: 50px;"><a href="<?php echo base_url('SalesAgent/viewDeliverer')?>" style="color: white;">Cancel</a></button>
                          
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
                    </ul>
                    <div class="clearfix"></div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Manage all the clients here.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>Client Name</th>
                        <th>Address </th>
                        <th>Contact No.</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
            <?php
				if($clients!=null){
                foreach($clients as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                    echo "<tr><td>".$c['clientID']."</td><td>".$c['client_name']."</td><td>".$c['address']."</td><td>".$c['contact_no']
                    .'</td><td><a href="'.base_url('SalesAgent/updateClient/'.$c['clientID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a></td></tr>';
                    //echo base_url('SalesAgent/delClient/'.c['clientID'])
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
              </div>
    
    
</body>
</html>
