<!DOCTYPE html>
<div class="tab-content">

	
<!--<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Item</h3>
		</div>
		<div class="modal-body">
 <div class="container">
 <?php echo validation_errors(); ?>
  
  <?php echo form_open('SalesAgent/addItem'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/SalesAgent-Auto-Supply/SalesAgent/addClient">
                                     //to add attributes, edit to: echo form('SalesAgent/addClient','class="lala" id="lala"'); 
  ?> 
    <div class="ClientForm">
		<label class="control-label col-sm-4" for="idesc">Item Desc.:</label>
		<input class="form-control col-sm-4" type="text" name="idesc" id="idesc" placeholder="Name of item" />
    </div>
    
    <div class="ClientForm">
		<label class="control-label col-sm-4" for="stocks">Stocks:</label>
		<input class="form-control col-sm-4" type="text" name="stocks" id="stocks" placeholder="Number of stock"/>
    </div>
    
	<div class="col-sm-6" style="margin-left: 150px;">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
  </div> -->
  
  
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
                      <li><a href="<?php echo base_url('SalesAgent/addItem')?>"><i class="fa fa-plus"></i> Add Item</a>
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
						<th>Stocks</th>
						<th>ACTION</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($item as $c){  
                    echo "<tr><td>".$c['item_desc']."</td><td>".$c['stocks']
                    .'</td><td><a href="'.base_url('SalesAgent/updateItem/'.$c['itemID']).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a><a href="'.base_url('SalesAgent/delItem/'.$c['itemID']).'"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</a></td></tr>';
                    //echo base_url('SalesAgent/delClient/'.c['clientID'])
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