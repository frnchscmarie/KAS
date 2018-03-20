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
                    <h3>Add Client</h3>
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
		<div class="col-md-4" style="padding: 10px; text-align: center; margin-left: 350px;">
         
			<label class="control-label col-md-4"></label>
				<?php
		echo '<select name="deliverer" form="order">';
			echo '<option selected disabled hidden>Assigned Personnel</option>';
			foreach($deliverer as $c){
				echo '<option value="'.$c['delivererID'].'">'.$c['assigned'].'</option>';
			}
		echo '</select>';
		?>
		
		<div>
		<label class="control-label col-sm-4" for="vehicle">Date:</label>
		<input class="form-control col-sm-2" type="date" name="date" value="<?php echo date('Y-m-d'); ?> ">
		</div>

		<div>
		<label class="control-label col-sm-4" for="vehicle">Time:</label>
		<input class="form-control col-sm-2" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>">
		</div>
		<br />
		<div class="col-sm-12">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
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
