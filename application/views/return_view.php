<!DOCTYPE html>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php 
        echo form_open('knoxville/returnItem/'.$orderID,'id="returns"');
         //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addOrder">
                                     //to add attributes, edit to: echo form('knoxville/addOrder','class="lala" id="lala"'); 
  ?> 

<div class="right_col" role="main">
          <div class="">
           
    
    <div class="clearfix"></div>


  
  
  <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Return Item</h3>
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
                    <br />
<div class="col-md-6" style="padding: 10px; text-align: center; margin-left: 250px;">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div style="margin-left: -30px;">
       
			<table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th><label class="thHead">Item Description</label></th>
						
						<th>
							<label class="thHead" for="quantity">Quantity</label>
						</th>
						<th>
						<label class="thHead" for="itemList[]">ADD</th>
					</tr>
				</thead>
					
        <tbody>
        <?php
        $counter = 0;

          foreach($order as $q){ 
            
            if($return!=null){
              foreach($return as $r){
                $quantity = (int) $q['quantity']-(int) $r['quantity'];
                if($quantity>0 && $r['itemID']==$q['itemID']){
                  foreach($items as $c){
                    if($q['itemID']==$c['itemID']){
                   $counter++;
                      echo '<tr><td>'.$c['item_desc'].'</td>
           

              <td class="col-sm-2">             
                <input type="number" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="'.$quantity.'" disabled/>
              </td>
              
              <td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$c['itemID'].'" onClick="toggle('."'items".$counter."'".', '."'quantity".$counter."'".')"/></td>
              
            ';
                    }

                  }

               }
            }
          }

          else{
               foreach($items as $c){
                    if($q['itemID']==$c['itemID']){
                   $counter++;
                      echo '<tr><td>'.$c['item_desc'].'</td>
           

              <td class="col-sm-2">             
                <input type="number" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="'.$q['quantity'].'" disabled/>
              </td>
              
              <td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$c['itemID'].'" onClick="toggle('."'items".$counter."'".', '."'quantity".$counter."'".')"/></td>
              
            ';
            }
          }
            
        }
      }
                   
          echo '</tbody>';
          if($counter==0)
              echo '<p>No items to display.</p>';
                
            ?>
			
    
	
   </table>
   </div>
          <div class="form-group has-feedback">
                        <input type="date" class="form-control has-feedback-left" for="returns" id="inputSuccess2" placeholder="Date:" name="date" value="<?php echo date('Y-m-d'); ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>

            <select class="form-group has-feedback" name="reason">
                        <option value="Defective Item">Defective</option>
                        <option value="Excess">Excess</option>
            </select>
   
	                  
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button"><a href="<?php echo base_url('knoxville/viewTransaction/'.$orderID)?>" style="color: white;">Cancel</a></button>
                          <button type="submit" class="btn btn-success" value="submit">Submit</button>
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