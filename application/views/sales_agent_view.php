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
                    <h2>Sales Agent Management</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="modal" data-target="#squarespaceModal" class="butt5" ><i class="fa fa-plus"></i> Add Sales Agent </a>
					  
					  	

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Sales Agent</h3>
		</div>
		<div class="modal-body">
		<div>&nbsp;</div>
  <div class="container">
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addSalesAgent'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div class="form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" required="required" for="userID" id="inputSuccess2" placeholder="  User ID" name="userID" value="<?php echo set_value('userID'); ?>" id="userID">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
		
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control has-feedback-left" required="required" for="pass" id="inputSuccess2" placeholder="  Password" name="pass" value="<?php echo set_value('pass'); ?>" id="pass">
                        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class=" form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left"  required="required"for="name" id="inputSuccess2" placeholder="  Name" name="name" value="<?php echo set_value('name'); ?>" id="name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					  
                      <div class=" form-group has-feedback">
                        <input type="date" class="form-control has-feedback-left" required="required" for="bday" id="inputSuccess2" placeholder="  Birthdate" name="bday" value="<?php echo set_value('caddress'); ?>" id="bday">
                        <span class="fa fa-birthday-cake form-control-feedback left" aria-hidden="true"></span>
                      </div>
	                  
					  
                      <div class=" form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" required="required" for="email" id="inputSuccess2" placeholder="  Email" name="email" value="<?php echo set_value('email'); ?>" id="email">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					  
					  
                      <div class=" form-group has-feedback">
                        <input type="number" class="form-control has-feedback-left" required="required" for="cnum" id="inputSuccess2" placeholder="  Contact Number" name="cnum" value="<?php echo set_value('cnum'); ?>" id="cnum">
                        <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					  
                      <div class="checkbox" style="margin-left: 245px;">
                            <label>
                              <input type="checkbox" name="isAdmin" id="isAdmin" >Admin?
                            </label>
                          </div>
    
	
	<div class="">
		<label class="control-label col-sm-4">&nbsp;</label>
	
    </div>
	
	 <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button" style="margin-left: 50px;"><a href="<?php echo base_url('knoxville/viewSalesAgent')?>" style="color: white;">Cancel</a></button>
                          
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
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Manage all the Sales Agents here.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
	
                    <tr id="trHead">
						<th >User ID</th>
						<th >Password</th>
						<th >Name</th>
						<th >Birthdate</th>
						
						<th >Email</th>
						<th >Contact Number</th>
						<th >ACTION</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($sales_agents as $c){  
                    echo "<tr><td>".$c['userID']."</td><td>".$c['password']."</td><td>".$c['fullname']."</td><td>".$c['birthdate']."</td><td>".$c['email']."</td><td>".$c['contact_no'].'</td><td><a href="'.base_url('knoxville/updateSalesAgent/'.$c['userID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a>| <a href="'.base_url('knoxville/delSalesAgent/'.$c['userID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</a></td></tr>';
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