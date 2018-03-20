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
                    <h2>Items</h2>
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
                      Manage all the items.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                    <tr id="trHead">
						<th>Item Description</th>
						<th>Price</th>
						<th>ACTION</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($item as $c){  
                    echo "<tr><td>".$c['item_desc']."</td><td>".$c['unit_price']
                    .'</td><td><a href="'.base_url('knoxville/updateItem/'.$c['itemID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a><a href="'.base_url('knoxville/delItem/'.$c['itemID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
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
                    <h2>Stocks</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a href="<?php echo base_url('knoxville/addStocks')?>"><i class="fa fa-plus"></i> Add Stock</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Manage all the items.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                    <tr id="trHead">
            <th>Item Description</th>
            <th>Stock ID</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(isset($stocks)){
            foreach($stocks as $s){

              echo "<tr><td>";

              foreach($item as $i){
                if($s['itemID']==$i['itemID'])
                  echo $i['item_desc'];
              }
              echo "</td><td>".$s['stockID']."</td><td>".$s['quantity']."</td><td>".$s['date'].'</td><td><a href="'.base_url('knoxville/updateItem/'.$s['itemID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a><a href="'.base_url('knoxville/delItem/'.$s['itemID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])

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
</body>
</html>