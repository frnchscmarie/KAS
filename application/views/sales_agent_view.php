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
                      <li><a href="<?php echo base_url('knoxville/addSalesAgent')?>"><i class="fa fa-plus"></i> Add Sales Agent </a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Manage all the Sales Agents here.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
	
	<div id="table">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
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
</body>
</html>