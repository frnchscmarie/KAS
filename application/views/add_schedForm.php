<body class="nav-md">
    <div class="container body">
      <div class="main_container">
			<?php echo validation_errors(); ?>
			<?php echo form_open('knoxville/addSched/'.$orderID,'id="delivery"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
											 //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
			?>
			
			<div class="right_col" role="main">
          <div class="">
           
    
    <div class="clearfix"></div>
			<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Add Schedule</h3>
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
               </div><div class="x_content">
                    <br />
		<div class="col-sm-4" style="padding: 10px; text-align: center; margin-left: 350px;">
		
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
					<label class="control-label " for="date">Date: </label>
                        <input type="date" class="form-control has-feedback-left" required="required" for="date" id="inputSuccess2" placeholder="Date" name="date" value="<?php echo date('Y-m-d'); ?>" id="date">
                        <span class="fa fa-calendar form-control-feedback left required" aria-hidden="true"></span>
                      </div>
					  
					  <div class="form-group has-feedback">
					<label class="control-label " for="time">Time: </label>
                        <input type="time" class="form-control has-feedback-left" required="required" for="time" id="inputSuccess2" placeholder="Time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>" id="time">
                        <span class="fa fa-clock-o form-control-feedback left required" aria-hidden="true"></span>
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

		
	
		</form>	
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
