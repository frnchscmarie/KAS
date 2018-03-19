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
                    <h2>Inventory</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a href="<?php echo base_url('knoxville/addClient')?>"><i class="fa fa-plus"></i> Add Client </a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Manage all the clients here eekek adsadjkdf sjhdkasd sakdjaslkd.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>

	<a href="<?php echo base_url('knoxville/addSalesAgent')?>"><button class="btn btn-primary" type="button" id="addButton"><span class="glyphicon glyphicon-plus"> </span>Add Sales Agent</button></a>
	
	<div id="table">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr id="trHead">
						<th class="info">User ID</th>
						<th class="info">Password</th>
						<th class="info">Name</th>
						<th class="info">Birthdate</th>
						
						<th class="info">Email</th>
						<th class="info">Contact Number</th>
						<th class="info">isAdmin</th>
						<th class="info">ACTION</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($sales_agents as $c){  
                    echo "<tr><td>".$c['userID']."</td><td>".$c['password']."</td><td>".$c['fullname']."</td><td>".$c['birthdate']."</td><td>".$c['email']."</td><td>".$c['contact_no']."</td><td>".$c['isAdmin']
                    .'</td><td><a href="'.base_url('knoxville/updateSalesAgent/'.$c['userID']).'">Edit</a> | <a href="'.base_url('knoxville/delSalesAgent/'.$c['userID']).'">Delete</a></td></tr>';
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