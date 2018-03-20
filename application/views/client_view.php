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
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
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
  
  <?php echo form_open('knoxville/addClient'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div class="ClientForm">
    <label class="control-label col-sm-4">Company Name </label>
    <input class="form-control col-sm-4" type="text" name="cname" id="cname" placeholder="Company Name" />
    </div>

	 <div class="ClientForm">
		<label class="control-label col-sm-4">Company Address</label>
	    <input class="form-control col-sm-4" type="text" name="caddress" id="caddress" placeholder="Company Address" />
	</div>
	
    
    <div class="ClientForm">
		<label class="control-label col-sm-4">Contact Number:</label>
		<input class="form-control col-sm-4" type="text" name="cnum" id="cnum" placeholder="09-XXX-XXX-XXX" />
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
                    </ul>
                    <div class="clearfix"></div>
                  </div>
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
                foreach($clients as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                    echo "<tr><td>".$c['clientID']."</td><td>".$c['client_name']."</td><td>".$c['address']."</td><td>".$c['contact_no']
                    .'</td><td><a href="'.base_url('knoxville/updateClient/'.$c['clientID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a><a href="'.base_url('knoxville/delClient/'.$c['clientID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
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
