<!DOCTYPE html>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php echo form_open('knoxville/addSalesAagent'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 

<div class="right_col" role="main">
          <div class="">
           
    
    <div class="clearfix"></div>


  
  
  <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Add Sales Agent</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />
<div class="col-md-6" style="padding: 10px; text-align: center; margin-left: 250px;">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" for="userID" id="inputSuccess2" placeholder="User ID" name="userID" value="<?php echo set_value('userID'); ?>" id="userID">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
		
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control has-feedback-left" for="pass" id="inputSuccess2" placeholder="Password" name="pass" value="<?php echo set_value('pass'); ?>" id="pass">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class=" form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" for="name" id="inputSuccess2" placeholder="Name" name="name" value="<?php echo set_value('name'); ?>" id="name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					  
                      <div class=" form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" for="bday" id="inputSuccess2" placeholder="Birthdate" name="bday" value="<?php echo set_value('caddress'); ?>" id="bday">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
	                  
					  
                      <div class=" form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" for="email" id="inputSuccess2" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" id="email">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					  
					  
                      <div class=" form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" for="cnum" id="inputSuccess2" placeholder="Contact Number" name="cnum" value="<?php echo set_value('cnum'); ?>" id="cnum">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
					  
					  
                      <div class="checkbox">
                            <label>
                              <input type="checkbox" name="isAdmin" id="isAdmin" >Admin?
                            </label>
                          </div>
					  
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="<?php echo base_url('knoxville/viewSalesAgents')?>"style="color: white;">Cancel</a></button>
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
