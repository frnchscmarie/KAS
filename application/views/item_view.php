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
                      <li><a href="<?php echo base_url('knoxville/addItem')?>"><i class="fa fa-plus"></i> Add Item</a>
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
                    <tr id="trHead">
						<th>Item Description</th>
						<th>Stocks</th>
						<th>ACTION</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($item as $c){  
                    echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']
                    .'</td><td><a href="'.base_url('knoxville/updateItem/'.$c['itemID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a><a href="'.base_url('knoxville/delItem/'.$c['itemID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</a></td></tr>';
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