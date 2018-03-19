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
                      <li><a href="<?php echo base_url('knoxville/addClient')?>"><i class="fa fa-plus"></i> Add Client </a>
                      </li>
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
                    .'</td><td><a href="'.base_url('knoxville/updateClient/'.$c['clientID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a><a href="'.base_url('knoxville/delClient/'.$c['clientID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</a></td></tr>';
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
