

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="row">
             <!-- <div class="col-md-12">
                <div class="x_panel" style="height: 400px;">
                  <div class="x_title">
                    <h2>Sales Report <small>Weekly progress</small></h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 col-xs-12">
          <div id="range-dropdown" class="text-center">
					<article class="media event">

                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                      	<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                <select class="select" name="range">
							<option value="day" selected>Today</option>
							<option value="week">This week</option>
							<option value="month">This month</option>
						</select>
            </div>
            <div id="sales_report">
						<script>
					        $(document).ready(function(){
					            $.ajax({
					                url: "<?php echo base_url('knoxville/viewSalesReport'); ?>",
					                type: "POST",
					                data: "range=day",
					                
					                success: function(data){
					                    $('#sales_report').html(data);
					                }
					            });
					        });
					    </script>
					    <script>
					        $(document).ready(function(){
					            $('#range-dropdown select').change(function(event){
					                var selRange = $(this).val();
					                $.ajax({
					                    url: "<?php echo base_url('knoxville/viewSalesReport'); ?>",
					                    type: "POST",
					                    data: "range="+selRange,
					                    
					                    success: function(data){
					                        $('#sales_report').html(data);
					                    }
					                });
					            });
					        });
					    </script>

                      </div>
                    </article>
					<div>&nbsp;</div>
                     <!-- <div class="demo-container" style="height:280px">
                      <!-- <div id="chart_plot_02" class="demo-placeholder"></div> -->
					   
                      <!--<div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Revenue</span>
                          <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                      </div>

                    
                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div>
                        <div class="x_title">
                          <h2>Top Profiles</h2>
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
                        <ul class="list-unstyled top_profiles scroll-view">
                          <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                              <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>-->
            </div>
            </div>

            <div class="clearfix"></div>
           <!-- <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Sales Report </h2>
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
                  
                </div>
              </div>
            <!--<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
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
                      Add content to the page ...
                  </div>
                </div>
              </div>
            </div>
          </div>-->
         
		  
		  <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Unscheduled Deliveries</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
		 
                 
				   <div class="clearfix"></div>
                      </li>
                    </ul>
			
                    <div class="clearfix"></div>
                  
                  <div class="x_content">
				  <div>&nbsp;</div>
                    <div class="">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
	</div>
                    <tr id="trHead">
						<th >Order ID</th>
						<th >Status</th>
						<th >Assigned Sales Agent</th>
						<th >Schedule For Delivery</th>
					</tr>
				</thead>
		  <tbody>
				<?php
				
                if($orders != null){
					foreach($orders as $o){  
						$sched=0;
            if($shipped != null){
						foreach($shipped as $s){
							if($s['orderID'] == $o['orderID'])
							$sched++;
          }
						}
						if($sched==0){
							echo '<tr>
							<td><a href="'.base_url('knoxville/viewTransaction/'.$o['orderID']).'">Order#'.$o['orderID'].'</a></td>
							<td>Delivery Unscheduled</td>
							<td>'.$o['userID'].'</td>
							<td><a href="'.base_url('knoxville/addSched/'.$o['orderID']).' "class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Add Schedule</a></td>
							</tr>';
						//echo base_url('knoxville/delClient/'.c['clientID'])
						}
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
        </div>
        <!-- /page content -->

        
