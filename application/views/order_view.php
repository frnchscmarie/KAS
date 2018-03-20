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
                    <h2>Quoted</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Manage all the orders here.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
            <tr>
                <th>Order Number</th>
                <th>Client Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duedate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
			 
                foreach($client_quote as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                    echo "<tr><td>".$c['quoteID']."</td><td>".$c['clientID']."</td><td>".$c['date']."</td><td>".$c['time']."</td><td>".$c['due']
                    .'</td><td><a href="'.base_url('knoxville/addPurchasedd/'.$c['quoteID']).'" class="btn btn-danger btn-xs"><i class="fa fa-thumbs-up"></i> Purchase</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
                }
            ?>
			
        </tbody>
    </table>
  </div>
</div>
</div>


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchased</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Manage all the orders here.
                    </p>
                    <table id="datatable-checkbox" class="table table-striped table-bordered">
                      <thead>
            <tr>
                <th>View</th>
                <th>Order Number</th>
                <th>Client Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duedate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
      
       
                foreach($orders as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                    echo "<tr><td>//</td><td>".$c['orderID']."</td><td>".$c['clientID']."</td><td>".$c['date']."</td><td>".$c['time']."</td><td>".$c['due']
                    .'</td><td><a href="'.base_url('knoxville/viewTransaction/'.$c['orderID'].'').'" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> View</a><a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a></td>
					</tr>';
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
</div>
</body>
</html>