<!DOCTYPE html>

<div class="tab-content">
<div>&nbsp;</div>  
 <?php echo form_open('knoxville/addPurchasedd/'.$quoteID,'id="order"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/viewQuote">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 

	<div class="right_col" role="main">
          <div class="">
           
    
    <div class="clearfix"></div>


  
  
  <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Edit Sales Agent</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
               </div>
                  <div class="x_content">
                    <br />
<div class="col-md-6" style="padding: 10px; text-align: center; margin-left: 250px;">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      
					  
					  
                      <div class=" form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" form="order" id="inputSuccess2" placeholder="Client ID" name="clientID" value="<?php echo $clientID; ?>" id="clientID">
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                      </div>

		                  <div class="form-group has-feedback">
                        <input type="date" class="form-control has-feedback-left" form="order" id="inputSuccess2" placeholder="Date:" name="date" value="<?php echo $date; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class=" form-group has-feedback">
                        <input type="time" class="form-control has-feedback-left" form="order" id="inputSuccess2" placeholder="Time: " name="time" value="<?php echo $time; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

					           <div class=" form-group has-feedback">
                        <input type="date" class="form-control has-feedback-left" form="order" id="inputSuccess2" placeholder="Due date " name="duedate" value="<?php echo $due; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="<?php echo base_url('knoxville/viewQuote')?>" style="color: white;">Cancel</a></button>
                          <button type="submit" class="btn btn-success" value="submit">Purchase</button>
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